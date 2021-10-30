<div class="header">
    <div class="navbar">
        <div class="wide grid">
            <div class="navbar-item">
                <a href="#" class="logo">Auction <span class="logo-item">STORE<span></a>
                <div class="navbar-menu">
                    <ul class="navbar-menu-list">
                        <li class="navbar-menu-item">
                            <a href="index.php" class="navbar-menu-link">Trang chủ</a>
                        </li>
                        <li class="navbar-menu-item">
                            <a href="gioithieu.php" class="navbar-menu-link">Giới thiệu</a>
                        </li>
                        <?php
                        //Dịch vụ bảo vệ
                        if (isset($_SESSION['loginOK'])) {

                            echo ' <div class="header-user">
                            <li class=" click-user_list">
                            <a href="" class="navbar-menu-link "><i class="fas fa-user"></i>  ' . $_SESSION['loginOK'] . '</a>
                            </li>
                            <div class="user_list">';


                            echo '
                            <li class="navbar-menu-item user_list-item">
                                    <a href="user-sell.php" class="navbar-menu-link navbar-menu-link-item">Bán Hàng</a>
                               </li>
                            <li class="navbar-menu-item user_list-item">
                                    <a href="logout.php" class="navbar-menu-link navbar-menu-link-item">Đăng xuất</a>
                               </li>';

                            $sql = "SELECT user_id FROM users ";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result);
                                echo '<li class="navbar-menu-item user_list-item">
                                    <a href="../up-pass.php?id=' . $row['user_id'] . '" class="navbar-menu-link navbar-menu-link-item">Đổi mật khẩu</a>
                                </li>';
                            }
                            echo '</div>
                            </div>';
                        } else {
                            echo '<li class="navbar-menu-item">
                            <a href="sign-up.php" class="navbar-menu-link">Đăng ký</a>
                        </li>
                        <li class="navbar-menu-item">
                            <a href="sign-in.php" class="navbar-menu-link">Đăng nhập</a>
                        </li>';
                        }
                        ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>