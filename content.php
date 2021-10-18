<div class="content">
    <div class="grid wide">
        <div class="content-category">
            <p class="content-title">Danh mục yêu thích</p>
            <div class="content-category-product">
                <div class="row">
                    <?php
                    include 'config.php';
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
            <p class="content-title">Sản phẩm</p>
            <div class="content-product-product">
                <div class="row">
                    <?php
                    $sql = "SELECT l.book_id,l.book_img,l.book_name,l.category_id,l.book_thickness,l.book_title,l.book_rice,c.category_name	FROM list_book l, list_category c
                    WHERE l.category_id=c.category_id";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="col l-3">
                        <div class="content-product-box">

                            <a href="" class="content-product-book">
                                <div><img src="image/product-img/'.$row['book_img'].'" alt="" class="product-book-img"></div>
                                <div class="product-book-content">
                                    <p class="product-book-name">'.$row['book_name'].'</p>
                                    <div class="product-book-list">
                                        <div class="product-book-item">
                                            <p class="product-book-text">Thể loại </p>
                                            <p class="product-book-text">'.$row['category_name'].'</p>
                                        </div>
                                        <div class="product-book-item">
                                            <p class="product-book-text">Độ dày </p>
                                            <p class="product-book-text">'.$row['book_thickness'].' trang</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="product-book-rice">Gía bán : '.$row['book_rice'].' Đ</p>
                            </a>

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