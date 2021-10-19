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

$sql = "SELECT l.book_id,l.book_img,l.book_name,l.category_id,l.book_thickness,l.book_rice,c.category_name	FROM list_book l, list_category c
                WHERE l.category_id=c.category_id and l.book_id=$id ";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result) ;

if (isset($_POST["sua"])) {
    $book_img = $_FILES['bookImg']['name'];
    $book_name = $_POST['bookName'];
    $category_id = $_POST['category'];
    $book_thickness = $_POST['bookThickness'];
    $book_rice = $_POST['bookRice'];

    if($_FILES['bookImg']['name']==''){
        $book_img=$row['book_img'];
    }
    else{
        $book_img = $_FILES['bookImg']['name'];
    }

    if($_POST['category']==''){
        $category_id = $row['category_id'];
    }
    else{
        $category_id = $_POST['category'];
    }

    if ($book_img != '' && $book_name != '' && $category_id != '' && $book_thickness != '' && $book_rice != '') {
        $sql = "UPDATE list_book SET book_img='$book_img' , book_name='$book_name',category_id='$category_id',book_thickness='$book_thickness',book_rice='$book_rice'  
        WHERE book_id=$id ";

        $result = mysqli_query($conn, $sql);
        if ($result > 0) {
            header("location: product-index.php");
        } else {
            echo "Lỗi!";
        }
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
        ?>
        <div class="content-add">
            <div class="grid wide">
                <p class="title-add">Chỉnh sửa sản phẩm</p>
                <form class="form" action="" method="post" enctype="multipart/form-data">
                    <div class="box-product-add">
                        <label class="content-title-add">Chọn hình ảnh</label>
                        <input type="file" class="input-add" name="bookImg" value="<?php echo $row['book_img'] ?>">
                    </div>
                    <div class="box-product-add">
                        <label class="content-title-add">Tên sách</label>
                        <input type="text" class="input-add" name="bookName" value="<?php echo $row['book_name'] ?>">
                    </div>
                    <div class="box-product-add">
                        <label class="content-title-add">Tên danh mục </label>
                        <input list="datalist" type="text" class="input-add" name="category" autocomplete="off">
                        <datalist class="select-add" id="datalist">
                            <?php
                            $sql = "SELECT * FROM list_category";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result)) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option  value="' . $row['category_id'] . '">'. $row['category_name'].'</option>';
                                }
                            }
                            ?>
                        </datalist>
                    </div>
                    <div class="box-product-add">
                        <label class="content-title-add">Số trang</label>
                        <input type="text" class="input-add" name="bookThickness" value="<?php echo $row['book_thickness'] ?>">
                    </div>
                    <div class="box-product-add">
                        <label class="content-title-add">Gía tiền</label>
                        <input type="text" class="input-add" name="bookRice" value="<?php echo $row['book_rice'] ?>">
                    </div>
                    <?php
                    var_dump($row['book_rice']);
                    ?>
                    <div class="box-product-add">
                        <button class="btn-add" type="submit" name="sua">Lưu lại</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>