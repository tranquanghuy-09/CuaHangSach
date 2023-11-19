<?php
    session_start();
    include('Controller/cModule.php');
    $p = new controlModule();
    if ($_SESSION['login']){
        $tbl = $p -> getUser($_SESSION['id']);
        if ($tbl) {
            if(mysql_num_rows($tbl) > 0){
                while($row = mysql_fetch_assoc($tbl)){
                  $usName = $row['HoTen'];  
                }
            }
        }
    } else {
        print_r('Chưa được');
    }
?>

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
                <a href="indexKh.php" style="">
                    <img style="width:70%; min-width: 50px;" class="rounded-circle" src="./image/logo.png" alt="logo">
                </a>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-2 col-2 ">
                <a href="#" class=""><i class="fas fa-bars menu-btn" style="font-size:32px"></i></a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                <form class="d-flex sua-tim-kiem">
                    <input class="form-control rounded-pill" type="search" style="width:100%" placeholder="Search"
                        aria-label="Search" style="width:500px">
                    <button class="btn btn-outline-success rounded-pill sua-tim" type="submit"><i class="fas fa-search"
                            class="icon-search"></i></button>
                </form>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                <div class="container-fluid px-0">
                    <div class="row flex-column">
                        <a href="" class="text-center">
                            <i class="fas fa-cart-plus" style="font-size:24px"></i>
                        </a>
                        <a href="./Cart.php" class="text-center text-header"
                            style="line-height: 19px; white-space: nowrap;">Giỏ
                            hàng</a>
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
                        <a href="vTkKh.php?kh=<?php echo $_SESSION['id'];?>" class="text-center text-header"
                            style="line-height: 19px; white-space: nowrap;">
                            <?php echo $usName;?>
                        </a>
                        <a href="indexKh.php?dx" class="text-center text-header"
                            style="line-height: 19px; white-space: nowrap; text-decoration: underline">
                            Đăng xuất
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--end header -->

<!-- Slide-Banner -->
<!-- <div class="container">
    <div class="row align-items-center">
        <div class="col-8">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./image/slide1.jpg" class="d-block w-100 rounded-2" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="./image/slide2.jpg" class="d-block w-100 rounded-2" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                          
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="./image/slide4.jpg" class="d-block w-100 rounded-2" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>
        <div class="col-4">
            <img class="mb-1 rounded-3" src="./image/banner2.jpg" alt="" style="width:100%; height:auto;">
            <img class="rounded-3" src="./image/banner2.jpg" alt="" style="width:100%; height:auto;">

        </div>
    </div>
</div> -->
















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