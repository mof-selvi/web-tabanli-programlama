import os
# Force PyTorch to use the local model directory for cached weights
os.environ["TORCH_HOME"] = os.path.abspath(os.path.join(os.path.dirname(__file__), "model"))

import time
import json
import traceback
from PIL import Image
import torch
from torchvision import models

# Print initial status to console
print("[Backend] Initializing Python AI Backend...")
print("[Backend] Loading pre-trained MobileNetV2 model...")

try:
    # Set model to CPU-only execution explicitly to avoid CUDA warning/overhead
    device = torch.device("cpu")
    
    # Load MobileNetV2 with default pre-trained ImageNet weights
    weights = models.MobileNet_V2_Weights.DEFAULT
    model = models.mobilenet_v2(weights=weights)
    model.to(device)
    model.eval() # Set model to evaluation mode
    
    # Retrieve categories from the weights metadata
    categories = weights.meta["categories"]
    preprocess_transforms = weights.transforms()
    
    print("[Backend] Model loaded successfully.")
    print(f"[Backend] Class count: {len(categories)} categories loaded.")
except Exception as e:
    print(f"[Backend] ERROR loading model: {e}")
    traceback.print_exc()
    exit(1)

# Define directories
PENDING_DIR = os.path.join("jobs", "pending")
COMPLETED_DIR = os.path.join("jobs", "completed")

print("[Backend] Waiting for jobs... Press Ctrl+C to exit.")

try:
    if not os.path.exists(PENDING_DIR):
        print("[Backend] Pending directory not found.")
        exit(0)
        
    job_files = [f for f in os.listdir(PENDING_DIR) if f.endswith(".json")]
    
    if not job_files:
        print("[Backend] No pending jobs found.")
        exit(0)
        
    for job_file in job_files:
        job_path = os.path.join(PENDING_DIR, job_file)
        result_path = os.path.join(COMPLETED_DIR, job_file)
        
        print(f"[Backend] Processing job: {job_file}")
        
        try:
            with open(job_path, "r") as f:
                job_data = json.load(f)
            
            image_path = job_data.get("image_path")
            print(f"[Backend] Loading image: {image_path}")
            
            if not image_path or not os.path.exists(image_path):
                raise FileNotFoundError(f"Image not found at: {image_path}")
                
            img = Image.open(image_path).convert("RGB")
            img_t = preprocess_transforms(img)
            batch_t = torch.unsqueeze(img_t, 0).to(device)
            
            with torch.no_grad():
                output = model(batch_t)
                
            probabilities = torch.nn.functional.softmax(output[0], dim=0)
            top5_prob, top5_catid = torch.topk(probabilities, 5)
            
            predictions = []
            for i in range(top5_prob.size(0)):
                category_name = categories[top5_catid[i]]
                confidence = float(top5_prob[i])
                predictions.append({
                    "category": category_name,
                    "confidence": confidence
                })
                print(f"   -> Prediction: {category_name} ({confidence * 100:.2f}%)")
            
            result_data = {
                "status": "success",
                "predictions": predictions,
                "primary_label": predictions[0]["category"],
                "confidence": predictions[0]["confidence"],
                "timestamp": time.time()
            }
            
            with open(result_path, "w") as f:
                json.dump(result_data, f, indent=4)
                
            print(f"[Backend] Result saved to {result_path}")
            
        except Exception as job_err:
            print(f"[Backend] ERROR processing job {job_file}: {job_err}")
            traceback.print_exc()
            
            error_data = {
                "status": "error",
                "error_message": str(job_err),
                "timestamp": time.time()
            }
            with open(result_path, "w") as f:
                json.dump(error_data, f, indent=4)
        
        finally:
            if os.path.exists(job_path):
                os.remove(job_path)
                print(f"[Backend] Removed pending job file: {job_file}")
                
except Exception as e:
    print(f"[Backend] Unexpected error: {e}")
    exit(1)
