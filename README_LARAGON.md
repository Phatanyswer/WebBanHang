Hướng dẫn chạy project trên Laragon

Bước nhanh:

1. Mở Laragon và bấm "Start All". Đảm bảo MySQL (MariaDB) và Apache/Nginx đang chạy.
2. (Tùy chọn) Bật "Menu > Preferences > Services & Ports > Auto virtual hosts" để truy cập project bằng http://4851-nguyenngoctinh-websitebanhang.test (hoặc tương tự).
3. Mở PowerShell, chuyển vào thư mục project:

```powershell
cd C:\laragon\www\COS340-open-source-software-development\4851_NguyenNgocTinh_WebsiteBanHang
```

4. Chạy script import cơ sở dữ liệu (Laragon mặc định MySQL user=root, password trống):

```powershell
# Nếu Laragon MySQL có mật khẩu, sửa file setup_laragon.ps1
.\setup_laragon.ps1
```

5. Nếu project cần Composer dependencies, chạy (nếu có file composer.json):

```powershell
composer install
```

6. Truy cập website:
   - Nếu không bật virtual host: http://localhost/4851_NguyenNgocTinh_WebsiteBanHang/
   - Nếu bật virtual host: mở domain hiển thị trong Laragon (ví dụ http://4851-nguyenngoctinh-websitebanhang.test)

Ghi chú:
- Nếu cần thay đổi tên database, chỉnh `db_name` trong `app/config/database.php` hoặc sửa biến `$dbName` trong `setup_laragon.ps1`.
- Thư mục `public/uploads` chứa ảnh mẫu; nếu không hiện ảnh, kiểm tra đường dẫn trong `product.image` hoặc set quyền đọc cho thư mục.
- Nếu gặp lỗi kết nối DB, mở Laragon > MySQL > Terminal để kiểm tra kết nối và thông tin user/password.

Liên hệ: cập nhật README nếu bạn muốn tôi tự động thay `db_name` trong `app/config/database.php` từ `database.sql`.