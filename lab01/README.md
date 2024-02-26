# LAB-01

# 1) HTML dosyası oluşturma

* HTML sayfamızın iskeletini oluşturalım:
```
<!DOCTYPE html>
<html>
<head>
    <title>Web Tabanlı Programlama - Örnek HTML Sayfası</title>
</head>
<body>

</body>
</html>
```
Not:
> \<!DOCTYPE html> etiketi tarayıcıya döküman tipi hakkında bilgi verir. Profesyonel hayatta HTML5 standartlarına uymak için gereklidir. Fakat, quizlerinizde bu etiketin olup olmaması değerlendirmeleri etkilemeyecektir. Diğer etiketlere (html, head, body) dikkat ediniz.

* HTML'de bir alanı belirtmek için \<etiket>...\</etiket> şeklinde etiketleri (tags) kullanırız.

* Bazı etiketler ise kapama etiketine sahip olmayabilir (void elements). Bunlar belirli bir alanı belirtmek yerine tek başına bir özellik sağlamaktadır. Örneğin, sayfamızın Türkçe karakterleri desteklemesi için \<head>...\</head> etiketleri arasına şu kodu yerleştirebiliriz:
```
<meta charset="Windows-1254">
```

veya
```
<meta charset="ISO-8859-9">
```

UTF-8 kodlu bir dosyada UTF-8 karakter setini belirtmek daha iyi bir yoldur:
```
<meta charset="UTF-8">
```

* HTML'deki tüm void element etiketleri şunlardır:
> area, base, br, col, embed, hr, img, input, link, meta, source, track, wbr

* HTML sayfamızın içeriğinin özellikle arama motorları tarafından anlaşılabilmesi için bazı etiketler kullanırız:
```
<meta name="keywords" content="Web Tabanlı Programlama, HTML, CSS, JS, PHP">
<meta name="description" content="Web Tabanlı Programlama dersinin web sitesi.">
<meta name="author" content="Sayfa içeriği yazarının adı soyadı">
```

* Sayfa içerisinde görüntülenmesini istediğimiz içerikleri \<body> etiketi içerisine yazacağız.

# 2) Temel HTML

* Sayfa içeriğinde ortalanmış 1. seviye bir başlık oluşturalım:
```
<h1 align="center">Web Tabanlı Programlama</h1>
```

* Yatay bir çizgi ekleyelim:
```
<hr>
```
Not: void elementler HTML5 standartlarına göre kendini-kapatan (self-closing) olmak zorunda değildir. \<hr/> veya \<br/> kullanımları eski HTML4 standartları içindir. Günümüzde güncel tarayıcılarda kullanılmaları hata oluşturmasa da mümkün olduğunca kaçınılmalıdır.

* Seviyesi 2 olan bir başlık oluşturalım:
```
<h2>1. Head Etiketi</h2>
```

---
### Alıştırma #1:
* HTML'de heading etiketleri h1-h6 arasındadır. Diğer seviyelerdeki başlıkları deneyip çıktıyı gözlemleyiniz.
---

* Sayfamıza bir paragraf yerleştirelim:
```
<p>
    Body etiketi; web sayfasının kullanıcı tarafında görünen bilgilerinin yer aldığı kısımdır. 
    Bu kısımda başlıklar, paragraflar bulunur. Web sayfasının asıl içeriğinin bulunduğu kısımdır.<br>
    Başlıklar, metinler, görseller, tablolar...
</p>
```

# 3) HTML4 yazı biçimlendirme teknikleri

* Yazı boyutu değiştirme:
```
<p>
    Boyut belirlemek için font etiketinin "size" niteliği kullanılmaktadır.
    <br>Örnek:<br>
    <font size="12">Boyutu değiştirilmiş metin.</font>
</p>
```

* Font tipi değiştirme:
```
<p>
    Yazı tipi belirlemek için font etiketinin "face" niteliği kullanılmaktadır.
    <br>Örnek:<br>
    <font face="Verdana">Yazı tipi değiştirilmiş metin.</font>
</p>
```

* Yazı rengi değiştirme:
```
<p>
    Yazı rengi belirlemek için font etiketinin color niteliği kullanılmaktadır.
    <br>Örnek:<br>
    <font color="Magenta">Yazı rengi değiştirilmiş metin.</font>
</p>
```

Not!
> \<face> etiketi HTML5 standartlarına uygun değildir. Tarayıcılar yavaş yavaş eski standartlara olan desteklerini kaldırıyor olmalarından dolayı bu gibi etiketleri profesyonel hayatta kullanmamak en iyi tercih olacaktır. Fakat, dersimizin ilk haftalarında CSS görmediğiniz için ve çözeceğiniz quizlerde CSS kullanımı yasak olacağı için ilk CSS haftasına kadar olan quiz çözümlerinizde bu etiketleri kullanmalısınız.

### Alıştırma #2:
* HTML sayfanıza hem boyutu, hem font tipi, hem de rengi değiştirilmiş bir metni tek \<face> etiketini kullanarak ekleyiniz.

### Alıştırma #3:
[Kategorik olarak listelenmiş HTML etiketleri](https://www.w3schools.com/tags/ref_byfunc.asp) sayfasına giriniz. Özellikle "Formatting" başlığı altındaki etiketlerden başlayarak HTML etiketleri örneklerini inceleyip kendi sayfanıza uyarlayınız. Bu alıştırmada sayfanıza anlamlı içerikler yerleştirmenize gerek yoktur.
