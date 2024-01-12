## VOID TEAM <> Smartplant Care
Platform ini dirancang untuk membantu pengguna dalam merawat tanaman mereka dengan memanfaatkan teknologi IoT (Internet of Things). 
Sistem ini menggunakan Laravel sebagai backend API, Kotlin sebagai frontend dan Arduino sebagai perangkat keras untuk memonitor kondisi tanaman secara real-time. 
Dan juga mendeteksi diagnosa penyakit tanaman serta panduan bagi petani rumahan.

<p align="center"><img src="public/image/Screenshot 2024-01-12 144032.png" width="1000" alt="Screenshoot Postman"></p>

## Specifications

- Laravel v10.39.0
- PHP v8.1.27
- Apache v2.4.54 VS16
- Composer v2.6.6
- MySQL v8.0.30

## Setup Project

- composer install
- cp .env.example .env
- php artisan key:generate
- php artisan migrate
- php artisan db:seed --class=UnitTestingSeeder
- php artisan serve
  
- Jika ingin mendapatkan verification email, harap isi credentials email di ENV.

## Custom Command

- php artisan local:test --with-code-fix

- php artisan make:controller Example
- php artisan make:service Example
- php artisan make:repository-contract Example
- php artisan make:request Example
- php artisan make:resource Example

- php artisan make:crud Example
