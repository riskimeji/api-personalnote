## Set Up Server Personal Note

1. git clone 
2. cd `api-personalnote`
3. buat file .env
4. copy isi file .env.example masukin .env
6. buat database dengan nama `db_personal_note`
7. import db `db_personal_note.sql` ke dalam database `db_personal_note`
8. jalankan syntax `composer install` di cmd

### Melalui Git

- Clone repository dari GitHub:

`git clone https://github.com/riskimeji/api-personalnote.git`

- Masuk ke folder proyek:
`cd api-personalnote`
- Buat file `.env`
- Salin isi file `.env.example` ke dalam file `.env`:
- Konfigurasi database di file `.env` sesuai dengan pengaturan database Anda.
- example :
  
   ``DB_DATABASE=db_personal_note``
  
    ``DB_USERNAME=root``
  
    ``DB_PASSWORD=``
  
- Buat database dengan nama `db_personal_note`.
- Impor file `db_personal_note.sql` ke dalam DATABASE `db_personal_note`.
- Install dependensi PHP menggunakan Composer:
  `composer install`
  
- Jalankan perintah berikut untuk menghasilkan kunci aplikasi:
  `php artisan key:generate`

- cek ip address komputer dengan cara mengetikan `ipconfig`, dan ambil IPv4 Address
- Jalankan server lokal dengan cara
  `php artisan serve --host IPv4 Address`

  ### example
  `php artisan serve --host 192.168.69.253`

