# LAB-03

- # CSS'e Giriş

- Aşağıdaki kod tüm \<p> etiketi ile belirlenmiş paragrafların rengini kırmızı (#FF0000) yapar.
```
<!doctype html>
<html>
<head>
    <title>CSS'e Giriş</title>
    <style>
        p {
            color: #FF0000;
        }
    </style>
</head>
<body>
    <p>CSS ile biçimlendirilmiş paragraf örneği.</p>
    <div>CSS kodu sadece p etiketi için belirtilmiş olduğundan burası varsayılan biçimde kalır.</div>
    <p>Bu paragraf da aynı biçime sahip.</p>
</body>
</html>
```

- Class belirleyerek sadece belirli bir grup paragrafın biçimlendirilmesini de sağlayabiliriz. CSS'te class'lar nokta (.) ile başlanarak belirtilir.
```
<!doctype html>
<html>
<head>
    <title>CSS'e Giriş</title>
    <style>
        p.bicimlendirilmis {
            color: #FF0000;
        }
    </style>
</head>
<body>
    <p class="bicimlendirilmis">CSS ile biçimlendirilmiş paragraf örneği.</p>
    <div>CSS kodu sadece p etiketi için belirtilmiş olduğundan burası varsayılan biçimde kalır.</div>
    <p>Bu paragraf biçimlendirilmez çünkü belirtilen class bu paragrafa eklenmemiş.</p>
</body>
</html>
```

- CSS'te bir stilin etkileyeceği grubu belirttiğimiz {...} ifadesinden önceki kısım "selector" olarak adlandırılır. Bir CSS class'ının tüm etiketler için geçerli olması için selector'daki etiket kaldırılabilir.
- Alt seviyede bulunan bir etiket, üst seviyeden biçimleri (kendisi için bu stiller özellikle belirtilmemişse) kalıtım alır. Bu p ve heading (h1, h2...) için geçerli değildir.
```
<!doctype html>
<html>
<head>
    <title>CSS'e Giriş</title>
    <style>
        .bicimlendirilmis {
            color: #FF0000;
        }
    </style>
</head>
<body>
    
    <p class="bicimlendirilmis">
        CSS ile biçimlendirilmiş paragraf örneği.
        <p>Burası paragraf içerisinde bulunan bir alt paragraf.</p>
    </p>
    
    <div class="bicimlendirilmis">
        CSS ile biçimlendirilmiş div örneği.
        <div>Burası div içerisinde bulunan bir alt div.</div>
    </div>

</body>
</html>
```

- HTML'de bir etiket için birden fazla class belirtilebilir.
```
<!doctype html>
<html>
<head>
    <title>CSS'e Giriş</title>
    <style>
        .stilA {
            color: #FF0000;
            font-family: 'Courier New', Courier, monospace;
        }

        .stilB {
            font-size: xx-large;
            text-align: center;
        }

    </style>
</head>
<body>

    <div class="stilA">
        stilA sınıflı div
    </div>

    <div class="stilB">
        stilB sınıflı div
    </div>

    <div class="stilA stilB">
        Hem stilA hem de stilB sınıflı div
    </div>

</body>
</html>
```

- # CSS Çeşitleri
- 3 çeşit CSS vardır:
  - Internal CSS (dahili)
  - Inline CSS (satır içi)
  - External CSS (harici)

- ## Internal CSS
- Bu dökümanda şu ana kadar gördüğümüz kodlar "internal CSS" türündendir. Bu türde, CSS kodları \<style>...\</style> etiketleri arasına yazılır.
- \<style> etiketleri body veya head içerisinde de olabilir fakat bunları head içerisine koymak, sayfa içeriği ile biçimlendirmesini ayırmak için daha mantıklıdır.
- Genel olarak syntax aşağıdaki gibidir. "type" niteliği belirtilmek zorunda değildir.
```
<style type="text/css"></style>
```

- ## Inline CSS
- Bu türde, CSS komutları (sadece {...} arası) etki etmesi istenen HTML etiketinin "style" niteliği içerisine yazılır.
```
<!doctype html>
<html>
<head>
    <title>CSS'e Giriş</title>
</head>
<body>

    <div style="color:#390b61; font-size: 50px;">
        Sınıf yok fakat stil var.
    </div>

    <div style="color:#27530a; font-weight: 800;">
        Sınıf yok fakat stil var. Hem rengi değiştirdik hem de yazı kalınlığını.
    </div>

</body>
</html>
```
- Inline CSS, diğer türdeki CSS komutlarını override edebilir.


- ## External CSS
- CSS kodları, harici bir *.css dosyasına yazılıp HTML sayfalarda kullanılabilir. Bunun için head etiketleri arasında aşağıdaki gibi css dosyasının konumu belirtilmelidir. (Link etiketindeki type niteliği opsiyoneldir.)

sayfam.html dosyasının içeriği
```
<!doctype html>
<html>
<head>
    <title>CSS'e Giriş</title>
    <link rel="stylesheet" href="stilim.css" type="text/css">
</head>
<body>

    <div class="stilA">
        stilA sınıflı div
    </div>

    <div class="stilB">
        stilB sınıflı div
    </div>

    <div class="stilA stilB">
        Hem stilA hem de stilB sınıflı div
    </div>

</body>
</html>
```

stilim.css dosyasının içeriği:
```
.stilA {
    color: #FF0000;
    font-family: 'Courier New', Courier, monospace;
}

.stilB {
    font-size: xx-large;
    text-align: center;
}
```

- # CSS Selectors
- İyi biçimlendirme yapmak için selector'ları kullanmayı bilmek önemlidir.
- Bu selector'lar çoğunlukla Javascript kodlarında, HTML sayfalarda belirli bir alanı seçebilmek ve üzerinde işlemler yapabilmek için de kullanılır.
- Selector'lar için kaynaklar:
    - [W3Schools](https://www.w3schools.com/cssref/css_selectors.php)
    - [Mozilla](https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_selectors)
    - [Mozilla Learn](https://developer.mozilla.org/en-US/docs/Learn/CSS/Building_blocks/Selectors)

