# LAB-05

## Javascript Hakkında

- Javascript kodları:
  - `<script>...</script>` etiketleri arasına,
  - bir `*.js` dosyası içerisine,
  - veya HTML ögelerin niteliklerine yazılabilir.

---


## Javascript'e Giriş




<details>
  <summary>1. Inline (Internal):</summary>

- `<script>` etiketleri genellikle `<head>` etiketi içerisinde yazılır. `<body>` etiketi içerisine yazıldığında da kodlar çalışacaktır.
```html
<script>
alert("Merhaba BTU!");
</script>
```

- HTML sayfa tamamen yüklendikten sonra kodlarınız direkt olarak sırayla çalışmaya başlayacaktır.

```html
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Internal JavaScript Örneği</title>
    
    <script>
        // Internal JavaScript örneği
        document.getElementById("demo").innerHTML = "Bu bir internal JavaScript örneğidir.";
    </script>
</head>
<body>

<p id="demo"></p>

</body>
</html>
```

> Birden fazla `<script>` etiketi olması durumunda bunların da içerisindeki kodlar sırasıyla çalışacaktır. Farklı `<script>` etiketleri, birbirlerinden bağımsız olarak çalışmazlar!


</details>





<details>
  <summary>2. Inline Event Handler:</summary>

- Bazı HTML ögelerde `onclick`, `onchange`, `onfocus` gibi nitelikler kullanılarak `event` (olay) kontrolü yapılabilir.
- Bu gibi niteliklere string biçiminde Javascript kodları verdiğimizde, niteliğin belirttiği olay gerçekleştiğinde belirttiğimiz kodlar çalışır.
- [`onmouseover` örneği](https://www.w3schools.com/jsref/tryit.asp?filename=tryjsref_onmouseover)
- [Diğer HTML Document Object Model Olayları](https://www.w3schools.com/jsref/dom_obj_event.asp)
- Olaylar sadece HTML'de değil, Javascript kodları içerisinde de kontrol/idare edilebilir.
- HTML'de:
```html
<button onclick="myFunction()">Click me</button>
```

- şeklinde belirtilirken, Javascript'te:
```javascript
button.addEventListener("click", myFunction);
```

- şeklinde başında `on` ifadesi olmadan belirtilir.


```html
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inline JavaScript Örneği</title>
</head>
<body>

<button onclick="alert('Merhaba dünya!')">Tıkla</button>

</body>
</html>
```


- Aşağıda bazı olay örnekleri verilmiştir. Tüm olayları içeren liste için yukarıda verilen bağlantıyı kullanınız.

</details>



<details>
  <summary><i>Olay Dinleyicisi Örnekleri</i></summary>

#### `onload` Olay Dinleyicisi:

- `onload` olay dinleyicisi, bir HTML sayfasının tamamen yüklendiğinde çalıştırılacak JavaScript kodunu belirlemek için kullanılır.

Örnek:
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>onload Örneği</title>
</head>
<body onload="sayHello()">

<script>
function sayHello() {
    alert("Sayfa tamamen yüklendi!");
}
</script>

</body>
</html>
```


#### `onclick` Olay Dinleyicisi:

- `onclick` olay dinleyicisi, bir HTML ögesine tıklandığında çalıştırılacak JavaScript kodunu belirlemek için kullanılır.

Örnek:
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>onclick Örneği</title>
</head>
<body>

<button onclick="showMessage()">Tıkla</button>

<script>
function showMessage() {
    alert("Butona tıklandı!");
}
</script>

</body>
</html>
```



#### `onchange` Olay Dinleyicisi:

- `onchange` olay dinleyicisi, bir form öğesinin değeri değiştiğinde çalıştırılacak JavaScript kodunu belirlemek için kullanılır.

Örnek:
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>onchange Örneği</title>
</head>
<body>

<select id="selectElement" onchange="showSelectedValue()">
    <option value="1">Seçenek 1</option>
    <option value="2">Seçenek 2</option>
    <option value="3">Seçenek 3</option>
</select>

<script>
function showSelectedValue() {
    var selectElement = document.getElementById("selectElement");
    var selectedValue = selectElement.value;
    alert("Seçilen değer: " + selectedValue);
}
</script>

</body>
</html>
```


#### `DOMContentLoaded` Olay Dinleyicisi:

```html
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Olay Dinleyicileri Örneği</title>
</head>
<body>

<script>
// Sayfa yüklendiğinde
document.addEventListener("DOMContentLoaded", function() {
    console.log("Sayfa yüklendi!");
});

// Tüm kaynaklar (resimler, js ve css dosyaları vs) yüklendiğinde
window.onload = function() {
    console.log("Sayfa ve tüm kaynaklar yüklendi!");
};
</script>

</body>
</html>
```


</details>







<details>
  <summary>3. External:</summary>


- Bir `kod.js` dosyasını bir HTML sayfada çalıştırmak için
```html
<script src="dosya_yolu/kod.js"></script>
```
- şeklinde yolu belirtilir. JS dosyasının içeriği, script etiketlerinin arasına yazılan kod ile birebir aynı olabilir.
```javascript
alert("Merhaba BTU!");
```

> `src` niteliği belirtilmiş bir `<script>` etiketi içerisine ayrıyeten Javascript kodu yazılmamalıdır.


**HTML Dosyası (`index.html`):**
```html
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>External JavaScript Örneği</title>
    
    <!-- External JavaScript dosyasını dahil et -->
    <script src="script.js"></script>
</head>
<body>

<p id="demo"></p>

</body>
</html>
```

**JavaScript Dosyası (`script.js`):**
```javascript
// External JavaScript örneği
document.getElementById("demo").innerHTML = "Bu bir external JavaScript örneğidir.";
```


</details>




---


<details>
  <summary>Değişken Oluşturma</summary>


   ### **Var**
   ```javascript
   var age = 25;
   var name = "John";
   var isStudent = true;
   ```

   ### **Let**
   ```javascript
   let age = 25;
   let name = "John";
   let isStudent = true;
   ```

   ### **Const**
   ```javascript
   const PI = 3.14;
   const companyName = "Example Inc.";
   ```


- JavaScript'te `var`, `let`, ve `const` anahtar kelimeleriyle değişken oluşturulabilir. İşlevsellik açısından bu anahtar kelimeler arasında bazı farklar bulunmaktadır:

  1. **Kapsam (Scope)**:
     - `var`: `var` ile tanımlanan bir değişken fonksiyon kapsamında tanımlanırsa, değişkenin kapsamı o fonksiyonun içiyle sınırlı olur. Ancak blok kapsamında (`if`, `for`, `while` blokları gibi) tanımlandığında fonksiyon dışından da erişilebilir.
     - `let` ve `const`: `let` ve `const` ile tanımlanan değişkenler blok kapsamına sahiptir. Yani, bu değişkenler sadece tanımlandıkları blok içerisinde erişilebilirler.

  2. **Yeniden Tanımlama ve Yeniden Atama**:
     - `var`: Aynı isimde bir değişken `var` ile tekrar tanımlanabilir ve yeniden atanabilir.
     - `let`: Aynı isimde bir değişken `let` ile tanımlanırsa hata alırsınız. Ancak, `let` ile tanımlanan bir değişkenin değeri değiştirilebilir.
     - `const`: Aynı isimde bir `const` değişkeni tekrar tanımlanamaz veya yeniden atanamaz. Bir kere değer atandıktan sonra sabit kalır.

- Örnek:

```javascript
var x = 10;
if (true) {
    var x = 20;
}
console.log(x); // 20


let y = 10;
if (true) {
    let y = 20;
}
console.log(y); // 10



const z = 10;
// z = 20; // Hata! Bir const değişkeni yeniden atanamaz.
```


> Modern JavaScript uygulamalarında `var` yerine `let` ve `const` kullanımı önerilir çünkü bu değişkenlerin kapsamları daha belirgindir ve hata yapma olasılığını azaltır. `const` ise değişmeyen değerlerin tanımlanması için kullanılır ve bu şekilde hatalı değişikliklerin önüne geçilir.

</details>

---


<details>
  <summary>Dizi Oluşturma</summary>


1. **Diziler**
   ```javascript
   var numbers = [1, 2, 3, 4, 5];
   var names = ["John", "Jane", "Doe"];
   ```

2. **Yeni Dizi Oluşturucu (Array Constructor):**
   ```javascript
   var numbers = new Array(1, 2, 3, 4, 5);
   var names = new Array("John", "Jane", "Doe");
   ```

3. **Boş Bir Dizi Oluşturma:**
   ```javascript
   var emptyArray = [];
   ```

4. **Dinamik Dizi Oluşturma:**
   ```javascript
   var mixedArray = [1, "John", true, { key: "value" }];
   ```

</details>

---


<details>
  <summary>Nesneler</summary>

- JS'de nesneler `{...}` parantezleri ile oluşturulabilir.
- Bir nesneye daha sonradan varlık (property) eklenebilir.
- Nesne varlıklarında, standart tipteki verilere ek olarak fonksiyonlar da tutulabilir.

```javascript
// Bir araba nesnesi örneği
let car = {
    brand: "Toyota",
    model: "Corolla",
    year: 2020,
    color: "white",
    isAutomatic: true,
    drive: function() {
        console.log("The car is driving...");
    }
};

// Nesne özelliklerine erişme
console.log(car.brand); // Toyota
console.log(car.model); // Corolla
console.log(car.year); // 2020
console.log(car.color); // white
console.log(car.isAutomatic); // true

// Nesne yöntemini çağırma
car.drive(); // The car is driving...
```


- JS'de nesneler, JSON (JavaScript Object Notation) formatında veri transferi işlemlerinde büyük öneme sahiptir.
- Bu format PHP'den Python'a pek çok dilde desteklenmektedir.
- İleride göreceğiniz XML formatından daha kolay ve daha az yer kaplamaktadır.

```javascript
let person = {
    name: "John",
    age: 30,
    city: "New York"
};


// Nesneyi JSON formatına encode etme
let jsonEncoded = JSON.stringify(person);
console.log(jsonEncoded);
// Çıktı: {"name":"John","age":30,"city":"New York"}


// JSON formatındaki veriyi JavaScript nesnesine decode etme
let decodedPerson = JSON.parse(jsonEncoded);
console.log(decodedPerson);
// Çıktı: { name: 'John', age: 30, city: 'New York' }
```

> Not: JSON formatında fonksiyon tutmak mümkün değildir.

> Not: JavaScript'te sınıf oluşturmak ve bu sınıftan nesneler üretmek mümkündür.
> Bu konu hakkında ayrıntılı bilgi için [Mozilla JS Classes](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Classes) sayfasına bakabilirsiniz.

</details>

---

<details>
  <summary>Fonksiyonlar</summary>


### Temel Fonksiyon Oluşturma:

```javascript
function greet() {
    console.log("Merhaba!");
}

// Fonksiyonu çağırma
greet();
```

### Parametre Alan Fonksiyon:

```javascript
function greet(name)
{
    console.log("Merhaba, " + name + "!");
}

// Fonksiyonu çağırma
greet("Ahmet");
```


### Birden Fazla Parametre Alan Fonksiyon:

```javascript
function add(a, b) {
    return a + b;
}

// Fonksiyonu çağırma
var result = add(5, 3);
console.log("Toplam: " + result);
```

### Anonim Fonksiyonlar (Anonymous Functions):

```javascript
var greet = function() {
    console.log("Merhaba!");
};

// Fonksiyonu çağırma
greet();
```

#### Ok İşareti Fonksiyonları ([Anonymous] Arrow Functions):

```javascript
// Parametresiz arrow function
const sayHello = () => {
    console.log("Merhaba!");
};

// Fonksiyonu çağırma
sayHello();
```


```javascript
// Bir parametreli arrow function
const greet = (name) => {
    console.log("Merhaba, " + name + "!");
};

// Fonksiyonu çağırma
greet("Ahmet");
```

</details>


---




<details>
    <summary>Döngüler</summary>

### **for**

```javascript
// 1'den 5'e kadar olan sayıları ekrana yazdıran for döngüsü
for (let i = 1; i <= 5; i++) {
    console.log(i);
}
```

### **while**

```javascript
// 1'den 5'e kadar olan sayıları ekrana yazdıran while döngüsü
let j = 1;
while (j <= 5) {
    console.log(j);
    j++;
}
```

### **do...while**

```javascript
// 1'den 5'e kadar olan sayıları ekrana yazdıran do...while döngüsü
let k = 1;
do {
    console.log(k);
    k++;
} while (k <= 5);
```

### **forEach**

```javascript
// Bir dizi üzerinde forEach döngüsü kullanımı
let numbers = [1, 2, 3, 4, 5];
numbers.forEach(function(number) {
    console.log(number);
});
```

### **for...in:**

```javascript
// Bir nesne üzerinde for...in döngüsü kullanımı
let person = {
    name: "John",
    age: 30,
    city: "New York"
};
for (let key in person) {
    console.log(key + ": " + person[key]);
}
```

</details>




---





<details>
  <summary>JavaScript ile DOM Manipülasyonu</summary>

- ### ID ile Erişim:

HTML:
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DOM Örneği</title>
</head>
<body>

<h1 id="title">Merhaba Dünya!</h1>

<script src="script.js"></script>
</body>
</html>
```

JavaScript (`script.js`):
```javascript
// ID'si "title" olan öğeye erişim
const titleElement = document.getElementById("title");

// Öğenin içeriğini değiştirme
titleElement.innerHTML = "Hello World!";
```



- ### Sınıf ile Erişim:

HTML:
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DOM Örneği</title>
</head>
<body>

<p class="message">Bu bir mesajdır.</p>

<script src="script.js"></script>
</body>
</html>
```

JavaScript (`script.js`):
```javascript
// Sınıfı "message" olan öğelere erişim
const messageElements = document.getElementsByClassName("message");

// İlk öğenin içeriğini değiştirme
messageElements[0].innerHTML = "This is a message.";
```





- ### Etiket ile Erişim:

HTML:
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DOM Örneği</title>
</head>
<body>

<ul id="list">
    <li>Öğe 1</li>
    <li>Öğe 2</li>
    <li>Öğe 3</li>
</ul>

<script src="script.js"></script>
</body>
</html>
```

JavaScript (`script.js`):
```javascript
// Etiket adıyla öğelere erişim
const listElements = document.getElementsByTagName("li");

// Tüm öğeleri dolaşarak içeriklerini değiştirme
for (let i = 0; i < listElements.length; i++) {
    listElements[i].innerHTML = "Item " + (i + 1);
}
```


- ### Selector ile Erişim:

    - `querySelector()` fonksiyonu, CSS seçicilerini kullanarak bir HTML sayfadaki belirli bir ögeye erişmek için kullanılır.


HTML:
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>querySelector Örneği</title>
</head>
<body>

<div id="container">
    <p class="message">Bu bir mesajdır.</p>
    <button id="btn">Tıkla</button>
</div>

<script src="script.js"></script>
</body>
</html>
```

JavaScript (`script.js`):
```javascript
const messageElement = document.querySelector("#container .message");
messageElement.innerHTML = "This is a message.";

const buttonElement = document.querySelector("#container #btn");
buttonElement.addEventListener("click", function() {
    alert("Butona tıklandı!");
});
```

- `document.querySelector("#container .message")`: Bu ifade, `id` niteliği "container" olan bir öğenin içindeki `class` niteliği "message" olan bir öğeye erişir.
- `document.querySelector("#container #btn")`: Bu ifade, yine `id` niteliği "container" olan bir öğenin içindeki `id` niteliği "btn" olan bir öğeye erişir.



</details>

---


<details>
  <summary>HTML DOM Öge İçerikleri</summary>

#### `innerHTML` Özelliği:
- Bir HTML ögenin içerisindeki HMTL kaynağı döndürür veya bunu düzenlemeye yarar.

#### `innerText` Özelliği:
- Bir HTML ögenin içerisindeki yazıyı döndürür veya bunu düzenlemeye yarar.
- Çağırıldığında döndürdüğü sonuç, HTML etiketleri içermez.

#### `textContent` Özelliği:
- `innerText` gibidir. `innerText` sadece görünen metni alırken, `textContent` görünmeyen metni de alabilir.

</details>



---


<details>
  <summary>JS'de Dinamik HTML Ögeler</summary>

- JS'de, HTML ögeleri önce hazırlayıp sonra sayfaya yerleştirmek, doğrudan yerleştirmeye başlamaktan daha iyi bir çözümdür.

`const new_p = document.createElement("p")`
- Bir `p` etiketi oluşturur fakat bu etiket henüz DOM içerisinde değildir.
- Etiket ögesi sadece `new_p` isimli değişkene atanır.

`new_p.innerText = "Bursa Teknik Üniversitesi.";`
- Dinamik ögenin içeriği değiştirilebilir.

`document.body.appendChild(new_p);`
- Öge, HTML dökümanın `body` nesnesinin (body etiketini gösteren pointer'dır) içerisine child olarak eklenir.


#### Detaylı Kaynaklar:
- [createElement()](https://www.w3schools.com/jsref/met_document_createelement.asp)
- [appendChild()](https://www.w3schools.com/jsref/met_node_appendchild.asp)
- [remove()](https://www.w3schools.com/jsref/met_element_remove.asp)

</details>


---


# Alıştırma #1
- Alışveriş listesi tutmaya ve hesaplamaya yardımcı olan basit Single Page App hazırlayınız.
- Tüm alıştırmayı tek bir HTML dosyası içerisinde hazırlayınız.
- Aşağıdakine benzer şekilde 3 bölmeli anlaşılır bir arayüz tasarlayınız.

![shopping.png](shopping.png)

- İlk bölmede ürün adını isteyiniz. Kullanıcı bir ürün ismi girip `Ekle` butonuna tıkladığında `Ürünler` bölmesine basit bir arayüz olarak bu ürün eklenmelidir.
- Her ürünün kendine özgü bir birim fiyatı ve bir adet/birim miktarı olmalıdır. Ayrıca `X` butonu, kendi satırındaki ürünü listeden kaldırmalıdır.
- Her sayısal veri düzenleme ve ürün silme işlemlerinden sonra `Toplam` bölmesinde, hesaplanan toplam tutar `... TL` şeklinde yazılmalıdır.
- Her ürün ekleme sonrası, önceden eklenen ürünler için girilen miktar ve fiyat değerleri **kaybolmamalıdır**.

> Önemli not: eğer `innerHTML` ifadesine ekleme yaparsanız, tarayıcılar var olan içeriğe ekleme yapmayacaktır.
> Bunun yerine var olan içeriği varsayılan haliyle alır, sizin içeriğiniz ile birleştirip tekrar yerine koyar.

> Uygulamanızın arayüzü yukarıdaki görseldekinden farklı olabilir. Fakat tamamen tasarımsız bir uygulama yazmayınız. Basit birkaç CSS kodu ile arayüzünüzü anlaşılır tutmaya çalışınız.

## Rehber adımlar:
  1. HTML sayfanızın iskeletini oluşturun.
  2. 3 bölme için başlıkları ve biçimlendirmeleri hazırlayın.
  3. Bir `<script>` etiketi oluşturun.
  4. Yeni ürün ekleme işlemi için boş bir fonksiyon tanımlayın. Test için içerisinde `console.` fonksiyonları kullanabilirsiniz.
  5. Bu fonksiyonu HTML sayfanızı çalıştırarak tetiklemeye çalışın.
  6. Fonksiyonunuz tetikleniyorsa yeni bir ürün satırı eklemek için gereken kodlardan başlayarak uygulamanızı geliştirmeye devam edebilirsiniz.

> Tek HTML dosyadan oluşan uygulamanızı Ekampüs'ten gün içerisinde yüklemeyi unutmayınız.


