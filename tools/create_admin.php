<?php
// 1. Cấu hình kết nối Database Laragon
$host = 'localhost';
$db   = 'my_store';
$user = 'root';
$pass = ''; // Mặc định Laragon để trống mật khẩu MySQL
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (\PDOException $e) {
     die("Lỗi kết nối Database: " . $e->getMessage());
}

// 2. Kiểm tra xem bạn đang chạy bằng Terminal (CLI) hay bằng Trình duyệt
if (php_sapi_name() === 'cli') {
    // Nếu chạy bằng Terminal: lấy tài khoản và mật khẩu từ lệnh gõ
    if (isset($argv[1]) && isset($argv[2])) {
        $username = $argv[1];
        $password = $argv[2];
    } else {
        die("Thiếu thông tin! Hãy chạy theo mẫu: php tools\create_admin.php admin@example.com YourPassword123\n");
    }
} else {
    // Nếu chạy bằng Trình duyệt: Mặc định sẽ tạo tài khoản dưới đây
    $username = 'admin@example.com';
    $password = 'YourPassword123';
    
    // Bảo mật: Chỉ cho phép chạy trên máy bạn (localhost)
    if ($_SERVER['REMOTE_ADDR'] !== '127.0.0.1' && $_SERVER['REMOTE_ADDR'] !== '::1') {
        die("Chỉ được phép chạy trên localhost!");
    }
}

$fullname = 'Quản trị viên hệ thống';
$role = 'admin';

// 3. Mã hóa mật khẩu theo chuẩn Bcrypt vòng lặp 12 (khớp hoàn toàn với database cũ của bạn)
$hashed_password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);

// 4. Tiến hành nạp tài khoản vào bảng account
try {
    $stmt = $pdo->prepare("INSERT INTO account (username, fullname, password, role) VALUES (?, ?, ?, ?)");
    $stmt->execute([$username, $fullname, $hashed_password, $role]);
    
    echo "--- TẠO TÀI KHOẢN ADMIN THÀNH CÔNG ---<br>";
    echo "Tên đăng nhập: <b>$username</b><br>";
    echo "Mật khẩu: <b>$password</b><br>";
    echo "Vai trò: <b>$role</b><br>";
} catch (\PDOException $e) {
    echo "Lỗi (Có thể tài khoản này đã tồn tại trong máy): " . $e->getMessage();
}
?>