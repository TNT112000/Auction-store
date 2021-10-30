<div class="search-cart">
    <div class="wide grid">
        <div class="search-cart-item">
            <div class="search">
                <form action="search-product.php" class="" method="POST" enctype="multipart/form-data">
                    <input type="text" class="search-input" name="search">
                    <button type="submit" class="search-btn" name="btn-search">
                        <i class="search-icon fas fa-search"></i>
                    </button>
                </form>
            </div>
            <?php
            if (isset($_SESSION['loginOK'])) {
                
                    echo '<a href="view-cart.php" class="cart">
                <img src="image/auction-img/img_79668.png" alt="" class="header-icon-img">
            </a>';
                
            } else {
                echo '<a href="sign-in.php" class="cart">
                <img src="image/auction-img/img_79668.png" alt="" class="header-icon-img">
            </a>';
            }
            ?>
        </div>
    </div>
</div>