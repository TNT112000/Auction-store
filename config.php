<?php
define('HOST', 'localhost');
define('USER', 'root');
const PASS = '';
const DB   = 'webside-gym';
$conn = mysqli_connect(HOST, USER, PASS, DB);
if (!$conn) {
    die('Không thể kết nối');
}
