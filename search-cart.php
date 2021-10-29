
<div class="search-cart">
    <div class="wide grid">
        <div class="search-cart-item">
            <div class="search">
                <form action="" class="" method="POST" >
                <input type="text" class="search-input" name="search">
                <button type="submit"  class="search-btn">
                    <i class="search-icon fas fa-search"></i>
                </button>
                </form>
            </div>
            <?php
            if(isset($_SESSION['loginOK'])){
                echo'<a href="view-cart.php" class="cart">
                <img src="image/auction-img/img_79668.png" alt="" class="header-icon-img">
            </a>';}
            else {
                echo'<a href="sign-in.php" class="cart">
                <img src="image/auction-img/img_79668.png" alt="" class="header-icon-img">
            </a>';
            }
            ?>
        </div>
    </div>
</div>