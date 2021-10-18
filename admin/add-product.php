<?php
if (isset($_POST["them"])) {
    $book_img = $_FILES['bookImg']['name'];
    $book_name = $_POST['bookName'];
    $category_id = $_POST['category'];
    $book_thickness = $_POST['bookThickness'];
    $book_title = $_POST['bookTitle'];
    $book_rice = $_POST['bookRice'];
    $book_author = $_POST['bookAuthor'];
    $book_date = $_POST['bookDate'];
    $book_publish = $_POST['bookPublish'];

    include '../config.php';
    if ($book_img != '' && $book_name != '' && $category_id != '' && $book_thickness != '' && $book_title != '' && $book_rice != '' && $book_publish != '' && $book_date != '' && $book_author != '') {
        $sql = "INSERT INTO list_book (book_img,book_name,category_id,book_thickness,book_title,book_rice,book_author,book_date,book_publish)
VALUE ('$book_img','$book_name','$category_id','$book_thickness','$book_title','$book_rice', '$book_author',' $book_date','$book_publish')";

        echo $sql;
        $result = mysqli_query($conn, $sql);
        if ($result > 0) {
            header("location:product-index.php");
        } else {
            echo "Lỗi!";
        }
    }
    else{
        echo 'Bạn đã nhập thiếu thông tin';
    }
    mysqli_close($conn);
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
        include '../config.php';
        ?>
        <div class="content-add">
            <div class="grid wide">
                <p class="title-add">Thêm sản phẩm</p>
                <form class="form" action="" method="post" enctype="multipart/form-data">
                    <div class="box-product-add">
                        <label class="content-title-add">Chọn hình ảnh</label>
                        <input type="file" class="input-add" name="bookImg">
                    </div>
                    <div class="box-product-add">
                        <label class="content-title-add">Tác giả</label>
                        <input type="text" class="input-add" name="bookAuthor">
                    </div>
                    <div class="box-product-add">
                        <label class="content-title-add">Ngày xuất bản</label>
                        <input type="date" class="input-add" name="bookDate">
                    </div>
                    <div class="box-product-add">
                        <label class="content-title-add">Nhà phát hành</label>
                        <input type="text" class="input-add" name="bookPublish">
                    </div>
                    <div class="box-product-add">
                        <label class="content-title-add">Tên sách</label>
                        <input type="text" class="input-add" name="bookName">
                    </div>
                    <div class="box-product-add">
                        <label class="content-title-add">Tên danh mục </label>
                        <select class="select-add" name="category">
                            <!-- Lấy dữ liệu từ bảng Office -->
                            <?php
                            $sql = "SELECT * FROM list_category";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result)) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option  value="' . $row['category_id'] . '">' . $row['category_name'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="box-product-add">
                        <label class="content-title-add">Số trang</label>
                        <input type="text" class="input-add" name="bookThickness">
                    </div>
                    <div class="box-product-add">
                        <label class="content-title-add">Tóm tắt</label>
                        <input type="text" class="input-add" name="bookTitle">
                    </div>
                    <div class="box-product-add">
                        <label class="content-title-add">Gía tiền</label>
                        <input type="text" class="input-add" name="bookRice">
                    </div>
                    <div class="box-product-add">
                        <button class="btn-add" type="submit" name="them">Lưu lại</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>