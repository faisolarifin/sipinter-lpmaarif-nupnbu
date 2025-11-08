# SIPINTER LP MA'ARIF NU PBNU

<p align="center">
  <img src="https://maarifnu.or.id/assets/images/logo.png" width="300" alt="LP Ma'arif NU Logo">
</p>

<p align="center">
  <strong>Sistem Informasi Pendataan Terintegrasi Lembaga Pendidikan Ma'arif Nahdlatul Ulama</strong>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-10.x-red?style=flat-square&logo=laravel" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-8.1+-blue?style=flat-square&logo=php" alt="PHP">
  <img src="https://img.shields.io/badge/MySQL-8.0+-orange?style=flat-square&logo=mysql" alt="MySQL">
  <img src="https://img.shields.io/badge/Bootstrap-5.x-purple?style=flat-square&logo=bootstrap" alt="Bootstrap">
  <img src="https://img.shields.io/badge/ApexCharts-3.x-green?style=flat-square" alt="ApexCharts">
</p>

---

## 📋 Deskripsi

SIPINTER LP Ma'arif NU PBNU adalah sistem informasi pendataan terintegrasi yang menghubungkan satuan pendidikan di bawah naungan LP Ma'arif NU dengan kantor pusat PBNU. Sistem ini memfasilitasi pendataan dua arah antara operator sekolah dengan administrator LP Ma'arif NU PBNU secara digital dan real-time.

## ✨ Fitur Utama

### 🏫 **Manajemen Satuan Pendidikan (SATPEN)**
- Registrasi dan validasi satuan pendidikan
- Pengelolaan data sekolah/madrasah
- Verifikasi dokumen kelengkapan
- Status tracking permohonan
- Perpanjangan izin operasional

### 👥 **Manajemen PTK (Pendidik & Tenaga Kependidikan)**
- Pendataan guru dan tenaga kependidikan
- Sertifikasi dan kompetensi
- Status kepegawaian
- Riwayat karir dan pendidikan

### 🎓 **Manajemen Peserta Didik**
- Data statistik peserta didik
- Distribusi berdasarkan jenjang
- Analisis per wilayah dan cabang
- Laporan perkembangan

### 🏢 **Manajemen OSS (Online Single Submission)**
- Permohonan izin operasional
- Tracking status permohonan
- Kelengkapan dokumen digital
- Timeline proses perizinan

### 💰 **Manajemen BHPNU (Biaya Hak Pengelolaan NU)**
- Pembayaran biaya pengelolaan
- Verifikasi bukti pembayaran
- Riwayat transaksi
- Status pembayaran

### 📊 **Dashboard & Reporting**
- Dashboard multi-level (Pusat, Wilayah, Cabang)
- Visualisasi data dengan charts interaktif
- Export data ke Excel/PDF
- Real-time statistics

### 🔐 **Sistem Otentikasi & Otorisasi**
- Multi-role access control
- Role-based permissions
- Session management
- Password recovery

## 🏗️ Arsitektur Sistem

### **Multi-Level Access**
```
Super Admin (PBNU)
├── Admin Pusat
├── Admin Wilayah (Provinsi)
│   ├── Admin Cabang (Kabupaten/Kota)
│   │   └── Operator Sekolah
```

### **Struktur Database**
- **Users**: Manajemen pengguna dan roles
- **Satpen**: Data satuan pendidikan
- **PDPTK**: Pendidik dan tenaga kependidikan
- **OSS**: Online Single Submission
- **BHPNU**: Biaya hak pengelolaan
- **Regional**: Provinsi, kabupaten, cabang

## 🛠️ Tech Stack

### **Backend**
- **Framework**: Laravel 10.x
- **PHP**: 8.1+
- **Database**: MySQL 8.0+
- **Authentication**: Laravel Sanctum
- **File Storage**: Local/Cloud Storage

### **Frontend**
- **CSS Framework**: Bootstrap 5.x
- **Charts**: ApexCharts.js
- **Icons**: Tabler Icons
- **JavaScript**: Vanilla JS + jQuery
- **Build Tool**: Vite

### **Packages & Libraries**
- **Excel Export**: Maatwebsite/Excel
- **QR Code**: Endroid/QR-Code
- **PDF Generator**: PHPWord
- **Date Converter**: Laravel Hijri Date
- **HTTP Client**: Guzzle HTTP

## 📦 Instalasi

### **Prerequisites**
```bash
PHP >= 8.1
Composer
Node.js & NPM
MySQL >= 8.0
```

### **1. Clone Repository**
```bash
git clone https://github.com/faisolarifin/siap-lpmaarif-nupnbu.git
cd sipinter-lpmaarif-nupbnu
```

### **2. Install Dependencies**
```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### **3. Environment Setup**
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### **4. Database Configuration**
Edit `.env` file:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sipinter_db
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### **5. Database Migration & Seeding**
```bash
# Run migrations
php artisan migrate

# Seed database (optional)
php artisan db:seed
```

### **6. Storage & Permissions**
```bash
# Create storage symlink
php artisan storage:link

# Set permissions (Linux/Mac)
chmod -R 775 storage bootstrap/cache
```

### **7. Build Assets**
```bash
# Development
npm run dev

# Production
npm run build
```

### **8. Run Application**
```bash
# Development server
php artisan serve
```

Access: `http://localhost:8000`

## ⚙️ Konfigurasi

