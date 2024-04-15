# Lab-07

# PHP'ye Giriş

- PHP kodlarını çalıştırabilmek için Xampp programını ve içerisinden de Apache servisini başlatın.
- Xampp programının kurulu olduğu klasörde `htdocs` adlı bir alt-klasör göreceksiniz. Bu klasörün içerisini tamamen boşaltabilirsiniz.
- Tüm PHP kodlarımızı `*.php` uzantılı dosyalara yazmalıyız. Bu dosyalar ise `htdocs` klasörümüzde bulunmalıdır.
- Bu klasörde bulunan sayfalara `http://localhost` veya `http://127.0.0.1` adresinden ulaşabiliriz.
- Bundan sonraki alıştırmalar için dilerseniz `htdocs` altında ayrı ayrı alt-klasörler oluşturabilirsiniz.
- Örn: `Alıştırma #1` için `proje01` adlı bir klasör oluşturduysanız buradaki PHP dosyalarınıza `http://localhost/proje01/dosya.php` adresinden ulaşabilirsiniz.

## Alıştırma #1
- Aşağıdaki PHP kodunu `admin_configs.php` adlı bir dosyaya kaydedin.

```php
<?php

$admins = [
    'btuadmini' => 'sifre123',
    'bilmuh' => 'bm1071'
];

?>
```

- 2 adet başka PHP dosyası oluşturun. Dosyalara istediğiniz şekilde isim verebilirsiniz.
    - Bir dosya kullanıcı adı ve şifre isteyen bir form içermeli ve (form butonuna basıldığında) diğer dosyaya bu bilgileri göndermeli.
    - İkinci dosya, kendisine gönderilen form bilgilerini almalı ve aşağıdaki maddelerde listelenen özellikleri yerine getirmelidir.


- Form verilerini alan dosyanıza, PHP kodu olarak aşağıdaki satırı ekleyin.
```php
include 'admin_configs.php';
```

- Dahil ettiğiniz bu PHP dosyasındaki `$admins` dizisinin elemanlarını kullanarak formdan gelen verileri kontrol ediniz.
- Bu dizi, `key => value` ilişkisine sahip `associative` (ilişkili) bir dizidir. Dizi elemanları, `numeric` arraylerdeki gibi indis sayısı ile değil indis ismi ile çağırılır.
    - Ek kaynak: [PHP foreach döngüsü](https://www.php.net/manual/en/control-structures.foreach.php)

- Örneğin

```php
$admins['bilmuh']
```

- elemanı `bm1071` değerine eşittir.

- Formdan gelen kullanıcı adı ve şifresi, geçerli yönetici hesaplarından biri ile uyuşuyorsa ekrana `Hoşgeldiniz, ...` yazdırınız. (... yerinde kullanıcı adı yazmalıdır)
- Diğer durumlarda bir hata mesajı yazdırınız.
- Eğer sadece kullanıcı adı eşleşiyorsa da -güvenlik sebebiyle- aynı hatayı verdiriniz.

## Alıştırma #2

- Giriş başarılı ise kullanıcının tarayıcısına bir çerez bırakınız.
    - Ek kaynaklar:
        - https://www.php.net/manual/en/function.setcookie.php
        - https://www.w3schools.com/php/func_network_setcookie.asp
        - https://www.geeksforgeeks.org/how-to-use-setcookie-function-in-php/


- Yeni bir PHP dosyası daha oluşturunuz. Bu dosya çalıştırıldığında kullanıcının tarayıcısında oluşturulan çerezin kaldırılmasını sağlayınız. (İpucu: `setcookie()` fonksiyonunu geçmiş bir tarih ile kullandığınızda çerez silinecektir.)
- Form sayfasını düzenleyiniz:
    - Kullanıcı giriş yapmış durumda değilse form görünsün.
    - Kullanıcı giriş yapmış durumda ise form HTML çıktıya hiç yazdırılmasın. Sayfada sadece kullanıcı çıkışı yapan sayfaya giden bir `Çıkış Yap` linki bulunsun.
        - Ek kaynak: https://www.php.net/manual/en/reserved.variables.cookies.php

