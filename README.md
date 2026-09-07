# CSM (Contractual Service Margin) System

Sistem Manajemen **Contractual Service Margin (CSM)**, **Subledger Asuransi**, dan **Pelaporan Keuangan & Aktuaria IFRS 17 / PSAK 117** berbasis web yang dibangun menggunakan **Laravel 12**, **Tailwind CSS v4**, **Alpine.js**, dan **Spatie Laravel-Permission**.

---

## 📌 Ringkasan Proyek

**CSM System (`csm_new`)** dirancang untuk mengelola data master aktuaria, tata kelola data transaksi asuransi/reasuransi (data staging & migration), perhitungan liabilitas kontrak asuransi (LRC PAA & GMM, LIC, IBNR), subledger akuntansi, laporan keuangan, catatan pengungkapan (*disclosure*), serta pelaporan kepatuhan regulator (Otoritas Jasa Keuangan / OJK).

### 🛠️ Tech Stack

- **Backend Framework:** [Laravel 12.x](https://laravel.com/) (PHP ^8.2)
- **Role & Permission:** [Spatie Laravel-Permission 8.x](https://spatie.be/docs/laravel-permission/)
- **Frontend & Styling:** [Tailwind CSS v4.x](https://tailwindcss.com/)
- **Interactivity:** [Alpine.js 3.x](https://alpinejs.dev/)
- **Build Tool:** [Vite 7.x](https://vitejs.dev/) & Laravel Vite Plugin
- **Visualisasi & Komponen UI:** ApexCharts, FullCalendar, Flatpickr, jsvectormap, PrismJS, Swiper
- **Database:** SQLite (Default / Development), MySQL, PostgreSQL

---

## ✨ Fitur & Modul Utama

### 1. 🔐 Autentikasi & Role-Based Access Control (RBAC)
- Autentikasi berbasis session (`/signin`, `/logout`).
- Manajemen hak akses pengguna menggunakan **Spatie Laravel-Permission**.
- Sidebar dinamis yang menyesuaikan peran pengguna (*Role-based dynamic menu rendering*).
- Role default: `CSM Administrator`, `Customer Service Manager`, `Customer Service Agent`.

---

### 2. 🗂️ CSM Administrator: Master Data

#### A. General Master
- **Currency:** Pengelolaan mata uang transaksi dan kurs pelaporan.
- **Branch:** Pengelolaan data kantor cabang.
- **Bank:** Master data rekening dan institusi perbankan.
- **Class of Business (COB):** Klasifikasi lini usaha asuransi.
- **Business:** Master entitas bisnis / produk asuransi.
- **Memorial Code List:** Daftar kode memorial akuntansi.
- **Segment:** Segmentasi portofolio kontrak asuransi.
- **Chart of Account (COA):** Bagan akun standar akuntansi IFRS 17 / PSAK 117.
- **Journal Template:** Templat jurnal otomatis untuk posting transaksi.

#### B. Liability & Actuarial Assumptions
- **Portfolio and Assumption:** Konfigurasi portofolio kontrak dan asumsi aktuaria.
- **Discount Rate & Liquidity Premium:** Tingkat diskonto dan kurva *yield* premi likuiditas.
- **Lapse Ratio:** Asumsi rasio pembatalan/lapse polis.
- **OPEX Allocation:** Alokasi beban operasional (*operating expenses*).
- **Accident Rate:** Asumsi tingkat kejadian klaim/kecelakaan.
- **Inflation Rate:** Proyeksi tingkat inflasi.
- **NPR Rate:** *Non-Performance Risk* rate.
- **Risk Value Matrix:** Matriks penilaian risiko aktuaria.

---

### 3. ⚙️ CSM Administrator: Data Management & Tools
- **Tools:**
  - **Data Quality Control (DQC):** Validasi integritas dan kelengkapan data polis & klaim.
  - **Journal Export:** Ekspor jurnal akuntansi ke sistem GL/ERP.
  - **COA Mapping:** Pemetaan bagan akun sumber (*source*) ke COA standar CSM.
  - **Memorial Exclusion:** Pengecualian transaksi memorial tertentu.
- **Template Data Migration:** Unduh dan unggah templat migrasi data massal.
- **Data Staging:** Area penampungan dan staging data sebelum diproses ke engine kalkulasi.

---

### 4. 📊 CSM Administrator: Pelaporan Komprehensif (Reports)

#### A. Subledger Report
- Insurance Contract Production Report (Produksi Kontrak Asuransi)
- Insurance Contract Receipt (Penerimaan Premi Kontrak Asuransi)
- Insurance Service Expense - Incurred Claims Report
- Insurance Service Expense - Claim Payment (Pembayaran Beban Klaim)
- Reinsurance Contract Production (Produksi Reasuransi)
- Reins Contract Payment Report (Pembayaran Reasuransi)
- Incurred Claim Ceded to Reinsurer (Klaim yang Disesikan ke Reasuradur)
- Incurred Claim Ceded to Reinsurer Receipt
- Outstanding Claim (Estimasi Klaim Tertunda)

#### B. Financial Report
- Chart of Account Report
- Journal Template Report
- Transaction Journal (Jurnal Transaksi)
- Trial Balance (Neraca Saldo)
- General Ledger (Buku Besar)
- Statements of Financial Position (Laporan Posisi Keuangan / Neraca)
- Statements of Profit or Loss (Laporan Laba Rugi)
- Profit or Loss per Portfolio (Laba Rugi per Portofolio)
- OPEX Report (Laporan Biaya Operasional)
- Admin Fee Report

#### C. Actuary Report
- Portfolio Report
- IBNR Report (*Incurred But Not Reported*)
- LRC PAA Report (*Liability for Remaining Coverage - Premium Allocation Approach*)
- LRC PAA Yearly Report
- LRC PAA Insurance GPW DAC Report
- LRC PAA Ceded to RI Report & Yearly Report
- LRC GMM Report (*General Measurement Model*)
- LRC GMM Yearly Report
- LRC GMM Ceded to RI Engine Report & Reins Yearly Report
- OPEX Allocation Report
- Profit Loss per Policy Report
- LRC Movement Analysis (Analisis Pergerakan LRC)

#### D. Disclosure (Pengungkapan IFRS 17 / PSAK 117)
- Disclosure EFCF Receivable (*Expected Future Cash Flow* Piutang)
- Disclosure Acquisition Cost (Biaya Akuisisi)
- Disclosure EFCF Payable (*Expected Future Cash Flow* Hutang)
- Disclosure Incurred Claims
- Disclosure COA to Payable and Receivable
- Disclosure LRC PAA & Disclosure LRC GMM
- Disclosure LIC (*Liability for Incurred Claims*)

#### E. Regulatory Report (OJK)
- OJK Report (Pelaporan Resmi Otoritas Jasa Keuangan)
- Template Mapping Regulator
- Results of Insurance Services (Hasil Layanan Asuransi)
- Total Sum Insured (TSI / Total Uang Pertanggungan)
- LRC Amortization Period (Periode Amortisasi LRC)
- Reinsurance Contract Held (Kontrak Reasuransi yang Dimiliki)
- CSM Roll-Forward Report (Laporan Pergerakan Saldo CSM)

---

## 📋 Prasyarat Sistem

Sebelum menjalankan aplikasi, pastikan komputer Anda telah terpasang:

- **PHP:** ^8.2 atau lebih baru
- **Composer:** PHP Dependency Manager (v2.x)
- **Node.js:** v18+ & **npm**
- **Database:** SQLite (bawaan), MySQL 8.x, atau PostgreSQL 14+

---

## 🚀 Panduan Instalasi & Menjalankan Aplikasi

### 1. Masuk ke Direktori Proyek
```bash
cd csm_new
```

### 2. Instal Dependensi Backend (Composer)
```bash
composer install
```

### 3. Instal Dependensi Frontend (NPM)
```bash
npm install
```

### 4. Konfigurasi File Environment
Salin berkas `.env.example` menjadi `.env`:

```bash
# Untuk Linux / macOS / Git Bash
cp .env.example .env

# Untuk Windows (Command Prompt / PowerShell)
copy .env.example .env
```

### 5. Generate Application Encryption Key
```bash
php artisan key:generate
```

### 6. Konfigurasi Database & Jalankan Migrasi + Seeder
Pastikan database sudah disesuaikan pada file `.env`. Secara default, aplikasi siap menggunakan database SQLite (`database/database.sqlite`) atau MySQL.

Jalankan perintah migrasi beserta seeder untuk membuat tabel dan akun awal:
```bash
php artisan migrate:fresh --seed
```

### 7. Buat Symbolic Link untuk File Storage
```bash
php artisan storage:link
```

### 8. Menjalankan Server Pengembangan (Development Server)

Anda dapat menjalankan seluruh stack sekaligus menggunakan skrip composer bawaan:
```bash
composer run dev
```

Atau jalankan secara terpisah pada dua terminal:

**Terminal 1 (Laravel Server):**
```bash
php artisan serve
```

**Terminal 2 (Vite Asset Bundler):**
```bash
npm run dev
```

Buka peramban (browser) dan akses: **[http://localhost:8000](http://localhost:8000)**

---

## 🔑 Kredensial Login Default

Setelah proses seeding dijalankan (`RoleAndUserSeeder`), Anda dapat masuk dengan akun administrator:

| Field | Kredensial |
| :--- | :--- |
| **URL Login** | `/signin` |
| **Email** | `admin@csm.com` |
| **Password** | `password` |
| **Role** | `CSM Administrator` |

> ℹ️ **Catatan:** Menu **Master**, **Data Management**, dan **Report** hanya akan muncul pada sidebar jika pengguna masuk dengan peran (*role*) **`CSM Administrator`**.

---

## 📁 Struktur Direktori Proyek

```
csm_new/
├── app/
│   ├── Helpers/
│   │   └── MenuHelper.php           # Helper konfigurasi navigasi & hierarki menu
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php       # Logika login & logout
│   │   │   ├── DashboardController.php  # Controller dashboard utama
│   │   │   └── SidebarController.php    # Data navigasi sidebar
│   │   └── Middleware/              # Middleware otorisasi (Spatie permission)
│   ├── Models/
│   │   └── User.php                 # Model User dengan Spatie HasRoles trait
│   └── Providers/                   # Service providers
├── config/                          # Konfigurasi aplikasi, auth, permission, dll.
├── database/
│   ├── migrations/                  # Skema migrasi database & tabel permission
│   └── seeders/
│       ├── DatabaseSeeder.php       # Main seeder
│       └── RoleAndUserSeeder.php    # Inisialisasi Role & Akun Admin default
├── public/                          # Public root & aset terkompilasi
├── resources/
│   ├── css/                         # File konfigurasi Tailwind CSS v4
│   ├── js/                          # File Alpine.js & JavaScript modules
│   └── views/
│       ├── components/              # Komponen Blade reusable
│       ├── layouts/                 # Master template (app, sidebar, header)
│       └── pages/
│           ├── auth/                # Halaman login/register
│           ├── csm-admin/           # Halaman modul CSM Administrator
│           │   ├── data-management/ # Tools DQC, Staging, Migration
│           │   ├── general/         # Master General (COA, Currency, dll.)
│           │   ├── liability/       # Master Liability (Assumption, Discount Rate)
│           │   └── report/          # Subledger, Financial, Actuary, Disclosure, Regulatory
│           ├── dashboard/           # Tampilan dashboard statistik
│           └── ui-elements/         # Komponen UI
├── routes/
│   ├── web.php                      # Definisi rute web & proteksi middleware role
│   └── console.php                  # Artisan command routes
├── package.json                     # Konfigurasi dependensi frontend (Node.js)
├── composer.json                    # Konfigurasi dependensi backend (PHP)
├── vite.config.js                   # Konfigurasi bundler Vite
└── README.md                        # Dokumentasi proyek ini
```

---

## 📦 Build untuk Produksi (Production)

Saat siap untuk rilis ke lingkungan produksi:

1. **Kompilasi Aset Frontend:**
   ```bash
   npm run build
   ```

2. **Optimasi Konfigurasi & Cache Laravel:**
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   composer install --optimize-autoloader --no-dev
   ```

3. **Set Environment Production:**
   Pastikan pada `.env`:
   ```env
   APP_ENV=production
   APP_DEBUG=false
   ```

---

## 📄 Lisensi

Proyek ini menggunakan lisensi [MIT](LICENSE).
