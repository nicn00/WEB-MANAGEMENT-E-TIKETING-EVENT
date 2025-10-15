# Web Manajemen dan E-Ticketing Event (EventHub)

## Deskripsi Proyek
EventHub adalah aplikasi web berbasis **Laravel** yang digunakan untuk **manajemen event dan sistem e-ticketing**.  
Aplikasi ini memungkinkan pengguna untuk:
- Melihat daftar event yang tersedia  
- Membeli tiket secara online  
- Menerima **e-ticket dengan QR Code**  
- Memvalidasi tiket di pintu masuk oleh panitia  
- Admin dapat membuat, mengedit, dan menghapus event melalui dashboard  

Proyek ini dibuat sebagai tugas besar mata kuliah **IMPL / Rekayasa Perangkat Lunak**, dengan mengimplementasikan kebutuhan dari dokumen **SKPL dan DPPL** menjadi kode nyata sesuai dengan **PSPEC**.

---

## Anggota Kelompok

| No | Nama Lengkap | NIM | Peran |
|----|---------------|------|-------|
| 1 | **Muamar Haikal F.** | 1203230118 | Backend Developer (TicketController, QR Integration) |
| 2 | **Ahmad Wahyudi** | 1203230116 | Backend Developer (EventController, Models, Migrations) |
| 3 | **Arya Maulana** | 1203230120 | Auth & User Management, Testing |
| 4 | **Nicholas Aditya R.** | 1203230080 | Frontend API Integration & Repository Maintainer |
| 5 | **Mukhlis Zahrawani S.** | 1203230065 | Admin Dashboard & Documentation |

---
WEB-MANAGEMENT-E-TIKETING-EVENT/
│
├── app/
│   ├── Console/
│   │   └── Kernel.php
│   ├── Exceptions/
│   │   └── Handler.php
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Middleware/
│   │   └── Kernel.php
│   ├── Models/
│   └── Providers/
│       ├── AppServiceProvider.php
│       ├── AuthServiceProvider.php
│       ├── EventServiceProvider.php
│       └── RouteServiceProvider.php
│
├── bootstrap/
│   ├── app.php
│   └── cache/
│
├── config/
│   ├── app.php
│   ├── auth.php
│   ├── broadcasting.php
│   ├── cache.php
│   ├── database.php
│   ├── filesystems.php
│   ├── mail.php
│   ├── queue.php
│   ├── session.php
│   └── view.php
│
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
│
├── public/
│   ├── index.php
│   └── .htaccess
│
├── resources/
│   ├── views/
│   ├── css/
│   └── js/
│
├── routes/
│   ├── web.php
│   └── api.php
│
├── storage/
│   ├── app/
│   ├── framework/
│   │   ├── cache/
│   │   ├── sessions/
│   │   ├── testing/
│   │   └── views/
│   └── logs/
│
├── tests/
│   ├── Feature/
│   │   └── ExampleTest.php
│   └── Unit/
│       └── ExampleTest.php
│
├── artisan
├── composer.json
├── package.json
├── phpunit.xml
├── .env.example
└── README.md
