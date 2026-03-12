# Finish It - Project App Management

Finish It merupakan platform manajemen tugas (Task Management) yang dikembangkan untuk memfasilitasi kolaborasi dalam pengelolaan proyek secara terstruktur. Aplikasi ini memungkinkan pengguna untuk melakukan plotting tugas kepada developer secara spesifik, menetapkan tenggat waktu (due date), serta mengatur tingkat urgensi pekerjaan.

## Fitur Utama

- Autentikasi (login, register, logout)
- Authorization berbasis role (admin/member) dan kepemilikan
- Manajemen tugas pada proyek (CRUD)
- Dashboard Aplikasi
- Filtering dan Searching pada Project
- Filtering dan Searching pada Tugas

## Cara Instalasi

### Prasyarat

- PHP >= 8.2
- Composer
- MySQL
- Node.js & NPM

### Langkah Instalasi

1. Clone repository

```bash
   git clone https://github.com/JatiSriPamungkas/finish-it.git
   cd project-management-app
```

2. Install dependencies

```bash
   composer install
   npm install
```

3. Konfigurasi environment

```bash
   cp .env.example .env
   php artisan key:generate
```

4. Atur konfigurasi database di file `.env`

```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=finish_it_db
   DB_USERNAME=root
   DB_PASSWORD=
```

5. Jalankan migration dan seeder

```bash
   php artisan migrate --seed
```

6. Build assets

```bash
   npm run build
```

## Cara Menjalankan

```bash
php artisan serve
```

Buka browser dan akses `http://localhost:8000`

### Akun Default (dari Seeder)

| Role          | Email               | Password     |
| ------------- | ------------------- | ------------ |
| administrator | admin@gmail.com     | admin123     |
| manager       | manager@gmail.com   | manager123   |
| developer     | developer@gmail.com | developer123 |

## Skema Database

![Database Schema](https://github.com/user-attachments/assets/44e81ce1-032c-4a05-b729-ffa7f710ed13)
