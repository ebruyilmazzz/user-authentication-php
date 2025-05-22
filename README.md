# user-authentication-php
A simple PHP user login system with PDO and session authentication.
## Proje Açıklaması
Bu proje, PHP ve PDO kullanarak geliştirilmiş basit bir kullanıcı giriş sistemidir. Kullanıcı email ve şifresini girerek sisteme giriş yapabilir. Giriş sonrası session kullanılarak kontrol paneline yönlendirilir.

## Özellikler
- PDO ile güvenli veritabanı işlemleri
- Şifre doğrulama (`password_verify`)
- Bootstrap ile basit kullanıcı arayüzü
- Session ile oturum yönetimi

## Kurulum
1. Veritabanını `deneme` olarak oluşturun.
2. `users` tablosunu oluşturun.
3. `db.php` dosyasına kendi veritabanı bilgilerinizi girin.
4. `register.php` veya doğrudan veri ekleyerek kullanıcı oluşturun.
5. `login.php` dosyası ile giriş yapın.
