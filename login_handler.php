<?php
include "config.php";

$mode = $_POST['mode'];
$email = $_POST['email'];
$password = $_POST['password'];

if ($mode === "register") {

    $username = $_POST['username'];

    $hash = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn,
        "INSERT INTO users (email, username, password)
         VALUES ('$email', '$username', '$hash')"
    );

    // ✅ สมัครเสร็จ → กลับหน้าหลัก
        header("Location: index.php?mode=login");
        exit;

} else {

    $result = mysqli_query($conn,
        "SELECT * FROM users WHERE email='$email'"
    );

    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        echo "เข้าสู่ระบบสำเร็จ";
    } else {
        echo "อีเมลหรือรหัสผ่านไม่ถูกต้อง";
    }
}
?>
