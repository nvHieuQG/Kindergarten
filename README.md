# 🎓 Hệ thống Quản lý Trường Mầm Non Hoa Hướng Dương

Website quản lý trường mẫu giáo được xây dựng bằng Laravel 12 và TailwindCSS.

## 📋 Tính năng

### Frontend (Trang công khai)
- ✅ Trang chủ với thông tin trường
- ✅ Giới thiệu về trường
- ✅ Blog/Tin tức
- ✅ Danh sách giáo viên
- ✅ Dịch vụ và chương trình học
- ✅ Form liên hệ
- ✅ Form đăng ký nhập học
- ✅ Thông tin chi nhánh

### Admin Panel
- ✅ Dashboard với thống kê tổng quan
- ✅ Quản lý bài viết (CRUD)
- ✅ Quản lý danh mục
- ✅ Quản lý giáo viên
- ✅ Quản lý dịch vụ
- ✅ Quản lý chi nhánh
- ✅ Quản lý đơn đăng ký nhập học
- ✅ Quản lý tin nhắn liên hệ
- ✅ Quản lý bình luận
- ✅ Cài đặt hệ thống

### 🔐 Xác thực & Phân quyền
- ✅ **Chỉ Admin** mới có thể đăng nhập
- ❌ **Không cho phép** user thường đăng ký
- ✅ Phụ huynh **KHÔNG CẦN** đăng nhập để xem thông tin hoặc gửi form
- ✅ Quản lý tài khoản admin qua Seeder hoặc Tinker

## 🛠️ Công nghệ sử dụng

- **Backend:** Laravel 12, PHP 8.2+
- **Frontend:** Blade Templates, TailwindCSS, Alpine.js
- **Database:** MySQL/MariaDB
- **Authentication:** Laravel Breeze

## 📦 Cài đặt (Development)

### Yêu cầu hệ thống
- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL/MariaDB

### Các bước cài đặt

1. **Clone repository**
```bash
git clone https://github.com/your-username/kindergarten.git
cd kindergarten
```

2. **Cài đặt dependencies**
```bash
composer install
npm install
```

3. **Cấu hình môi trường**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Cấu hình database trong file `.env`**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kindergarten
DB_USERNAME=root
DB_PASSWORD=
```

5. **Chạy migrations và seeders**
```bash
php artisan migrate
php artisan db:seed
```

6. **Tạo symbolic link cho storage**
```bash
php artisan storage:link
```

7. **Build assets**
```bash
npm run dev
```

8. **Chạy server**
```bash
php artisan serve
```

Website sẽ chạy tại: `http://localhost:8000`

## 🔐 Tài khoản Admin

### ⚠️ Lưu ý quan trọng
- ❌ **Không cho phép** user thường đăng ký tài khoản
- ✅ **Chỉ Admin** mới có thể đăng nhập vào hệ thống
- ✅ Phụ huynh có thể xem thông tin và gửi form **KHÔNG CẦN** đăng nhập
- ✅ Route `/register` đã bị **vô hiệu hóa**

### Tài khoản Admin mặc định (Development)

**⚠️ CHỈ SỬ DỤNG TRÊN MÔI TRƯỜNG DEVELOPMENT**

```
Email: admin@kindergarten.com
Password: 111111
```

### Tạo Admin mới

**Cách 1: Sử dụng Seeder (Khuyến nghị)**

Chỉnh sửa file `.env`:
```env
ADMIN_NAME="Tên quản trị viên"
ADMIN_EMAIL="email-bao-mat@yourdomain.com"
ADMIN_PASSWORD="MatKhauCucManh@2026!"
```

Sau đó chạy:
```bash
php artisan db:seed --class=AdminUserSeeder
```

**📖 Xem thêm:** [ADMIN_GUIDE.md](./ADMIN_GUIDE.md) - Hướng dẫn chi tiết về quản lý tài khoản Admin

## 🚀 Deploy lên Production

**📖 Đọc kỹ file `DEPLOYMENT_GUIDE.md` trước khi deploy!**

Các bước quan trọng:
1. ✅ Đổi `ADMIN_EMAIL` và `ADMIN_PASSWORD` trong `.env`
2. ✅ Đặt `APP_ENV=production`
3. ✅ Đặt `APP_DEBUG=false`
4. ✅ Cấu hình database production
5. ✅ Chạy migrations và seeders
6. ✅ Tối ưu hóa cache

Chi tiết xem tại: [DEPLOYMENT_GUIDE.md](./DEPLOYMENT_GUIDE.md)

## 📁 Cấu trúc thư mục

```
kindergarten/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/          # Controllers cho admin panel
│   │   ├── Auth/           # Controllers xác thực
│   │   └── FrontendController.php
│   └── Models/             # Eloquent models
├── database/
│   ├── migrations/         # Database migrations
│   └── seeders/           # Database seeders
├── resources/
│   └── views/
│       ├── admin/         # Views cho admin panel
│       ├── frontend/      # Views cho trang công khai
│       └── layouts/       # Layout templates
├── routes/
│   ├── web.php           # Web routes
│   └── auth.php          # Authentication routes
└── public/
    └── assets/           # Static assets (images, css, js)
```

## 🔒 Bảo mật

### File `.env`
- ❌ **KHÔNG BAO GIỜ** commit file `.env` lên Git
- ✅ File `.env` đã được thêm vào `.gitignore`
- ✅ Sử dụng `.env.example` làm template

### Tài khoản Admin
- ❌ **KHÔNG** sử dụng password yếu như "111111", "123456"
- ✅ Sử dụng password mạnh: ít nhất 12 ký tự, có chữ hoa, chữ thường, số, ký tự đặc biệt
- ✅ Đổi password định kỳ

### Production
- ✅ Đặt `APP_DEBUG=false`
- ✅ Sử dụng HTTPS
- ✅ Cấu hình CORS đúng cách
- ✅ Backup database thường xuyên

## 🧪 Testing

Chạy tests:
```bash
php artisan test
```

## 📝 License

MIT License

## 👥 Liên hệ

- Website: https://yourdomain.com
- Email: contact@yourdomain.com

---

**⚠️ LƯU Ý QUAN TRỌNG:**

Trước khi deploy lên production, hãy đọc kỹ file [DEPLOYMENT_GUIDE.md](./DEPLOYMENT_GUIDE.md) để đảm bảo bảo mật tài khoản admin và cấu hình đúng cách!
