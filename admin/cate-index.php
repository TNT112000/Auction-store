
<?php
    session_start(); //Dịch vụ bảo vệ
    if(!isset($_SESSION['loginOK'])){
        header("Location:../index.php");
    }
    include '../config.php';
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
         include 'header.php';
        ?>

        <style>
        </style>

        <div class="add-category-bg">
            <div class="wide grid">
                <a href="add-cate.php" class="add-category">Thêm danh mục</a>
            </div>
        </div>
        <div class="content">
            <div class="grid wide">
                <div class="content-category">
                    <p class="content-title">Danh mục yêu thích</p>
                    <div class="content-category-product">
                        <div class="row">
                            <?php
                            
                            $sql = "SELECT c.edit_category_id,c.edit_category_img,l.category_name FROM edit_category c, list_category l
                                    WHERE c.category_id=l.category_id";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<div class="col l-1-5">';
                                    echo '<div href="" class="content-category-book">';
                                    echo '<a href="" ><img src="../image/product-img/' . $row['edit_category_img'] . '" alt="" class="category-book-img" ></a>';
                                    echo '<a href="" class="category-book-name">' . $row['category_name'] . '</a>';
                                    echo '<div class="edit-delate-category">';
                                    echo '<a href="up-cate.php?id=' . $row['edit_category_id'] . '"><i class="edit-delate-category-icon fas fa-edit"></i></a>';
                                    echo '<a href="del-cate.php?id=' . $row['edit_category_id'] . '"><i class="edit-delate-category-icon fas fa-times"></i></a>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
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