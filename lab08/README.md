Lab-08

# PHP'de Class'lar

## Alıştırma #1
- Aşağıdaki hiyerarşik düzene ve dosya isimlerine uyarak 2 PHP dosyası oluşturunuz.
```
- index.php
- classes/
    - HTML.php
```

---
### Autoloaders
- Aşağıdaki kod MyClass1 ve MyClass2 class'larını `MyClass1.php` ve `MyClass2.php` dosyalarını `include` ederek bulmaya çalışır. Bu kod ile, henüz tanımlı olmayan class'ların aynı isimli bir PHP dosyasında bulunduğu farzedilmiş olunur.
```php
<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$obj  = new MyClass1();
$obj2 = new MyClass2(); 
?>
```
---

- `index.php` dosyanızın başına `spl_autoload_register()` fonksiyonunu kullanarak bilinmeyen class'lar için `classes` klasörü içerisinde arama yapacak kodu yazınız. Örneğin; MyClass isimli bir class henüz tanımlı görünmüyorsa, `classes/MyClass.php` dosyası `include` edilmelidir. Eğer istenen isimde bir dosya bulunamazsa ekrana bir hata metni çıktılanmalıdır.

---
### Magic Methods (__callStatic())
- Aşağıdaki kodda override edilen
    - `__call()` fonksiyonu, class'tan oluşturulan nesnede,
    - `__callStatic()` fonksiyonu, class'ta statik halde
    \
bulunmayan fonksiyonlar için gerçekleştirilecek eylemleri belirler.

```php
<?php
class MethodTest
{
    public function __call($name, $arguments)
    {
        // Note: value of $name is case sensitive.
        echo "Calling object method '$name' "
             . implode(', ', $arguments). "\n";
    }

    public static function __callStatic($name, $arguments)
    {
        // Note: value of $name is case sensitive.
        echo "Calling static method '$name' "
             . implode(', ', $arguments). "\n";
    }
}

$obj = new MethodTest;
$obj->runTest('in object context');

MethodTest::runTest('in static context');
?>
```

- Kodun çıktısı aşağıdaki gibidir.
```php
Calling object method 'runTest' in object context
Calling static method 'runTest' in static context
```
---

- `classes/HTML.php` dosyanızda `HTML` isminde bir class oluşturunuz. Bu class içerisinde `__callStatic()` fonksiyonu overload edilmelidir. Bu sayede

```php
HTML::body();
HTML::p();
HMTL::div();
```

şeklinde rastgele fonksiyonlar çağırılabilmelidir.

- `__callStatic()` fonksiyonunu şu özellikleri sağlayacak şekilde düzenleyiniz:
    - Bilinmeyen statik fonksiyona 2 parametre verilebilmelidir. Bu parametreler opsiyonel olmalıdır.
    - Bilinmeyen bir fonksiyon, çağırıldığında kendi ismiyle HTML etiketleri oluşturmalıdır ve bunu `string` olarak döndürmelidir. Örn;
    ```
    HTML::div(); => "<div></div>" döndürmelidir
    ```
    - İlk parametre doluysa bu veri string olarak, oluşturulan HTML etiketlerinin arasına yerleştirilmelidir. Örn;
    ```
    HTML::div('yazı'); => "<div>yazı</div>" döndürmelidir
    ```
    - İkinci parametre bir ilişkili dizi (associative array) olmalıdır. Eğer değilse işleme alınmamalıdır. İlişkili dizinin `key`leri, oluşturulan HTML etiketinin `attribute` isimleri; `value`leri ise bu `attribute`lerin değerleri olmalıdır. Örn;
    ```
    HTML::div(
        'yazı',
        ['class'=>'myclass', 'height'=>123]
    );
    
    =>
    
    '<div class="myclass" height="123">yazı</div>'
    
    döndürmelidir
    ```
    > Dikkat! HTML `attribute` değerleri çift tırnak `"..."` içerisinde yazılmalıdır. Diğer tırnak türleri çalışsa da geçerli değildir.

- Projenizin son halinde
```php
echo HTML::body(
    HTML::div(
        HTML::h1("Örnek bir başlık.") . HTML::p("Örnek bir paragraf."),
        ['class'=>'container']
    )
);
```

kodu

```
<body>
    <div class="container">
        <h1>Örnek bir başlık.</h1>
        <p>Örnek bir paragraf.</p>
    </div>
</body>
```

şeklinde bir çıktı veriyorsa, kodunuz beklendiği gibi çalışıyor demektir. (HTML çıktıdaki boşluk ve yeni satırlar önemli değildir.)

- Projenizi, ana dizinde `index.php` olacak şekilde, başka bir klasöre yerleştirmeden ZIP formatında sıkıştırıp Ekampüs'te açılan ilgili alandan verilen süre içerisinde yükleyiniz.

### Faydalı Kaynaklar
- https://www.php.net/manual/en/function.is-array.php

- https://www.php.net/manual/en/function.array-is-list.php

- https://stackoverflow.com/a/173479

- https://www.php.net/manual/en/functions.arguments.php

- https://www.php.net/manual/en/language.oop5.basic.php

- https://www.php.net/manual/en/language.oop5.autoload.php

- https://www.php.net/manual/en/language.oop5.magic.php

- https://www.php.net/manual/en/language.oop5.overloading.php#object.callstatic

