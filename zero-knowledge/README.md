# LAB-13

## Sıfır Bilgi Güvenlikli (Zero-Knowledge) Tek Seferlik Sır Paylaşımı

İnternet üzerinde şifre, API anahtarı veya gizli belgeleri güvenli bir şekilde paylaşmak için **tek seferlik kendini yok eden bağlantılar (self-destructing links)** kullanılır. Bu etkinlikte, sunucunun dahi sırrı okuyamadığı **Zero-Knowledge (Sıfır Bilgi)** prensibine dayalı, tarayıcıda şifrelenen tek seferlik bir sır paylaşım uygulaması geliştireceksiniz.

---

## Senaryo ve Çalışma Mantığı

1. **Sır Oluşturma:** Kullanıcı ana sayfadaki metin alanına gizli mesajını yazar ve "Bağlantı Oluştur" butonuna basar.
2. **İstemci Tarafında Şifreleme (JS):** Tarayıcı, Web Crypto API kullanarak rastgele bir şifreleme anahtarı (Key) üretir ve mesajı AES-GCM algoritması ile şifreler.
3. **Sunucuya Gönderim:** Şifrelenmiş veri (ciphertext) ve tuz (salt/IV) değerleri PHP API'sine gönderilir. **Şifreleme anahtarı kesinlikle sunucuya gönderilmez!**
4. **Bağlantı Üretimi:** PHP, veriyi MySQL'e kaydeder ve benzersiz bir ID döndürür. JS tarafı kullanıcıya şu formatta bir link sunar:
   `http://localhost/secret.php?id=<benzersiz_id>#<sifreleme_anahtari>`
   *(Not: URL'deki `#` işaretinden sonra gelen kısım (hash fragment) tarayıcı tarafından sunucuya giden HTTP isteklerinde asla gönderilmez. Bu sayede sunucu anahtarı asla öğrenemez).*
5. **Sırrı Okuma ve Kendini Yok Etme:** Alıcı linke tıkladığında:
   - PHP veritabanından şifreli mesajı okur ve **veri tabanındaki satırı kalıcı olarak siler** (Tek seferlik okuma garantisi).
   - PHP şifreli veriyi tarayıcıya döner.
   - Tarayıcıdaki JavaScript, URL'deki `#` işaretinden sonraki anahtarı alarak şifreli mesajı çözer ve kullanıcıya gösterir. Bağlantı tekrar yenilendiğinde veri veritabanından silinmiş olduğu için mesaj artık okunamaz.

---

## Alıştırma Görevi

### 1. Veritabanı ve Race Condition Önleme (MySQL)
- **Tablo Yapısı (`schema.sql`):** Benzersiz bir ID (`VARCHAR`), şifreli içerik (`TEXT`), IV/Salt bilgileri (`VARCHAR`) ve isteğe bağlı son kullanma tarihi (`expires_at`) alanlarını içeren bir tablo oluşturun.
- **Yarış Koşulu (Race Condition) Önleme:** Bir sırrı okumak için gelen ilk istek veriyi çekip silmeden hemen önce, eşzamanlı (aynı milisaniyede) gelen ikinci bir istek de veriyi okuyabilir ve sır iki kişiye birden ifşa olabilir.
- **Gereksinim:** Okuma ve silme işlemini MySQL'de **Transaction** kullanarak tek bir atomik akışta yapmalısınız veya `SELECT ... FOR UPDATE` ile satırı kilitleyip okuduktan hemen sonra silmeli, ardından transaction'ı sonlandırmalısınız. Veri tabanından silinemeyen veya çift okunan çözümler geçersiz sayılacaktır.

### 2. İstemci Tarafında Şifreleme (`index.html` & JS)
- Modern ve şık bir karanlık tema tasarlayın.
- Şifreleme ve deşifreleme işlemleri için tarayıcının yerleşik **Web Crypto API** kütüphanesini (`window.crypto.subtle`) kullanın. Harici hiçbir JS kütüphanesi (CryptoJS vb.) kullanılmamalıdır.
- Oluşturulan linkin `#` kısmında şifre çözme anahtarının güvenli bir şekilde yer aldığından emin olun.

### 3. Backend API (`secret.php` & `db.php`)
- **Kayıt Uç Noktası:** Gelen şifreli metin ve IV bilgilerini MySQL'e kaydeder.
- **Okuma Uç Noktası:** Parametre olarak gelen `id` değerine göre şifreli veriyi getirir ve **aynı istek içinde veritabanından tamamen siler**. Eğer veri bulunamadıysa (daha önce okunduysa veya hiç yoksa) HTTP `404` veya `410 Gone` hatası döndürür.

---

## Teslim Kuralları
- HTML, CSS, JS, PHP dosyalarınızı, `schema.sql` veritabanı dosyanızı ve `README.md` dosyasını içeren projeyi ZIP formatında teslim ediniz.
- ZIP dosyasına ek olarak aşağıdaki 3 adet ekran görüntüsünü (görsel dosyasını) tesliminize dahil etmelisiniz:
  1. **Yeni veri/sır eklenirken** front-end ekran görüntüsü (ekleme aşaması).
  2. **Veritabanındaki şifrelenmiş verinin (kaydın)** ekran görüntüsü (verinin sunucuda şifreli saklandığını gösteren tablo görünümü).
  3. **Veri çözülmüş (decrypted) halde** front-end'de gösterilirkenki ekran görüntüsü (alıcının mesajı okuduğu aşama).
- `README.md` dosyasında Web Crypto API ile anahtarı sunucudan nasıl gizli tuttuğunuzu ve veritabanındaki çift okuma (concurrency) sorununu hangi SQL/PHP teknikleriyle çözdüğünüzü kısaca açıklayınız.
