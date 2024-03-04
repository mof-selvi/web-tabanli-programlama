# LAB-02

- # HTML'de Resim
```
<img src="https://depo.btu.edu.tr/img/sayfa//1691131969_8a51c342027f1a147a8b.png">
```

- # HTML'de Link/Bağlantı
```
<a href="http://btu.edu.tr">BURSA TEKNİK ÜNİVERSİTESİ</a>
```

- # HTML'de Listeler
  - ## Sırasız Listeler (Unordered Lists)
  ```
  <p>Üniversitemizdeki bölümler:</p>
  <ul>
    <li>Bilgisayar Mühendisliği</li>
    <li>Endüstri Mühendisliği</li>
    <li>Elektrik-Elektronik Mühendisliği</li>
  </ul>
  ```
  - ## Sıralı Listeler (Ordered Lists)
  ```
  <div>Üniversitemizdeki bölümler:</div>
  <ol>
    <li>Bilgisayar Mühendisliği</li>
    <li>Endüstri Mühendisliği</li>
    <li>Elektrik-Elektronik Mühendisliği</li>
  </ol>
  ```
## Not:
> \<p> etiketi paragraf biçimlendirmelerini otomatik yapmaktadır. \<div> etiketi ise belirli bir HTML parçayı gruplandırmak/bölümlendirmek (division) için kullanılır. Bu sebeple CSS kütüphanelerindeki sınıflar çoğunlukla \<div> etiketi ile kullanılır.
> Herhangi bir sınıfı (class) \<div> etiketinden başka etiketlerde kullanmama gibi bir sınırlama yoktur. \<div> sadece, varsayılan olarak ekstra biçimlendirme özellikleriyle gelmediği için CSS ile biçimlendirme yaparken daha kullanışlıdır.
> Sonraki haftalarda CSS konusuna geldiğimizde bu konuya tekrar değineceğiz.


- # HTML Formlar
HTML'de form yapısı şu şekildedir:
```
<form action="hedef.html" method="POST">

  <label for="uname">Kullanıcı adı:</label><br>
  <input type="text" id="uname" name="username"><br>

  <label for="upass">Password:</label><br>
  <input type="password" id="upass" name="pass"><br>

</form>
```
> action niteliği form verilerinin gönderileceği hedef URL'i belirtir.

> method niteliği form verilerinin gönderim türünü belirtir. GET veya POST (büyük-küçük harf duyarsız) olabilir.

> label etiketleri bir form oluşturmak için şart olmasa da ekran okuyucu kullananların, inputları ayırt edebilmelerini sağlar.

