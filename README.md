
# Port Scanner

Bu proje, bir IP adresindeki portların açık olup olmadığını kontrol etmek için GuzzleHttp ve fsockopen yöntemlerini kullanan bir PHP uygulamasıdır.

## Kurulum

1. **Composer ile bağımlılıkları yükleyin:**

   ```bash
   composer require guzzlehttp/guzzle
   ```

2. **Gerekli dosyaları kontrol edin:**

   - `port_list.json`: Port bilgilerini içeren JSON dosyası. Örnek format:
     ```json
     {
       "ports": {
         "80": "HTTP",
         "443": "HTTPS",
         "22": "SSH"
       }
     }
     ```

3. **Dosya yapısı:**

   ```
   network_scan/
   ├── composer.json
   ├── composer.lock
   ├── function_code.php
   ├── port_list.json
   ├── start.php
   └── vendor/
   ```

## Kullanım

1. Terminalde şu komutu çalıştırın:

   ```bash
   php start.php
   ```

2. Program sizden bir IP adresi girmenizi isteyecektir. Örneğin:
   ```
   Lütfen IP adresi girin: 192.168.1.1
   ```

3. Daha sonra portları kontrol eder ve açık olan portları bir dosyaya yazar.

4. Program ayrıca dosya ismi girmenizi isteyecek. Örneğin:
   ```
   dosya ismini giriniz: output.txt
   ```

5. Sonuçlar `output.txt` dosyasına yazılacaktır.



## Gereksinimler

- PHP >= 7.4
- Composer
- GuzzleHttp kütüphanesi

## Lisans

Bu proje [MIT Lisansı](LICENSE) ile lisanslanmıştır.
