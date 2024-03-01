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

---
# Alıştırma #1
- BTU tercih websitesindeki [Site Haritası](https://tercih.btu.edu.tr/tr/sayfa/sitemap) sayfasına gidiniz. Bu sayfadan rastgele 3 bölüm seçip bağlantılarına tıklayınız.
- Açılan sayfalarda bölüm isminin yazdığı, ortada bir "oynat" tuşu bulanan kahverengi tonlu resimler göreceksiniz.
- Bu resimlerin kaynaklarını **dilediğiniz yoldan** elde ederek kendi HTML sayfanızda kullanınız.
- 3 resmi HTML sayfanızda alt alta ekleyiniz. Her bir resmi, kendi üzerinde belirttiği bölümün adresine gidecek şekilde link/bağlantı haline dönüştürünüz.
- Her resmin üzerinde bölümün ismini yazınız fakat bu yazılar bağlantıya dahil olmamalıdır.
- Her bölüm ismini, unordered-list içerisinde bir öğe olacak şekilde ayarlayınız.
- Resimlerin öğelerin içerisinde mi yoksa arasında mı olması gerektiğini deneyerek bulmaya çalışınız. İki yolu da deneyip tarayıcınızın DOM Tree düzeltmesi yapıp yapmadığını gözlemleyiniz.
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

> Alıştırma sonunda tüm dosyalarınızı *.zip formatında sıkıştırılmış klasöre çevirip Ekampüs'ten ilgili haftanın alıştırma yükleme kısmından göndermeyi unutmayınız. Zip dosyası açıldığında doğrudan ilk HTML dosyanız ve alt klasörleriniz görünmelidir. Lütfen projenizin bulunduğu klasörü değil, içerisindeki tüm dosyaları seçerek sıkıştırma yapınız.
