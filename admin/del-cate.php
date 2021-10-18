
<?php
include '../config.php';
if(isset($_GET['id'])){
   $id=$_GET['id'];
}
$sql="DELETE FROM edit_category WHERE edit_category_id=$id";
$query = mysqli_query($conn,$sql);
header("location: cate-index.php");
?>