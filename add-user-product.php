<?php
session_start(); //Dịch vụ bảo vệ
if (!isset($_SESSION['loginOK'])) {
    header("Location:index.php");
}
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css" class="">
    <link rel="stylesheet" href="css/base.css" class="">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <script src="JS/main.js"></script>
    <div class="main" >
        <?php
        include 'header.php';
        ?>
        <div class="content-add">
            <div class="grid wide">
                <p class="title-add">Thêm sản phẩm</p>
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
                    $nam = $_POST['nam'];
                    $thang = $_POST['thang'];
                    $ngay = $_POST['ngay'];
                    $gio = $_POST['gio'];
                    $phut = $_POST['phut'];
                    $giay = $_POST['giay'];
                    $rice_top = $_POST['rice_top'];


                    if ($nam!='' && $ngay!='' && $thang!='' && $book_img != '' && $book_name != '' && $category_id != '' && $book_thickness != '' && $book_title != '' && $book_rice != '' && $book_publish != '' && $book_date != '' && $book_author != '') {
                        $sql = "INSERT INTO list_book (book_own,rice_top,book_img,book_name,category_id,book_thickness,book_title,book_rice,book_author,book_date,book_publish,nam,ngay,gio,phut,giay,thang_id)
VALUE ('$_SESSION[loginOK]','$rice_top','$book_img','$book_name','$category_id','$book_thickness','$book_title','$book_rice', '$book_author',' $book_date','$book_publish','$nam','$ngay','$gio','$phut','$giay','$thang')";


                        $result = mysqli_query($conn, $sql);
                        if ($result > 0) {
                            header("location:user-sell-index.php");
                        } else {
                            echo "Lỗi!";
                        }
                    } else {
                        echo '<p class="title-ok">Bạn đã nhập thiếu thông tin</p>';
                    }
                    mysqli_close($conn);
                }
                ?>

                <form class="form" action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col l-6">
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
                                <input type="text" name="category" class="input-add" list="datalist" autocomplete="off">
                                <datalist id="datalist" class="select-add">
                                    <?php
                                    $sql = "SELECT * FROM list_category";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result)) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<option  value="' . $row['category_id'] . '">' . $row['category_name'] . '</option>';
                                        }
                                    }
                                    ?>
                                </datalist>
                            </div>
                            <div class="box-product-add">
                                <label class="content-title-add">Số trang</label>
                                <input type="text" class="input-add" name="bookThickness">
                            </div>
                            <div class="box-product-add">
                                <label class="content-title-add">Tóm tắt</label>
                                <textarea class="input-add" name="bookTitle" cols="33" rows="4"></textarea>
                            </div>
                            <div class="box-product-add">
                                <label class="content-title-add">Giá tiền</label>
                                <input type="text" class="input-add" name="bookRice">
                            </div>
                            <div class="box-product-add">
                                <label class="content-title-add">Giá cao nhất</label>
                                <input type="text" class="input-add" name="rice_top">
                            </div>
                        </div>
                        <div class="col l-6">
                        <p class="content-title-add" style="width:170px;">Thời gian đấu giá</p>
                            <div class="box-add">
                                <label class="content-title-add">Ngày</label>
                                <input type="text" class="input-add" name="ngay">
                            </div>
                            <div class="box-add">
                                <label class="content-title-add">Tháng</label>
                                <input type="text" name="thang" class="input-add" list="data" autocomplete="off">
                                <datalist id="data" class="select-add">
                                    <?php
                                    $sql = "SELECT * FROM moth";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result)) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<option  value="' . $row['thang_id'] . '">' . $row['thang_name'] . '</option>';
                                        }
                                    }
                                    ?>
                                </datalist>
                            </div>
                            <div class="box-add">
                                <label class="content-title-add">Năm</label>
                                <input type="text" class="input-add" name="nam">
                            </div>
                            <div class="box-add">
                                <label class="content-title-add">Giờ</label>
                                <input type="text" class="input-add" name="gio">
                            </div>
                            <div class="box-add">
                                <label class="content-title-add">Phút</label>
                                <input type="text" class="input-add" name="phut">
                            </div>
                            <div class="box-add">
                                <label class="content-title-add">Giây</label>
                                <input type="text" class="input-add" name="giay">
                            </div>
                        </div>
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