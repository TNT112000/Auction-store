<div class="content">
    <div class="grid wide">
        <div class="content-category">
            <p class="content-title">Danh mục đấu giá</p>
            <div class="content-category-product">
                <div class="row">
                    <?php
                    $sql = "SELECT c.edit_category_img,l.category_name FROM edit_category c, list_category l
                                    WHERE c.category_id=l.category_id";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="col l-1-5">';
                            echo '<div href="" class="content-category-book">';
                            echo '<a href="" ><img src="image/product-img/' . $row['edit_category_img'] . '" alt="" class="category-book-img" ></a>';
                            echo '<a href="" class="category-book-name">' . $row['category_name'] . '</a>';
                            echo ' </div>';
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="content-product">
            <p class="content-title">Sản phẩm Tiêu biểu</p>
            <div class="content-product-product">
                <div class="row">
                    <?php
                    
                        $sql = "SELECT l.ngay,l.nam,l.gio,l.phut,l.giay,l.thang_id,l.rice_top,l.book_id,l.book_img,l.book_name,l.book_rice,m.thang_name,m.thang_id	FROM list_book l, moth m
                    WHERE l.thang_id=m.thang_id ";
                    $result = mysqli_query($conn, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo
                    '<div class="col l-3">
                        <div class="content-product-box">
                            <a href="product-details.php?id=' . $row['book_id'] . '" class="content-product-book">
                                <div><img src="image/product-img/' . $row['book_img'] . '" alt="" class="product-book-img"></div>
                                <div class="product-book-content">
                                    <p class="product-book-name">' . $row['book_name'] . '</p>
                                    <div class="product-book-list">
                                        <div class="product-book-item">
                                            <p class="product-book-text">Khởi Điểm </p>
                                            <p class="product-book-text">' . $row['book_rice'] . 'đ</p>
                                        </div>
                                        <div class="product-book-item">
                                            <p class="product-book-text">Cao nhất </p>
                                            <p class="product-book-text">' . $row['rice_top'] . 'đ</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="product-book-rice" id="auction-status-' . $row['book_id'] . '">Đang đấu giá</p>
                                <p class="product-book-rice-close" id="auction-status-close' . $row['book_id'] . '">Hết thời gian</p>
                                <p style="display: none" id="demo-' . $row['book_id'] . '"></p>
                            </a>
                        </div>
                    </div>
                    <script>

  var countDownDate' . $row['book_id'] . ' = new Date("'.$row['thang_name'].' '.$row['ngay'].', '.$row['nam'].' '.$row['gio'].':'.$row['phut'].':'.$row['giay'].'").getTime();
 
  
  var x' . $row['book_id'] . ' = setInterval(function() {
 
   
    var now' . $row['book_id'] . ' = new Date().getTime();
 
    
    var distance' . $row['book_id'] . ' = countDownDate' . $row['book_id'] . ' - now' . $row['book_id'] . ';
 
    
    var days' . $row['book_id'] . ' = Math.floor(distance' . $row['book_id'] . ' / (1000 * 60 * 60 * 24));
    var hours' . $row['book_id'] . ' = Math.floor((distance' . $row['book_id'] . ' % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes' . $row['book_id'] . ' = Math.floor((distance' . $row['book_id'] . ' % (1000 * 60 * 60)) / (1000 * 60));
    var seconds' . $row['book_id'] . ' = Math.floor((distance' . $row['book_id'] . ' % (1000 * 60)) / 1000);
 
   
    document.getElementById("demo-' . $row['book_id'] . '").innerHTML = days' . $row['book_id'] . ' + "Ngày " + hours' . $row['book_id'] . ' + "Giờ "
    + minutes' . $row['book_id'] . ' + "Phút " + seconds' . $row['book_id'] . ' + "Giây ";
 
  
    if (distance' . $row['book_id'] . ' < 0) {
      clearInterval(x' . $row['book_id'] . ');
      document.getElementById("demo-' . $row['book_id'] . '").innerHTML = "Thời gian đếm ngược đã kết thúc";
      document.getElementById("auction-status-' . $row['book_id'] . '").style.display="none";
      document.getElementById("auction-status-close' . $row['book_id'] . '").style.display="block";
    }
  }, 1000);
</script>
                    ';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>