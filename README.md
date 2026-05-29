# NTECH STORE - Website Shop

> **Môn học:** Phát triển Phần mềm Mã nguồn mở (PTPM_MNM)  
> **Repository:** [WebBanHang](https://github.com/Phatanyswer/WebBanHang)

---

## 🌟 Giới thiệu Dự án
**NTECH STORE** là một website bán hàng linh kiện máy tính hoàn chỉnh được thiết kế và xây dựng theo mô hình kiến trúc **MVC (Model-View-Controller)** chuẩn hóa trong PHP. Hệ thống hỗ trợ đầy đủ luồng nghiệp vụ mua bán hàng từ việc duyệt sản phẩm, phân loại danh mục, quản lý giỏ hàng, đặt hàng, thanh toán đến hệ thống đăng ký/đăng nhập người dùng bảo mật cao.

Dự án sở hữu giao diện được thiết kế theo phong cách **Apple Premium Design (Liquid Glass UI)** cao cấp, hỗ trợ chuyển đổi chế độ Sáng/Tối (Dark/Light mode) linh hoạt, tích hợp các thư viện UI hiện đại như SweetAlert2 cho trải nghiệm người dùng cao cấp.

---

## 🛠️ Công nghệ Sử dụng & Thư viện
- **Ngôn ngữ**: PHP (v8.3+), HTML5, CSS3, JavaScript (ES6+).
- **Cơ sở dữ liệu**: MySQL (v8.0+).
- **Môi trường phát triển**: Laragon (Web Server Apache/Nginx + MySQL).
- **Kiến trúc**: MVC thuần, định tuyến qua `.htaccess` và tập trung tại `index.php`.
- **Thư viện Giao diện (CSS/JS)**:
  - **Bootstrap 5**: Xây dựng Layout Responsive hoàn hảo trên mọi thiết bị.
  - **Font Awesome 6**: Hệ thống biểu tượng giao diện hiện đại.
  - **SweetAlert2**: Thông báo pop-up trực quan, sang trọng.
  - **Google Fonts (Inter)**: Typography tinh tế.
- **Thư viện Backend**:
  - **Firebase PHP-JWT (firebase/php-jwt)**: Quản lý, cấp phát và xác thực mã token bảo mật cho hệ thống RESTful API.

---

## ✨ Các Tính năng Nổi bật theo 6 Sprints

### 1. Kiến trúc MVC & Session (Sprint 1)
- Xây dựng luồng xử lý Controller - Model - View riêng biệt.
- Sử dụng Sessions để lưu trữ tạm thời dữ liệu sản phẩm phục vụ thử nghiệm trước khi nối CSDL.

### 2. Tích hợp Cơ sở dữ liệu MySQL (Sprint 2)
- Toàn bộ dữ liệu được quản lý lưu trữ trong DB `webbanhang`.
- Thực hiện đầy đủ các thao tác thêm, xóa, sửa, xem (CRUD) trực tiếp với bảng `products` của CSDL.
- Xử lý tải ảnh sản phẩm lên thư mục `public/images` an toàn.

### 3. Nghiệp vụ Giỏ hàng & Thanh toán (Sprint 3)
- Cơ chế Giỏ hàng thông minh (thêm sản phẩm, tăng/giảm số lượng trực tiếp bằng AJAX).
- Hệ thống thanh toán hoàn chỉnh lưu thông tin đơn hàng vào bảng `orders` (thông tin khách, trạng thái đơn) và chi tiết vào bảng `order_details`.

### 4. Xác thực & Phân quyền Người dùng (Sprint 4)
- Mã hóa mật khẩu an toàn bằng thuật toán `PASSWORD_BCRYPT` với cost `12`.
- Hệ thống đăng ký tài khoản mới và đăng nhập thông qua CSDL.
- Sử dụng `SessionHelper` để kiểm tra quyền truy cập và chặn các trang quản lý đối với người dùng chưa đăng nhập.

### 5. Xây dựng RESTful API & JS Fetch (Sprint 5)
- Viết API endpoints trả về JSON cho Danh mục (`/api/category`) và Sản phẩm (`/