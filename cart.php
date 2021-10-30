<?php
include 'config.php';
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$action = (isset($_GET['action'])) ? $_GET['action'] : 'add';

$sql = "SELECT * FROM list_book,list_category,moth WHERE book_id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$_SESSION['cart'][$id] = [
    'book_id' => $row['book_id'],
    'book_img' => $row['book_img'],
    'book_name' => $row['book_name'],
    'book_date' => $row['book_date'],
    'book_title' => $row['book_title'],
    'book_rice' => $row['book_rice'],
    'book_author' => $row['book_author'],
    'book_publish' => $row['book_publish'],
    'book_thickness' => $row['book_publish'],
    'rice_top' => $row['rice_top'],
    'category_name' => $row['category_name'],
    'thang_name' => $row['thang_name'],
    'gio' => $row['gio'],
    'ngay' => $row['ngay'],
    'phut' => $row['phut'],
    'giay' => $row['giay'],
    'nam' => $row['nam'],
    'user_top' => $row['user_top'],
];

if ($action == 'delete') {
    unset($_SESSION['cart'][$id]);
}


    header("Location:view-cart.php");

echo "<pre>";
print_r($_SESSION['cart']);
