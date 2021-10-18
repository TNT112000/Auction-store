<?php
session_start(); //Dịch vụ bảo vệ
if (!isset($_SESSION['loginOK'])) {
    header("Location:../index.php");
}
?>

<?php
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

if (isset($_POST["sua"])) {
    $book_img = $_FILES['bookImg']['name'];
    $book_name = $_POST['bookName'];
    $category_id = $_POST['category'];
    $book_thickness = $_POST['bookThickness'];
    $book_rice = $_POST['bookRice'];

    if ($book_img != '' && $book_name != '' && $category_id != '' && $book_thickness != '' && $book_rice != '') {
        $sql = "UPDATE list_book SET book_img='$book_img' , book_name='$book_name',category_id='$category_id',book_thickness='$book_thickness',book_rice='$book_rice'  
        WHERE book_id=$id ";

        echo $sql;
        $result = mysqli_query($conn, $sql);
        if ($result > 0) {
            header("location: product-index.php");
        } else {
            echo "Lỗi!";
        }
    }

    mysqli_close($conn);
}
$sql = "SELECT * FROM list_book WHERE book_id=$id ";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
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
        <div class="content-add">
            <div class="grid wide">
                <p class="title-add">Chỉnh sửa sản phẩm</p>
                <form class="form" action="add-product-process.php" method="post" enctype="multipart/form-data">
                    <div class="box-product-add">
                        <label class="content-title-add">Chọn hình ảnh</label>
                        <input type="file" class="input-add" name="bookImg" value="<?php echo $row['book_img']; ?>">
                    </div>
                    <div class="box-product-add">
                        <label class="content-title-add">Tên sách</label>
                        <input type="text" class="input-add" name="bookName" value="<?php echo $row['book_name']; ?>">
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
                        <input type="text" class="input-add" name="bookThickness" value="<?php echo $row['book_thickness']; ?>">
                    </div>
                    <div class="box-product-add">
                        <label class="content-title-add">Gía tiền</label>
                        <input type="text" class="input-add" name="bookRice" value="<?php echo $row['book_rice']; ?>">
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