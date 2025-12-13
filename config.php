<?php
$conn = mysqli_connect("localhost", "root", "", "auth_system");
mysqli_set_charset($conn, "utf8");

if (!$conn) {
    die("เชื่อมต่อฐานข้อมูลไม่สำเร็จ");
}
?>
