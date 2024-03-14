# CSS Komutları ve Örnekler

## Temel Komutlar

### Renk Belirtme

Renkler hexadecimal, RGB veya isimle belirtilebilir.

```css
/* Hexadecimal */
.color-hex {
    color: #FF0000;
}

/* RGB */
.color-rgb {
    color: rgb(255, 0, 0);
}

/* İsim */
.color-name {
    color: red;
}
```

### Padding ve Margin

Padding ve margin değerlerine tek, çift ve dörtlü değerler verilebilir:

```css
/* Tek Değer */
.element {
    padding: 10px;
    margin: 10px;
}

/* Çift Değer */
.element {
    padding: 10px 20px;
    margin: 10px 20px;
}

/* Dörtlü Değer */
.element {
    padding: 10px 20px 15px 25px;
    margin: 10px 20px 15px 25px;
}
```

### Gölgelendirme

```css
.shadow {
    box-shadow: 2px 2px 5px #888888;
}
```

### Kalıtım ve Important İfadesi

- Aşağıdaki tüm class'ları tek bir HTML ögesinde kullanınız. Çalıştırdıktan sonra kod satırlarının yerlerini değiştirip tekrar çalıştırmayı deneyiniz.

```css
/* Kalıtım */
.parent {
    color: blue;
}
.child {
    /* Parent'ın rengini kalıtım olarak alır */
}

/* Important İfadesi */
.element {
    color: red !important;
}
```

### Display

CSS'de `display` özelliği, bir HTML öğesinin nasıl gösterileceğini belirler. Temel olarak, bu özellik HTML öğelerinin blok düzeni, enine düzeni veya gizlenmiş olup olmayacağını kontrol eder. İşte `display` özelliği için kullanılabilecek seçeneklerin farkları:

1. **block**: Öğeyi bir blok olarak görüntüler. Blok öğeler, ekrandaki genişliklerinin tamamını kaplar ve her zaman yeni bir satırda başlar. (Örneğin, `div`, `p`, `header` gibi.)

2. **inline**: Öğeyi bir satır içinde görüntüler. Satır içi öğeler, içeriğin boyutuna göre genişler ve yan yana sıralanır. (Örneğin, `span`, `a`, `strong` gibi.)

3. **inline-block**: Öğeyi bir satır içinde görüntüler, ancak blok özelliklerini korur. Yani, içeriği satır içinde hizalanırken, öğe genişlik ve yükseklik özelliklerini alabilir. (Bu özellik, `inline` ve `block` özelliklerinin birleşimidir.)

4. **none**: Öğeyi görünmez hale getirir. Bu, bir öğenin sayfada hiçbir yer kaplamamasını sağlar ve görünmez hale getirir. Öğenin içeriği veya yer tutucu (placeholder) alanı dikkate alınmaz.

5. **flex**: Öğeyi bir flex konteyneri olarak görüntüler. Flex konteynerleri, içerdikleri öğeleri esnek bir düzende hizalar ve öğelerin boyutunu ve sıralamasını kontrol edebilirler.

6. **grid**: Öğeyi bir grid konteyneri olarak görüntüler. Grid konteynerleri, içerdikleri öğeleri bir ızgara (grid) içinde hizalar ve öğelerin konumunu ve boyutunu kontrol edebilirler.

6. **grid**: Öğeyi bir grid konteyneri olarak görüntüler. Grid konteynerleri, içerdikleri öğeleri bir ızgara (grid) içinde hizalar ve öğelerin konumunu ve boyutunu kontrol edebilirler.

7. **table**: Öğeyi bir tablo olarak görüntüler. `table` özelliği, içeriğin tablo olarak düzenlenmesini sağlar. Tablo öğeleri (`<table>`, `<tr>`, `<td>`, `<th>`) için kullanılır. Bu özellik, tablo düzenini kullanmak istediğinizde faydalıdır.

```css
        /* block öğe */
        .display-block {
            display: block;
        }

        /* inline öğe */
        .display-inline {
            display: inline;
        }

        /* inline-block öğe */
        .display-inline-block {
            display: inline-block;
        }

        /* gizlenmiş öğe */
        .display-none {
            display: none;
        }

        /* flex konteyneri */
        .display-flex {
            display: flex;
        }

        /* grid konteyneri */
        .display-grid {
            display: grid;
        }

        /* table konteyneri */
        .display-table {
            display: table;
        }
```

> Bu CSS örneği, `display` özelliğinin farklı seçeneklerini kullanan farklı HTML öğeleri için hazırlanmış class'ları içerir.


# Alıştırma #1
- Aşağıdaki örneği çalıştırıp her bir `container` class'lı div'in çıktısını inceleyiniz.

```html
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSS | Display Alıştırmaları</title>
    <style>

        /* Dış divlerin çerçeve sınırları */
        .container {
            border: 2px solid red;
            /* margin-bottom: 20px; */
        }

        /* Her bir div içindeki içeriklerin düzeni */
        .inner-container {
            display: inline-block;
        }

        /* Kare şeklinde arkaplanı renkli divler */
        .box {
            width: 100px;
            height: 100px;
            margin: 5px;
            background-color: lightblue;
            border: 1px solid orange;
            display: inline-block;
        }


        /* block öğe */
        .display-block {
            display: block;
        }

        /* inline öğe */
        .display-inline {
            display: inline;
        }

        /* inline-block öğe */
        .display-inline-block {
            display: inline-block;
        }

        /* gizlenmiş öğe */
        .display-none {
            display: none;
        }

        /* flex konteyneri */
        .display-flex {
            display: flex;
        }

        /* grid konteyneri */
        .display-grid {
            display: grid;
        }

        /* table konteyneri */
        .display-table {
            display: table;
        }

    </style>
</head>
<body>
    
    <hr>

    <h2>display: block</h2>
    <div class="container display-block">
        <div class="box"></div>
        <div class="box"></div>
        <div class="box"></div>
    </div>

    <hr>

    <h2>display: inline</h2>
    <div class="container display-inline">
        <div class="box"></div>
        <div class="box"></div>
        <div class="box"></div>
    </div>

    <hr>

    <h2>display: inline-block</h2>
    <div class="container display-inline-block">
        <div class="box"></div>
        <div class="box"></div>
        <div class="box"></div>
    </div>

    <hr>

    <h2>display: none</h2>
    <div class="container display-none">
        <div class="box"></div>
        <div class="box"></div>
        <div class="box"></div>
    </div>

    <hr>

    <h2>display: flex</h2>
    <div class="container display-flex">
        <div class="box"></div>
        <div class="box"></div>
        <div class="box"></div>
    </div>

    <hr>

    <h2>display: grid</h2>
    <div class="container display-grid">
        <div class="box"></div>
        <div class="box"></div>
        <div class="box"></div>
    </div>

    <hr>

    <h2>display: table</h2>
    <div class="container display-table">
        <div class="box"></div>
        <div class="box"></div>
        <div class="box"></div>
    </div>
</body>
</html>
```

# Alıştırma #2
