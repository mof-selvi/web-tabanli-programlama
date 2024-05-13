# PHP VERİ TABANI BAĞLANTISI

## BAĞLANTI OLUŞTURMA

Aşağıda PHP'den MySQL'e bağlanabilmenin en temel 2 yolu verilmiştir. 1 ya da 2 nolu seçenekten birini kullanarak yeni oluşturduğunuz veritabanınıza bağlanınız.

### 1. Procedural Connection

```php
<?php
$mysqli = mysqli_connect("example.com", "user", "password", "database");

$result = mysqli_query($mysqli, "SELECT column1, column2 FROM MyTable");
$row = mysqli_fetch_assoc($result);
echo $row['column2'];
mysqli_close($conn);
?>
```

### 2. Object Oriented Connection

```php
<?php
$mysqli = new mysqli("example.com", "user", "password", "database");

$result = $mysqli->query("SELECT column1, column2 FROM MyTable");
$row = $result->fetch_assoc();
echo $row['column2'];
$conn->close();
?>
```

#### MySQL Bağlantı ve Query Kaynakları

- https://www.w3schools.com/php/func_mysqli_connect.asp
- https://www.w3schools.com/php/func_mysqli_query.asp
- https://www.w3schools.com/php/func_mysqli_fetch_assoc.asp
- https://www.php.net/manual/en/function.mysql-connect.php

## Alıştırma #1

- Güvenli bir kullanıcı kayıt-giriş-çıkış sistemi yazınız.

> Uygulamanızda arayüz tasarımına dikkat etmeniz beklenmemektedir. Sadece PHP kodlarınız puanlanacaktır.

- Bu alıştırmada öncelikle bir veritabanına ihtiyaç duymaktasınız. Bu veri tabanında bulunması gereken tablonun yapısı aşağıda gösterilmiştir. Dikkatlice inceleyiniz.

- Tablodaki veriler rastgele doldurulmuş olup sizden istenilen; veritabanınızın oluşturduğunuz web uygulaması ile doldurulmasını sağlamanızdır. (Manuel olarak INSERT INTO işlemleri yapmayınız. Sadece tabloyu oluşturmak ve yapıyı gözlemlemek için phpMyAdmin'i kullanabilirsiniz. Kullanıcı kayıtlarının, uygulamanızın ziyaretçileri tarafından oluşturulması gerekmektedir.)

**USERS**
|     User_ID    |     User_Name    |     E_Mail        |     First_Name    |     Last_Name    |     GSM_No    |     Birth_Date    |     Password                                              |
|----------------|------------------|-------------------|-------------------|------------------|---------------|-------------------|-----------------------------------------------------------|
|     0          |     User1        |     U1@web.com    |     Name1         |     LName1       |     121       |     13.05.1996    |     $2y$10$FNL36e08SpARqP7.Z2ze/OhjjykOSmvc.jd4ftbH9Sg    |
|     1          |     User2        |     U2@web.com    |     Name2         |     LName2       |     122       |     12.07.1995    |     $2y$10$pYMgHW9jJ.ERyY/N3dn5J5CY.XN4pqkiOjhmfG2AK      |
|     2          |     User3        |     U3@web.com    |     Name3         |     LName3       |     123       |     15.10.1999    |     D4u8bDzRxwJxB4YlYeEcDpHLsSw3t8LGZRY0AilR4/KCBwxES     |
|     3          |     User4        |     U4@web.com    |     Name4         |     LName4       |     124       |     18.01.2002    |     2y$18lh7cueby3wTQW9OmQWyYd8ıJqf1zQ.HVbVAcH.o/lQ       |

---

### Kayıt

- Veritabanı tasarımının gerçekleştirilmesinin ardından kullanıcıların kayıt olmak ve giriş yapmak arasında seçim yapacağı bir sayfanın hazırlanması gerekmektedir. Bu iki seçenek kullanıcıya butonlar veya linkler yardımı ile sunulmalıdır. Kayıt ol seçeneği seçildiğinde;

    - Kullanıcı adı
    - E-posta
    - Ad Soyad
    - GSM
    - Doğum tarihi
    - Şifre

    bilgileri kullanıcıdan istenilmelidir. Kullanıcının ID bilgisi ise otomatik olarak oluşturulacak şekilde ayarlanmalıdır. Kullanıcıdan alınan şifre `password_hash()` fonksiyonu ile hash'lenerek veri tabanında saklanmalıdır.


### Giriş

- Giriş yap seçeneği seçildiğinde;

    - Kullanıcı adı
    - Şifre

    bilgileri kullanıcıdan istenmelidir. Kullanıcı adı ve şifre bilgileri veri tabanındaki kullanıcı adı ve hash'li şifre ile eşleşiyorsa sisteme giriş yapılmalıdır.

- Giriş yapmış bir kullanıcının şifre hariç tüm bilgileri ana ekranda kendisine gösterilmelidir.

- Buna ilaveten bir adet çıkış yap butonu/linki de bulunmalıdır.

> Not: `password_hash()` fonksiyonunun algoritma parametresi `PASSWORD_BCRYPT` algoritması olmalıdır! (Varsayılan parametre de bu değere tekabül etse de bu sadece şimdilik geçerli bir durumdur. Gelecekteki PHP versiyonlarında bu varsayılan parametre değişecektir. Algoritmanın değişmesi kullanıcıların giriş yapamamasına sebep olur!)

> Oturum bilgileri `session` yapısı ile tutulmalıdır. `Cookie` kullanımı puan getirmeyecektir!


### Çıkış

- Çıkış yap seçeneğinin seçilmesi ile farklı bir session id ataması yapılmalıdır.

- PHP ve SQL dosyalarını ZIP formatında e-kampüs ödev modülüne yükleyiniz.

---

### Yardımcı Kaynaklar

#### Password-Hash

- https://www.php.net/manual/en/function.password-hash.php
- https://www.php.net/manual/en/function.password-verify.php
- https://www.php.net/manual/en/password.constants.php#constant.password-bcrypt

#### Opsiyonel ek hash fonksiyonları

- https://www.php.net/manual/en/function.hash.php
- https://www.php.net/manual/en/function.hash-algos.php
- https://www.php.net/manual/en/function.hash-hmac.php
- https://www.php.net/manual/en/function.hash-hmac-algos.php


#### Session

Session örneği
- https://www.php.net/manual/en/session.examples.basic.php

Session oluşturma;
- https://www.php.net/manual/en/function.session-start.php

Session kaydı temizleme;
- https://www.php.net/manual/en/function.session-unset.php
- https://www.php.net/manual/en/function.session-destroy.php

Yeniden session atama;
- https://www.php.net/manual/en/function.session-regenerate-id.php