> form etiketleri içerisinde sıklıkla kullanılan form elementi etiketleri: \<input>, \<textarea>...\</textarea>, \<button>...\</button>
> [Tüm form etiketleri](https://www.w3schools.com/html/html_form_elements.asp)

> Formlarda en çok kullanılan etiket \<input> etiketidir. Bu etiketin type niteliği ile çeşitli türlerde veri girişi alınabilen formlar üretmek mümkündür.
> [Tüm input tipleri](https://www.w3schools.com/html/html_form_input_types.asp)

> Yukarıdaki örnekteki form kullanıcı tarafından henüz gönderilebilir durumda değildir. Bunun için "submit" edebilen bir öğeye de ihtiyacımız vardır.
```
<button type="submit">GÖNDER</button>
```
veya
```
<input type="submit" value="GÖNDER">
```
> \<button> etiketinin type niteliği varsayılan olarak "submit"tir. Bu nitelik yazılmadan da form gönderimi yapılabilir.

> Ekstra bilgi: "submit" tipinde input etiketi kullanıldığında value değeri de karşıya gönderilir (name=value şeklinde).

> Bu aşamadan sonra form, gönderilebilir hale gelmiş olur. POST/GET metoduyla gönderilmiş veriler hedef URL'deki programda input etiketlerinin "name" niteliğindeki isim kullanılarak erişilebilir.
> Gönderilen form verilerini HTML içerisinde işleyemeyiz. Bu veriler sunucu tarafında işlenmelidir. Bu yüzden sunucu taraflı çalışan bir program yazmamız gerekir.
> İlerleyen haftalarda PHP diline giriş yaptıktan sonra bu form verilerini işlemeyi göreceğiz.


---
# Alıştırma #1
- BTU tercih websitesindeki [Site Haritası](https://tercih.btu.edu.tr/tr/sayfa/sitemap) sayfasına gidiniz. Bu sayfadan rastgele 3 bölüm seçip bağlantılarına tıklayınız.
- Açılan sayfalarda bölüm isminin yazdığı, ortada bir "oynat" tuşu bulanan kahverengi tonlu resimler göreceksiniz.
- Bu resimlerin kaynaklarını **dilediğiniz yoldan** elde ederek kendi HTML sayfanızda kullanınız.
- 3 resmi HTML sayfanızda alt alta ekleyiniz. Her bir resmi, kendi üzerinde belirttiği bölümün adresine gidecek şekilde link/bağlantı haline dönüştürünüz.
- Her resmin üzerinde bölümün ismini yazınız fakat bu yazılar bağlantıya dahil olmamalıdır.
- Her bölüm ismini, unordered-list içerisinde birer öğe olacak şekilde ayarlayınız.
---

- # Yollar (paths)
  HTML'de kaynak adresler veya dosyalar belirtilirken, aynen işletim sistemlerinde olduğu gibi, iki yol kullanılabilir.
  - ## Mutlak Yollar (Absolute Paths)
  ```
  https://btu.edu.tr
  https://btu.edu.tr/tr/sayfa/akademik-birimler
  ```
  - ## Bağıl Yollar (Relative Paths)
  ```
  ./
  tr/sayfa/akademik-birimler
  ```
  > Yukarıdaki örnekler için bağlantılar sırasına göre birbirleri yerine (ana sayfa üzerinde) kullanılabilir.
  > Dikkat edilmesi gereken nokta bağıl yolların hangi konumdan verildiğidir. Nihai yol, o anki çalışma yoluna bağıl yolun eklenmesiyle belirlenir. 
  > Tek nokta (.) şu anki konum, çift nokta (..) bir üst seviyenin konumu anlamına gelmektedir.
  > Mutlak ve bağıl yollar, ilerleyen zamanlarda işleyeceğimiz CSS, JS gibi konular için de önemlidir.

  Dikkat!
  > "C:/Users/bilmuh/Desktop/HTML%20Projesi/resim.jpg" \
  > veya \
  > "file:///C:/Users/bilmuh/Desktop/HTML%20Projesi/resim.jpg" \
  > şeklinde bir kaynak gösterimini web uygulamalarınızda asla kullanmayınız. Bu mutlak yol yalnızca sizin bilgisayarınızda geçerli bir yoldur. Bir web uygulaması için mutlak yol http:// veya https:// ile başlar.

---
# Alıştırma #2
- Bir önceki alıştırmada yaptığınız HTML dosyasını klonlayınız ve dosya adının sonuna "2" koyunuz. Bu dosyayı "subpage" isimli bir klasöre koyunuz.
- Yeni HTML dosyanızdaki resimlerin kaynaklarını bağıl yol olacak şekilde değiştireceksiniz. Bunun için resimleri indirmeniz gerekecektir. Resimleri bir üst dizinde, "subpage" klasörüyle aynı yerde "images" klasörü açarak içerisine kaydediniz.
- Proje klasörünüzün nihai yapısı şu şekilde olmalıdır:
```
index.html
  /subpage
    index2.html
  /images
    img1.png
    img2.png
    img3.png
```


---


# Alıştırma #3
- kayit_formu.html ve kayit_yap.html isimleriyle 2 adet HMTL dosyası oluşturunuz.
- "kayit_formu.html" dosyasına, yukarıdaki HTML form oluşturma kodlarını kullanarak, kullanıcılardan kayıt bilgilerinin alınabildiği bir form yerleştiriniz.
- Kullanıcıdan istediğiniz bilgileri isteyebilirsiniz. En az 5 farklı tipte veri alınız (yukarıdaki linkleri verilen input tipleri veya form elementleri sayfalarına bakabilirsiniz).
- Formunuzun hedefini "kayit_yap.html" dosyasını gösterecek şekilde düzenleyiniz.
- Hedef HTML sayfanızın içeriğine istediğiniz bir karşılama mesajı yerleştiriniz.
- Formunuzu doldurup göndermeyi deneyiniz.
- Proje klasörünüzün nihai yapısı şu şekilde olmalıdır:
```
kayit_formu.html
kayit_yap.html
index.html
  /subpage
    index2.html
  /images
    img1.png
    img2.png
    img3.png
```
---


> Alıştırma sonunda tüm dosyalarınızı *.zip formatında sıkıştırılmış klasöre çevirip Ekampüs'ten ilgili haftanın alıştırma yükleme kısmından göndermeyi unutmayınız. Zip dosyası açıldığında doğrudan ilk HTML dosyanız ve alt klasörleriniz görünmelidir. Lütfen projenizin bulunduğu klasörü değil, içerisindeki tüm dosyaları seçerek sıkıştırma yapınız.