### **Mail Configuration**
```env
MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host
MAIL_PORT=587
MAIL_USERNAME=your-email
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@maarifnu.or.id
MAIL_FROM_NAME="SIPINTER LP Ma'arif NU"
```

### **File Upload Limits**
```env
# Maximum file size (in kilobytes)
MAX_UPLOAD_SIZE=10240

# Allowed file types
ALLOWED_EXTENSIONS=pdf,doc,docx,jpg,jpeg,png
```

## 📁 Struktur Project

```
sipinter-lpmaarif-nupbnu/
├── app/
│   ├── Http/Controllers/        # Controllers
│   │   ├── Admin/              # Admin controllers
│   │   ├── Api/                # API controllers
│   │   └── Master/             # Master data controllers
│   ├── Models/                 # Eloquent models
│   ├── Helpers/                # Helper classes
│   ├── Mail/                   # Mail classes
│   └── Exports/                # Excel export classes
├── resources/
│   ├── views/                  # Blade templates
│   │   ├── admin/              # Admin views
│   │   ├── home/               # Public views
│   │   └── template/           # Layout templates
│   ├── js/                     # JavaScript files
│   └── css/                    # Stylesheets
├── routes/
│   ├── web.php                 # Web routes
│   ├── api.php                 # API routes
│   └── console.php             # Console routes
├── database/
│   ├── migrations/             # Database migrations
│   └── seeders/                # Database seeders
└── public/
    ├── assets/                 # Static assets
    └── storage/                # File uploads
```

## 🔧 API Endpoints

### **Authentication**
```http
POST /login                     # User login
POST /logout                    # User logout
POST /register                  # User registration
POST /forgot-password           # Password reset
```

### **Dashboard API**
```http
GET /api/provcount              # Province statistics
GET /api/kabcount               # Regency statistics
GET /api/pccount                # Branch statistics
GET /api/jenjangcount           # Education level stats
GET /api/ptkcount               # PTK statistics (Admin Cabang)
GET /api/pdcount                # Student statistics (Admin Cabang)
```

### **Data Management**
```http
GET /api/satpen/search          # Search institutions
GET /api/satpen/{id}            # Get institution details
GET /api/checknpsn/{npsn}       # Validate NPSN
GET /api/kabupaten/{provId}     # Get regencies by province
```

## 👤 User Roles & Permissions

| Role | Permissions |
|------|-------------|
| **Super Admin** | Full system access, user management |
| **Admin Pusat** | National data access, reporting |
| **Admin Wilayah** | Provincial data management |
| **Admin Cabang** | Regional data management, PTK/PD charts |
| **Operator** | School data entry, document upload |

## 📊 Dashboard Features

### **Admin Cabang Dashboard**
- **Chart PTK**: Statistik Pendidik & Tenaga Kependidikan
  - Guru Laki-laki/Perempuan
  - Tendik Laki-laki/Perempuan
- **Chart Peserta Didik**: Distribusi berdasarkan jenis kelamin
- **Interactive Charts**: Bar, Pie, Line charts
- **Export Features**: PNG, PDF export

### **Multi-Level Analytics**
- Provincial distribution maps
- Regency-wise statistics
- Education level analysis
- Time-series data

## 🔒 Keamanan

- **Authentication**: Session-based authentication
- **Authorization**: Role-based access control
- **CSRF Protection**: Built-in CSRF tokens
- **Input Validation**: Server-side validation
- **File Upload Security**: Type and size restrictions
- **SQL Injection Prevention**: Eloquent ORM

## 📱 Responsive Design

- **Mobile-First**: Bootstrap 5 responsive grid
- **Cross-Browser**: Modern browser compatibility
- **Touch-Friendly**: Mobile-optimized interfaces
- **Progressive Enhancement**: Graceful degradation

## 🧪 Testing

```bash
# Run tests
php artisan test

# Run specific test
php artisan test --filter TestName

# Generate coverage report
php artisan test --coverage
```

## 📝 Logging

```bash
# View logs
tail -f storage/logs/laravel.log

# Clear logs
php artisan log:clear
```

## 🚀 Deployment

### **Production Setup**
```bash
# Optimize for production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Set environment
APP_ENV=production
APP_DEBUG=false
```

### **Server Requirements**
- **Web Server**: Apache/Nginx
- **PHP**: 8.1+ with extensions (mbstring, openssl, PDO, tokenizer, XML)
- **Database**: MySQL 8.0+
- **Storage**: Sufficient space for file uploads

## 🤝 Contributing

1. Fork repository
2. Create feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to branch (`git push origin feature/AmazingFeature`)
5. Open Pull Request

## 📄 License

This project is licensed under the [MIT License](LICENSE).

## 👨‍💻 Development Team

- **Lead Developer**: [Faisal Arifin](https://github.com/faisolarifin)
- **Organization**: LP Ma'arif NU PBNU

## 📞 Support

Untuk bantuan teknis dan pertanyaan:

- **Email**: support@maarifnu.or.id
- **Website**: [https://maarifnu.or.id](https://maarifnu.or.id)
- **Documentation**: [Wiki](https://github.com/faisolarifin/siap-lpmaarif-nupnbu/wiki)

---

<p align="center">
  <strong>SIPINTER LP Ma'arif NU PBNU</strong><br>
  <em>Memajukan Pendidikan Islam Berkualitas</em>
</p>

