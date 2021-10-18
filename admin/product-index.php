<?php
session_start(); //Dịch vụ bảo vệ
if (!isset($_SESSION['loginOK'])) {
    header("Location:../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css" class="">
    <link rel="stylesheet" href="../css/grid.css" class="">
    <link rel="stylesheet" href="../css/base.css" class="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<script src="../JS/main.js"></script>
    <div class="main">
        <?php
         include '../header-ad.php';
        ?>

        <style>
        </style>

        <div class="add-category-bg">
            <div class="wide grid">
                <a href="add-product.php" class="add-category">Thêm danh Sản Phẩm</a>
            </div>
        </div>
        <div class="content">
            <div class="grid wide">
                <div class="content-product">
                    <p class="content-title">Sản phẩm</p>
                    <div class="content-product-product">
                        <div class="row">
                            <?php
                            include '../config.php';
                            $sql = "SELECT l.book_id,l.book_img,l.book_name,l.category_id,l.book_thickness,l.book_title,l.book_rice,c.category_name	FROM list_book l, list_category c
                    WHERE l.category_id=c.category_id";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo 
                        '<div class="col l-3">
                        <div class="content-product-box">

                            <a href="" class="content-product-book">
                                <div><img src="../image/product-img/' . $row['book_img'] . '" alt="" class="product-book-img"></div>
                                <div class="product-book-content">
                                    <p class="product-book-name">' . $row['book_name'] . '</p>
                                    <div class="product-book-list">
                                        <div class="product-book-item">
                                            <p class="product-book-text">Thể loại </p>
                                            <p class="product-book-text">' . $row['category_name'] . '</p>
                                        </div>
                                        <div class="product-book-item">
                                            <p class="product-book-text">Độ dày </p>
                                            <p class="product-book-text">' . $row['book_thickness'] . ' trang</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="product-book-rice">Gía bán : ' . $row['book_rice'] . ' Đ</p>
                            </a>
                            <div class="edit-delate-product">
                                   <a href="up-product.php?id=' . $row['book_id'] . '"><i class="edit-delate-category-icon fas fa-edit"></i></a>
                                   <a href="del-product.php?id=' . $row['book_id'] . '"><i class="edit-delate-category-icon fas fa-times"></i></a>
                            </div>
                        </div>
                        </div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>