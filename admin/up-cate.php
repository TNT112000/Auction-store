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

$sql = "SELECT c.category_id,c.edit_category_img,c.edit_category_id,l.category_name FROM edit_category c, list_category l
                                    WHERE c.category_id=l.category_id and c.edit_category_id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST["sua"])) {
    $edit_category_img = $_FILES['image']['name'];
    $category_id = $_POST['category'];

    if($_FILES['image']['name']==''){
        $edit_category_img=$row['edit_category_img'];
    }
    else{
        $edit_category_img = $_FILES['image']['name'];
    }

    if($_POST['category']==''){
        $category_id = $row['category_id'];
    }
    else{
        $category_id = $_POST['category'];
    }

    if ($edit_category_img != '' && $category_id != '') {
        $sql = "UPDATE edit_category SET edit_category_img='$edit_category_img' , category_id='$category_id' 
        WHERE edit_category_id=$id ";

        $result = mysqli_query($conn, $sql);
        if ($result > 0) {
            header("location:cate-index.php");
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
                <p class="title-add">Chỉnh sửa danh mục</p>
                <form class="form" action="" method="post" enctype="multipart/form-data">
                    <div class="box-add">
                        <label class="content-title-add">Chọn hình ảnh</label>
                        <input type="file" class="input-add" name="image" value="<?php echo $row['edit_category_img']; ?>">
                    </div>
                    <div class="box-add">
                        <label class="content-title-add">Tên danh mục </label>
                        <input type="text" list="datalist"  name="category" class="input-add" autocomplete="off">
                        <datalist id="datalist" class="select-add" >
                            <?php
                            $sql = "SELECT * FROM list_category";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result)) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option  value="' . $row['category_id'] . '"> ' . $row['category_name'] . '</option>';
                                }
                            }
                            ?>
                        </datalist>
                    </div>
                    <div class="box-add">
                        <button class="btn-add" type="submit" name="sua">Lưu lại</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>