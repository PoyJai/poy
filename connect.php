<?php
$conn = new mysqli("localhost", "root", "", "auth_system");

if ($conn->connect_error) {
    die("เชื่อมต่อฐานข้อมูลล้มเหลว");
}
$conn->set_charset("utf8");
