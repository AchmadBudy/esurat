Buat install nya :

1. Download dulu
2. waktu udah download lakukan "composer install" pada commandline yang di arahkan di folder scriptnya
3. lalu tinggal edit .env.example menjadi .env
4. lalu didalam .env ubah data dibawah ini dan jangan lupa buat dulu database nya
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=Nama database
   DB_USERNAME=user database
   DB_PASSWORD=password database

5. ganti FILESYSTEM_DRIVER=local ke FILESYSTEM_DRIVER=public
6. setelah itu tinggal di "php artisan key:generate" dan "php artisan migrate" serta lakukan "php artisan storage:link" lalu "php artisan serve"
