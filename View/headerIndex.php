<!-- sidebar menu -->
<div class="side-bar">
    <header>
        <div class="close-btn">
            <i class="fas fa-times"></i>
        </div>
        <img src="./image/logo.png" class="img-sidebar" alt="">
    </header>
    <div class="menu">

        <div class="item">
            <a class="sub-btn"><i class="fas fa-table"></i>Thể loại sách<i class="fas fa-angle-right dropdown"></i></a>
            <?php
                 include_once("View/vTypeProduct.php");
           ?>
        </div>


        <div class="item"><a href="#"><i class="fas fa-info-circle"></i>About</a></div>
    </div>
</div>
<!--end sidebar menu -->
<!-- Top-header -->
<div class="top-header">
    <img src="./image/top-header.jpg" alt="" style="width: 100%; height:auto">
</div>


<!-- header -->
<div class="header container-fluid">
    <div class="container py-3">
        <div class="row align-items-center">
            <div class="col-lg-1 col-md-1 re-767 text-header">
                <a href="index.php" style="">
                    <img style="width:70%; min-width: 50px;" class="rounded-circle" src="./image/logo.png" alt="logo">
                </a>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-2 col-2 ">
                <a href="#" class=""><i class="fas fa-bars menu-btn" style="font-size:32px"></i></a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                <form class="d-flex sua-tim-kiem">
                    <input class="form-control rounded-pill" type="search" style="width:100%" name="search"
                        placeholder="Search" aria-label="Search" style="width:500px">
                    <button class="btn btn-outline-success rounded-pill sua-tim" name="btnSearch" type="submit"><i
                            class="fas fa-search" class="icon-search"></i></button>
                </form>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                <div class="container-fluid px-0">
                    <div class="row flex-column">
                        <a href="./Cart.php" class="text-center">
                            <i class="fas fa-cart-plus" style="font-size:24px"></i>
                        </a>
                        <a href="./Cart.php" class="text-center text-header"
                            style="line-height: 19px; white-space: nowrap;">Giỏ hàng</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                <div class="container-fluid px-0">
                    <div class="row flex-column">
                        <a href="" class="text-center">
                            <i class="fas fa-bell" style="font-size:24px"></i>
                        </a>
                        <a href="#" class="text-center text-header"
                            style="line-height: 19px; white-space: nowrap;">Thông báo</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                <div class="container-fluid px-0">
                    <div class="row flex-column">
                        <a href="" class="text-center">
                            <i class="fas fa-user text-center" style="font-size:24px"></i>
                        </a>
                        <a href="login.php" class="text-center text-header"
                            style="line-height: 19px; white-space: nowrap;">Đăng
                            nhập</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--end header -->



















<!-- js sidebar -->
<script type="text/javascript">
$(document).ready(function() {
    //jquery for toggle sub menus
    $('.sub-btn').click(function() {
        $(this).next('.sub-menu').slideToggle();
        $(this).find('.dropdown').toggleClass('rotate');
    });

    //jquery for expand and collapse the sidebar
    $('.menu-btn').click(function() {
        $('.side-bar').addClass('active');
        $('.menu-btn').css("visibility", "hidden");
    });

    $('.close-btn').click(function() {
        $('.side-bar').removeClass('active');
        $('.menu-btn').css("visibility", "visible");
    });
});
</script>