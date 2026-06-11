# Yapay Zeka Entegrasyonu (Hayvan Sınıflandırma Modeli)

Bu dökümanda, dosya tabanlı bir kuyruk (file-based queue) mekanizması kullanarak bir arka plan yapay zeka servisine nasıl girdi gönderileceğini ve bu servisten çıktının nasıl alınacağını anlatılmaktadır. Etkinlikte yapmanız gereken; `backend.py` dosyası ile entegre çalışabilen bir PHP dosyası (`index.php`) oluşturup kullanıcıların yükledikleri fotoğraflardaki hayvanların sınıfını öğrenebilmelerini sağlamak.

**Not:** Bu kılavuz, herhangi bir web arayüzü (PHP/HTML) olmadan, doğrudan Python ortamı üzerinden modelin nasıl tetikleneceğini ve entegrasyonun temel mantığını açıklamaktadır. Gerekli PHP kodları kendiniz sağlamalısınız. Etkinlik sonunda sadece `index.php` dosyasını Ekampüs sistemine yükleyiniz.

---

## 1. Çalışma Mantığı ve Dosya Yapısı

Entegrasyon, veritabanı veya karmaşık soket bağlantıları yerine tamamen **dosya sistemi** üzerinden gerçekleşir. İletişimi sağlamak için aşağıdaki dizin yapısı kullanılır:

* `uploads/` -> Sınıflandırılacak olan görsel dosyalarının (JPG, PNG, vb.) yüklendiği yer.
* `jobs/pending/` -> İşleme bekleyen görevleri tanımlayan `.json` dosyalarının bulunduğu yer.
* `jobs/completed/` -> Model çalıştıktan sonra üretilen tahmin sonuçlarının yazıldığı `.json` dosyalarının bulunduğu yer.

---

## 2. Kurulum ve Ortam Hazırlığı (Windows & Linux)

> Not: Bu etkinlik yerel bir Python environment (sanal ortam) üzerinde çalışacak şekilde tasarlanmıştır. Aşağıdaki kodları `htdocs` dizini altında çalıştırmanız önerilir.

Sanal ortamı oluşturmak ve gerekli kütüphaneleri yüklemek için aşağıdaki adımları uygulayın:

### Linux / macOS:
```bash
# Sanal ortam oluşturun
python3 -m venv .venv

# Sanal ortamı aktifleştirin
source .venv/bin/activate

# Gerekli bağımlılıkları yükleyin
pip install -r requirements.txt
```

### Windows (PowerShell):
```powershell
# Sanal ortam oluşturun
python -m venv .venv

# Sanal ortamı aktifleştirin
.venv\Scripts\Activate.ps1

# Gerekli bağımlılıkları yükleyin
pip install -r requirements.txt
```

---

## 3. Adım Adım Manuel Entegrasyon

Aşağıdaki adımları takip ederek yapay zeka modelini komut satırından tetikleyebilir ve sonuçları gözlemleyebilirsiniz.

### Adım 1: Sınıflandırılacak Görseli Hazırlayın
Sınıflandırmak istediğiniz bir hayvan fotoğrafını (örneğin bir kedi veya köpek resmi) `uploads` klasörünün içine kopyalayın.
* Görsel yolu örneği: `uploads/test_resim.jpg`

### Adım 2: İş (Job) Dosyasını Oluşturun
Modelin resmi bulup işleyebilmesi için `jobs/pending/` klasörünün içerisine benzersiz isimde bir `.json` dosyası oluşturun.
* Dosya yolu örneği: `jobs/pending/job_test.json`

Oluşturduğunuz JSON dosyasının içeriği aşağıdaki formatta olmalıdır (`image_path` alanına görselin doğru yolunu yazdığınızdan emin olun):

```json
{
    "job_id": "job_test",
    "image_path": "uploads/test_resim.jpg"
}
```

### Adım 3: Python Modelini Çalıştırın
Local sanal ortamı (`.venv`) kullanarak `backend.py` betiğini çalıştırın. Bu işlem, pending (bekleyen) klasöründeki görevleri okur, yapay zeka modelini (MobileNetV2) çalıştırır ve çıktı üretir.

Komut satırında (PowerShell) şu komutu çalıştırın:
```powershell
& .venv/Scripts/python backend.py
```

*Not: Komut çalışıp tamamlandığında `jobs/pending/job_test.json` dosyası otomatik olarak kuyruktan silinecektir.*

### Adım 4: Sonuçları İnceleyin
Python betiği başarıyla çalıştıktan sonra `jobs/completed/` klasöründe aynı isimde bir sonuç dosyası oluşacaktır.
* Sonuç dosyası yolu: `jobs/completed/job_test.json`

Dosyayı açtığınızda modelin tahmin sonuçlarını ve güven skorlarını (confidence) görebilirsiniz:

```json
{
    "status": "success",
    "predictions": [
        {
            "category": "golden retriever",
            "confidence": 0.9421
        },
        {
            "category": "Tibetan mastiff",
            "confidence": 0.0312
        }
    ],
    "primary_label": "golden retriever",
    "confidence": 0.9421,
    "timestamp": 1718115600.123
}
```

---

## 4. Entegrasyon Ödevi İçin İpucu
Web uygulamanızı (Frontend/PHP) geliştirirken yapmanız gereken tek şey:
1. Kullanıcıdan bir dosya yüklemesi almak ve bunu `uploads/` klasörüne kaydetmek.
2. `jobs/pending/` içerisine yukarıdaki formatta bir `.json` dosyası yazmak.
3. PHP içinden `shell_exec` ile Python betiğini tetiklemek.
4. `jobs/completed/` klasörüne yazılan sonuç dosyasını okuyup ekrana bastırmak.
