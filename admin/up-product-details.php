<?php
session_start(); //Dịch vụ bảo vệ
if (!isset($_SESSION['loginOK'])) {
    header("Location:../index.php");
}
include '../config.php';
?>

<?php


if (isset($_GET['id'])) {
    $id = $_GET['id'];
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
        include 'header.php';
        ?>
        <div class="content-add">
            <div class="grid wide">
                <p class="title-add">Chỉnh sửa sản phẩm</p>
                <?php
                $sql = "SELECT *	FROM list_book l, list_category c, moth m
                WHERE  l.category_id=c.category_id and l.thang_id=m.thang_id and l.book_id=$id ";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                if (mysqli_num_rows($result) > 0){
                if (isset($_POST["sua"])) {
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
                    

                    if ($_FILES['bookImg']['name'] == '') {
                        $book_img = $row['book_img'];
                    } else {
                        $book_img = $_FILES['bookImg']['name'];
                    }

                    if ($_POST['category'] == '') {
                        $category_id = $row['category_id'];
                    } else {
                        $category_id = $_POST['category'];
                    }

                    if ($_POST['thang'] == '') {
                        $thang = $row['thang_id'];
                    } else {
                        $thang = $_POST['thang'];
                    }

                    if ($_POST['bookTitle'] == '') {
                        $book_title = $row['book_title'];
                    } else {
                        $book_title = $_POST['bookTitle'];
                    }

                    if ($nam != '' && $ngay != '' && $thang != '' && $book_img != '' && $book_name != '' && $category_id != '' && $book_thickness != '' && $book_title != '' && $book_rice != '' && $book_publish != '' && $book_date != '' && $book_author != '') {
                        $sql = "UPDATE list_book SET book_img='$book_img' , book_name='$book_name',category_id='$category_id',book_rice='$book_rice' , 
                        book_title='$book_title' , book_thickness='$book_thickness' ,book_author='$book_author',book_date='$book_date' ,book_publish='$book_publish',
                        ngay='$ngay',thang_id='$thang',nam='$nam',giay='$giay',gio='$gio',giay='$giay'  WHERE book_id=$id ";

                        $product = mysqli_query($conn, $sql);
                        if ($product > 0) {
                            header("Location: product-details-index.php?id=$row[book_id]");
                        } else {
                            echo "Lỗi!";
                        }
                    }
                    else {
                        echo '<p class="title-ok">Nhập thiếu thông tin</p>';
                    }

                    mysqli_close($conn);
                }
            }
                ?>
                <form class="form" action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col l-6">
                            <div class="box-product-add">
                                <label class="content-title-add">Chọn hình ảnh</label>
                                <input type="file" class="input-add" name="bookImg" value="<?php echo $row['book_img'] ?>">
                            </div>
                            <div class="box-product-add">
                                <label class="content-title-add">Tác giả</label>
                                <input type="text" class="input-add" name="bookAuthor" value="<?php echo $row['book_author'] ?>">
                            </div>
                            <div class="box-product-add">
                                <label class="content-title-add">Ngày xuất bản</label>
                                <input type="date" class="input-add" name="bookDate" value="<?php echo $row['book_date'] ?>">
                            </div>
                            <div class="box-product-add">
                                <label class="content-title-add">Nhà phát hành</label>
                                <input type="text" class="input-add" name="bookPublish" value="<?php echo $row['book_publish'] ?>">
                            </div>
                            <div class="box-product-add">
                                <label class="content-title-add">Tên sách</label>
                                <input type="text" class="input-add" name="bookName" value="<?php echo $row['book_name'] ?>">
                            </div>

                            <div class="box-product-add">
                                <label class="content-title-add">Số trang</label>
                                <input type="text" class="input-add" name="bookThickness" value="<?php echo $row['book_thickness'] ?>">
                            </div>
                            <div class="box-product-add">
                                <label class="content-title-add">Tóm tắt</label>
                                <textarea class="input-add" name="bookTitle" cols="33" rows="4" value="<?php echo $row['book_title'] ?>"></textarea>
                            </div>
                            <div class="box-product-add">
                                <label class="content-title-add">Giá tiền</label>
                                <input type="text" class="input-add" name="bookRice" value="<?php echo $row['book_rice'] ?>">
                            </div>

                        </div>
                        <div class="col l-6">

                            <div class="box-add">
                                <label class="content-title-add">Giờ</label>
                                <input type="text" class="input-add" name="gio" value="<?php echo $row['gio'] ?>">
                            </div>
                            <div class="box-add">
                                <label class="content-title-add">Phút</label>
                                <input type="text" class="input-add" name="phut" value="<?php echo $row['phut'] ?>">
                            </div>

                            <div class="box-add">
                                <label class="content-title-add">Giây</label>
                                <input type="text" class="input-add" name="giay" value="<?php echo $row['giay'] ?>">
                            </div>
                            <div class="box-add">
                                <label class="content-title-add">Ngày</label>
                                <input type="text" class="input-add" name="ngay" value="<?php echo $row['ngay'] ?>">
                            </div>
                            <div class="box-add">
                                <label class="content-title-add">Năm</label>
                                <input type="text" class="input-add" name="nam" value="<?php echo $row['nam'] ?>">
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
                        </div>
                    </div>
                    <div class="box-product-add">
                        <button class="btn-add" type="submit" name="sua">Lưu lại</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>