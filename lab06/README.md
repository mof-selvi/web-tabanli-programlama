# LAB-06


# Alıştırma #1

- [dynamic-page](dynamic-page.html) örneğini inceleyiniz. Bu sayfada birden fazla içerik arasında animasyonlu geçişler yapılmaktadır.

- Bir önceki çalışmada yaptığınız alışveriş sepeti uygulamanız için bir ödeme ekranı hazırlayacaksınız. *(İsterseniz paylaşılan çözüm üzerinden devam edebilirsiniz.)*

> Dikkat! Bu aşamadan sonra {{`bu şekilde`}} belirtilen isim, ID, değer vb ifadeleri, çözümünüzde doğrudan kullanmalısınız.
>
>Örneğin; `"yüksekliği {{20px}} olan bir div oluşturunuz"` gibi bir demeç ile karşılaştığınızda, yüksekliği tam olarak 20px olan bir div oluşturmalısınız. **"20" *(hatalı birim)*, "21px", "25px"** gibi ifadeler kullanmanız durumunda bu demecin bulunduğu maddeden puan alamazsınız.
>
>Aynı şekilde; `"{{TIKLA}} yazan bir bağlantı oluşturunuz"` cümlesi geçiyorsa, `<a> TIKLA </a>` kodu boşluklardan dolayı puan getirmeyecektir.

- Uygulamanıza üzerinde {{`Öde`}} yazan yeni bir buton ekleyiniz.

- Bu butona basıldığında toplam tutar kadar ödemenin yapılacağı bir ekran açılmalıdır. Bu ekran aynı HTML dosyanın içerisinde bulunmalıdır. İsterseniz butona basıldıktan sonra tüm alışveriş sepetini gizleyip/kaldırıp yeni ekranı getirebilirsiniz veya sepet sayfanızın en altına bu ekranı yerleştirebilirsiniz. Fakat `Öde` butonuna basılana kadar bu ekran görünmemelidir.

- Ödeme ekranı 4 bölmeden oluşmalıdır:

    - Kişisel bilgiler formu: kullanıcının isim, telefon ve e-posta bilgileri istenmeli
    - Teslimat adresi formu: siparişin teslim edileceği adresin yazılabildiği bir {{`<textarea>`}} ögesi içermeli
    - Kredi kartı ile ödeme formu: kart üzerindeki isim, kart numarası, tarih ve CVV/CVC kodu istenmeli
    - Fatura ekranı


- Bölmelerinizde, yukarıda örnek olarak verilen HTML sayfasındaki gibi üzerinde `İleri` ve `Geri` yazan 2 buton bulunmalıdır.
    - 1\. bölmede geri butonunu pasif (bkz: `disabled`) tutabilirsiniz veya alışveriş sepetine gidecek şekilde ayarlayabilirsiniz. Ya da tamamen görünmez hale getirebilirsiniz. *Fakat tarayıcı daha geriye, olmayan bir bölmeye gitmeye çalışıp konsola hata yazdırmamalıdır.*
    - 1\. ve 2\. bölmelerinizde ileri butonu bir sonraki bölmeye kontrollü *(aşağıda açıklanacak)* geçiş yapmalı.
    - 2\. ve 3\. bölmelerinizde geri butonu bir önceki bölmeye kontrollü geçiş yapmalı.
    - 3\. bölmenizde ileri butonunun yerine üzerinde {{`Alışverişi Tamamla`}} yazan bir buton olmalı.

    - İleri gitme ve tamamlama butonları, bulundukları bölmedeki tüm `input` ögelerinin dolu olup olmadığını kontrol etmelidir.

    - Alışveriş tamamlama butonu, tıklandığında müşterinin kişisel bilgilerini, teslimat adresini ve alışverişin toplam tutarını gösteren bir fatura görüntüleme ekranı çıkarmalıdır. Fatura ekranında herhangi bir buton vb öge bulunmasına gerek yoktur. Kredi kartı bilgilerinin görünmüyor olması gerekmektedir.



## Gönderimler
- Bu etkinlikte sadece 1 HTML dosyası gönderilmelidir. Farklı formatlarda yüklenen dosyalar geçersiz olacaktır.
- Gönderimlerinizi Ekampüs sayfasında açılmış olan uygun yükleme alanından yapınız. Başka yoldan yapılan gönderimler kabul edilmemektedir.
- Yükleme alanının başlığında hem lab dersimizin numarası hem de tarihi mevcuttur. Buna rağmen başka alana yapılan yüklemeler geçersiz sayılır.
- Ekampüs'te görmüş olduğunuz süre geçerlidir. Süre sonrasında yapılan gönderimler geçersizdir.
- Bu etkinlikte yapılan gönderimlere intihal kontrolü uygulanır.

