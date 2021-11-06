<?php
session_start();

include 'config.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <script src="JS/main.js"></script>
    <div class="main">
        <?php
        include 'header.php';
        include 'search-cart.php';
        ?>
        <?php
        include 'slider.php';
        ?>
        <div class="add-category-bg" style="margin-top:0; padding-top:105px; padding-bottom:105px">
            <div class="wide grid">
                <a href="add-cate.php" class="add-category">Về Chúng Tôi</a>
                <div class="content-category-product" style="padding-top:50px">
                    <div class="row">
                        <div class="col l-12">
                            <div class="" style="background-color:white">
                                <p class="gioithieu">Hình thức mua bán trực tuyến qua mạng có lẽ không có gì là mới mẻ đối với chúng ta. Mỗi ngày có hàng trăm website về rao vặt đấu giá được sinh ra nhưng xem ra thị trường thương mại điện tử vẫn còn đang mở rộng đối với nhiều doanh nghiệp muốn đầu tư.

                                    Nếu doanh nghiệp muốn tạo ra một website về rao vặt đấu giá sảm phẩm thương mại diện tử thì trước hết cần phải biết được chức năng cơ bản của một website rao vặt đấu giá sản phẩm bao gồm những thứ gì.

                                    01 TRANG CHỦ

                                    - Giao diễn được thiết kế theo ý muốn của doanh nghiệp

                                    - Màu sắc, logo, về công ty phù hợp với yêu cầu của khách hàng

                                    - Nội dung hiện thị trang chủ bao gồm hình ảnh, chi tiết sản phẩm được quan

                                    tâm nhất

                                    - Banner ngoài trang chủ được thiết kế theo yêu cầu khách hàng

                                    02 GIỚI THIỆU

                                    Nội dung giới thiệu là thông tin về trang web rao vặt đấu giá này

                                    + Giới thiệu chung về công ty rao vặt đấu giá

                                    + Giới thiệu về nhân sự thành viên chủ chốt của công ty

                                    + Giới thiệu chung về công ty rao vặt đấu giá

                                    03 SẢN PHẨM ĐẤU

                                    Giới thiệu những sản phẩm đang được rao vặt đấu giá trên website, được sắp xếp theo các mục chi tiết.

                                    - Nhóm sản phẩm được quan tâm nhất

                                    - Nhóm sản phẩm đã được đấu giá thành công

                                    - Nhóm sản phẩm vừa mới được đấu giá

                                    Nội dung hiển thị dưới dạng bài viết và hình ảnh mức giá đang được đấu thầu

                                    04 ĐĂNG TIN SẢN PHẨM

                                    Cho phép khách hàng có thể đăng tin sản phẩm đấu giá trên website đấu giá rao vặt

                                    + Khách hàng cần phải đăng nhập để có thể đăng được tin

                                    + Thông tin đăng sản phẩm đấu giá phải theo một chuẩn đã được quy định sẵn trước đó

                                    + Thông tin đăng đấu giá phải phù hợp với nội dung đăng tin đã được quản trị viên website đưa ra. Chính vì thế tin cần phải được Quản trị viên duyệt qua

                                    05 THÔNG TIN VIP

                                    - Đây là thông tin được xuất hiện tại vị trí nổi nhất của website rao vặt đấu giá

                                    - Tin này được Quản trị viên chỉ định, có thể quyết định thời gian hiển thị của tin VIP trên website

                                    - Tin VIP lả tin được mua bởi khách hàng

                                    06 ĐẶT MUA SẢN PHẨM

                                    - Khách hàng phải đăng nhập mới có quyền đặt mua sản phẩm

                                    - Cho phép đặng mua sẩn phẩm rao vặt, đấu giá trên trang thương mại điện tử

                                    - Khách hàng theo dỏi được tình trang đơn hàng, quản lý đơn hàng, và có thể hủy đơn hàng đã đặt mua

                                    - Gửi thông tin mà khách hàng đã chọn tới Quản trị viên của diễn đàn

                                    - Khi khách hàng đã chọn được mặt hàng muốn mua thì sẽ hiển thị tổng số tiền lên để khách hàng cần phải thanh toán.

                                    07 THÀNH VIÊN

                                    - Cho phép khách có thể đăng ký tài khoản

                                    - Người dùng có thể đăng tin rao bán đấu giá sản phẩm hoặc chọn mua san phẩm đang được rao vặt đấu giá.

                                    - Thông tin chi tiết tài khoản của thành viên. Lịch sử giao dịch

                                    08 DỊCH VỤ

                                    Dịch vụ mà công ty rao vặt đấu giá sản phẩm đang cung cấp

                                    - Quảng cáo banner

                                    - Đăng tin đấu giá sản phẩm của một công ty khách

                                    - Dịch vụ quảng cáo trong website ....

                                    Mục dịch vụ được hiển thị dưới dạng bài viết, hình ảnh chi tiết.

                                    09 TIN TỨC

                                    Hiển thị các tin được đăng của công ty

                                    - Tin tức về rao vặt, đấu giá sản phẩm

                                    - Tin tức về dịch vụ khuyến mãi sản phẩm

                                    Bài viết có thể được chỉnh sửa trong mục quản trị của trang web

                                    10 TƯ VẤN HỎI ĐÁP

                                    - Người dùng có thể đặt câu hỏi về đấu giá rao vặt

                                    - Danh sách câu hỏi được hiện thị dưới dạng danh mục

                                    - Câu hỏi được gửi cho quản trị viên của website

                                    11 LIÊN HỆ

                                    - Thông tin liên hệ của công ty

                                    - Mục tuyển dụng nhân sự của công ty

                                    12 TIỆN ÍCH MỞ RỘNG

                                    - Đặt quảng cáo banner khách hàng

                                    - Module hỗ trợ trực tuyến khách hàng

                                    - Thống kê truy cập website

                                    - Ngôn ngữ hiển thị trên website

                                    Trên đây là những chức năng cần thiết nhất để có được một website rao vặt đấu giá sản phẩm thương mại điện tử. Nếu khách hàng có nhu cầu gì thêm có thể gọi điện cho chúng tôi để được tư vẫn miễn phí.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include 'footer.php';
        ?>
    </div>

</body>

</html>