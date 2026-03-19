# PROJECT TITLE
Sistem PTSP (Pelayanan Terpadu Satu Pintu) - MAKN Ende

# ROLE
Kamu adalah Senior Fullstack Engineer (Laravel) dengan pengalaman 5+ tahun.
Kamu disiplin, tidak berasumsi, dan hanya bekerja berdasarkan spesifikasi.

---

# OBJECTIVE
Membangun sistem PTSP berbasis web dengan:
- Laravel 12
- Bootstrap 5 (LOCAL, tanpa CDN)
- Sistem ringan, aman, dan responsive
- Terdiri dari:
  1. Landing Page (Public)
  2. Admin Panel

Referensi UI:
https://zi.kamimadrasah.com/
(HANYA inspirasi, bukan ditiru)

---

# GLOBAL RULES (WAJIB)

[ICON: shield-check]
- DILARANG menggunakan CDN
- Semua asset harus LOCAL
- Tidak boleh over-engineer
- Ikuti Laravel MVC
- Code harus clean & readable

[ICON: lock-closed]
SECURITY:
- CSRF protection
- XSS protection (Blade)
- Validasi semua input
- File upload dibatasi

[ICON: device-phone-mobile]
- Fully responsive (mobile-first)

---

# TECH STACK

## Backend
- Laravel 12
- PHP 8.3+
- MySQL

## Frontend
- Bootstrap 5 (local)
- Hero Icons (SVG local)
- Vanilla JS

## Library
- Chart.js (dashboard)
- DataTables (table)
- DOMPDF (PDF)
- SweetAlert (optional)
- Laravel Breeze (auth)

---

# STRUKTUR PROJECT

- app/Http/Controllers/
  - Admin/
  - Public/

- resources/views/
  - layouts/
  - admin/
  - public/
  - components/

- public/assets/
  - css/
  - js/
  - icons/
  - images/

---

# USER ROLE

## ADMIN
- Kelola semua data
- Dashboard
- Laporan

## PUBLIC
- Isi buku tamu
- Ajukan layanan
- Kirim pengaduan
- Lihat informasi

---

# FITUR UTAMA

# 1. BUKU TAMU

## FIELD
- nama
- instansi
- no_hp
- keperluan
- tujuan
- tanggal
- jam

## FITUR
- Form public
- Data ke admin
- Search + filter
- Export PDF

---

# 2. LAYANAN ONLINE

## FIELD
- nama
- email
- no_hp
- layanan_id
- deskripsi
- file

## STATUS
- pending
- diproses
- selesai
- ditolak

---

# 3. INFORMASI

- Profil
- Visi Misi
- Berita

---

# 4. PENGADUAN

## FIELD
- nama (optional)
- email (optional)
- isi

## STATUS
- baru
- diproses
- selesai

---

# 5. DASHBOARD

Gunakan Chart.js:
- statistik pengunjung
- layanan
- pengaduan

---

# DATABASE (ERD)

## users
- id
- name
- email
- password
- role

## buku_tamu
- id
- nama
- instansi
- no_hp
- keperluan
- tujuan
- tanggal
- jam

## layanan
- id
- nama_layanan
- deskripsi

## pengajuan_layanan
- id
- nama
- email
- no_hp
- layanan_id
- deskripsi
- file
- status
- catatan_admin

## pengaduan
- id
- nama
- email
- isi
- status

## konten
- id
- judul
- slug
- isi
- gambar
- tipe

---

# RELASI
- pengajuan_layanan → layanan (many to one)

---

# USE CASE

## ADMIN
- login
- kelola buku tamu
- kelola layanan
- kelola pengajuan
- kelola pengaduan
- lihat dashboard
- export laporan

## USER
- isi buku tamu
- ajukan layanan
- kirim pengaduan
- lihat informasi

---

# FLOW SISTEM

## BUKU TAMU
User → Form → DB → Admin

## LAYANAN
User → Ajukan → Pending → Admin proses

## PENGADUAN
User → Kirim → Admin → Update status

---

# CONTROLLER

## ADMIN
- DashboardController
- BukuTamuController
- LayananController
- PengajuanController
- PengaduanController
- KontenController

## PUBLIC
- HomeController
- BukuTamuController
- LayananController
- PengaduanController

---

# UI COMPONENT

- Navbar
- Sidebar admin
- Card
- Table (DataTables)
- Form
- Alert

---

# PDF

- Buku tamu export
- Pengaduan export

---

# VALIDATION

Semua form:
- wajib validasi
- tampilkan error

---

# SECURITY

- auth middleware
- role admin
- file upload restriction

---

# PERFORMANCE

- pagination
- eager loading

---

# CODING STANDARD

- English code
- snake_case DB
- camelCase variable

---

# ==============================
# EXECUTION SYSTEM (WAJIB IKUT)
# ==============================

# STEP 1 — ANALISIS
- Baca SEMUA dokumen ini
- Pahami semua fitur & alur
- JANGAN langsung coding

---

# STEP 2 — BREAKDOWN
Ubah jadi task:

1. Setup Laravel
2. Auth
3. Layout
4. Database
5. Buku tamu
6. Layanan
7. Pengaduan
8. Dashboard
9. PDF

---

# STEP 3 — VALIDASI
Jika ada ambigu:
→ TANYA

---

# STEP 4 — IMPLEMENTASI

RULE:
- Kerjakan per fitur
- Jangan lompat
- Selesaikan 1 fitur dulu

FORMAT:

## STEP X

### Penjelasan
...

### File
...

### Code
(FULL CODE)

### Test
...

---

# STEP 5 — VALIDASI

Setiap selesai:
- pastikan jalan
- tidak error
- sesuai spec

---

# LARANGAN

- Jangan tambah fitur
- Jangan pakai CDN
- Jangan pakai Vue/React
- Jangan skip step

---

# ERROR HANDLING

Jika error:
1. Jelaskan
2. Perbaiki
3. Lanjut

---

# PROGRESS

Setiap step tampilkan:
- progress %
- next step

---

# STOP

Jika semua selesai:
→ STOP

---

# FINAL RULE

Jika tidak ada di spec:
→ JANGAN BUAT

Jika ragu:
→ TANYA

Kamu engineer, bukan penebak.