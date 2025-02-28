## Cara Menjalankan Project

Clone repositori:

```bash
  git https://github.com/MRoynaldi-30/blog-test.git
  cd blog-test
```

Install dependencies:

```bash
  composer install
  npm install
```

Konfigurasi Database Buat file .env dari .env.example:

```bash
  cp .env.example .env
```
Kemudian, edit file .env dan atur konfigurasi database Anda:

```bash
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=blog-test
  DB_USERNAME=root
  DB_PASSWORD=your_password
```

Migrasi Database Pastikan database kosong tanpa tabel, lebih baik jika belum ada databasenya. Kemudian, jalankan:

```bash
  php artisan migrate
```

Menjalankan Server Untuk menjalankan project ini:
```bash
  npm run dev
  php artisan serve
```


## Sekian dan Terima kasih