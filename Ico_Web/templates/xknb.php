<?php
require_once "models/model.php";
$model = new Model();
$icon = mysqli_fetch_assoc($model->getDatawu());
if(!empty($icon)){
    $ten = $icon['ten'];
    $iconi = $icon['icon'];
} else {
    $ten = "8S Web";
    $iconi = "https://lh3.googleusercontent.com/pw/AP1GczPljgcKGy1Sje5wLcXY1XBfGbFED1GOUUY1EguHgnwWI3r2gbm09LcKxfMgQ0umNdDyPpigfZ6ZQoog6q5mkW8FHyaiUmjLlmbkJI8hLskJCA7LQil4Ez9qcMhJ2_EEdHb02tq2NkL0C0ptaMP6wo-SvQ=w240-h240-s-no-gm?authuser=1";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $ten ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="icon" href="<?php echo $iconi ?>" type="image/x-icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:slnt,wght@-10..0,100..900&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="lib/animate/animate.min.css" />
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/UTM-fonts.css">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/hoc.css?v=2">
    <style>
    @media (min-width: 992px) {
        .container-fluid .row {
            max-width: 1200px;
            /* Giới hạn chiều rộng tối đa của row */
            margin-left: auto;
            margin-right: auto;
        }
    }

    .card-img-top {
        width: 100%;
        /* Chiều rộng hình ảnh chiếm toàn bộ phần tử cha */
        height: 150px;
        /* Chiều cao cố định cho ảnh */
        object-fit: cover;
        /* Đảm bảo hình ảnh phủ kín không bị kéo dãn hoặc méo */
        overflow: hidden;
        /* Ngăn không cho hình ảnh tràn ra ngoài */
    }

    /* Cấu hình cho các thiết bị di động */
    @media (max-width: 767px) {
        .hidden-content {
            display: none;
        }

        .card-img-top {
            height: 120px;
            /* Giảm chiều cao cho hình ảnh trên điện thoại */
        }
    }

    /* Đảm bảo rằng card không bị tràn */
    .card {
        overflow: hidden;
        /* Ngăn không cho các phần tử con tràn ra ngoài */
    }
    </style>
    <script>
    function toggleContent(imgElement) {
        // Kiểm tra nếu là giao diện di động (màn hình nhỏ hơn 768px)
        if (window.innerWidth <= 768) {
            // Lấy tất cả các .card-body trong cùng một hàng (cùng .row)
            var allCards = imgElement.closest('.row').querySelectorAll('.card-body');
            
            allCards.forEach(function(cardBody) {
                var hiddenContent = cardBody.querySelector('.hidden-content');
                
                // Kiểm tra và chuyển đổi trạng thái hiển thị của nội dung
                if (hiddenContent.style.display === "none" || hiddenContent.style.display === "") {
                    hiddenContent.style.display = "flex";
                    hiddenContent.style.flexDirection = "column"; // Đảm bảo các phần tử hiển thị theo chiều dọc
                } else {
                    hiddenContent.style.display = "none"; // Ẩn nội dung nếu nó đang hiển thị
                }
            });
        }
    }

    // Khi thay đổi kích thước cửa sổ, khôi phục lại trạng thái hiển thị
    window.addEventListener('resize', function() {
        var allCards = document.querySelectorAll('.card-body');

        allCards.forEach(function(cardBody) {
            var hiddenContent = cardBody.querySelector('.hidden-content');
            if (window.innerWidth > 768) {
                // Trên màn hình lớn (máy tính), hiển thị nội dung theo chiều ngang và luôn hiển thị
                hiddenContent.style.display = "flex";
                hiddenContent.style.flexDirection = "column";
            } else {
                // Trên màn hình nhỏ (điện thoại), ẩn nội dung
                hiddenContent.style.display = "none";
            }
        });
    });

    // Đảm bảo khi tải trang, nội dung được ẩn trên điện thoại và hiển thị trên máy tính
    window.addEventListener('load', function() {
        var allCards = document.querySelectorAll('.card-body');

        allCards.forEach(function(cardBody) {
            var hiddenContent = cardBody.querySelector('.hidden-content');
            if (window.innerWidth > 768) {
                // Hiển thị nội dung theo chiều ngang trên máy tính
                hiddenContent.style.display = "flex";
                hiddenContent.style.flexDirection = "column";
            } else {
                // Ẩn nội dung khi trên điện thoại
                hiddenContent.style.display = "none";
            }
        });
    });
</script>

</head>



<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar End -->

    <!-- Navbar & Hero Start -->
    <?php

    require_once "control/header.php";

    ?>
    <!-- Navbar & Hero End -->

    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center bg-primary">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="keywords"
                            aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="btn bg-light border nput-group-text p-3"><i
                                class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->


    <!-- Header Start -->
    <!-- <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Our Team</h4>
                <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.php?task=pageHome">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active text-primary">Team</li>
                </ol>    
            </div>
        </div> -->
    <!-- Header End -->


    <!-- Team Start -->
    <div class="container-fluid team py-5">
        <!-- Hiển thị dữ liệu -->
        <div class="ong">
            <div class="tieude text-center mb-4">
                <h1>Việc làm xuất khẩu lao động mới nhất</h1>
            </div>
            <div class="row">
                <?php
                require_once 'models/model.php';
                $model = new Model();
                $result = $model->getDatasanpham();
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['hide'] != 'none') {
                        $tuybP = explode("|", $row['tuyb']);
                        $dam = !empty($tuybP[0]) && $tuybP[0] == 'true' ? "font-weight: bold;" : "";
                        $nghieng = !empty($tuybP[1]) && $tuybP[1] == 'true' ? "font-style: italic;" : "";
                        $gachc = !empty($tuybP[2]) && $tuybP[2] == 'true' ? "text-decoration: underline;" : "";
                        if ($tuybP[4] === 'clep') {
                            $cle = "text-align: justify;";
                        } elseif ($tuybP[4] === 'leftp') {
                            $cle = "text-align: left;";
                        } elseif ($tuybP[4] === 'rightp') {
                            $cle = "text-align: right;";
                        } elseif ($tuybP[4] === 'centerp') {
                            $cle = "text-align: center;";
                        } else {
                            $cle = "";
                        }
                        $fontsize = !empty($tuybP[5]) ? "font-size: " . $tuybP[5] . "px;" : "";
                        $color1 = !empty($tuybP[6]) ? "color: " . $tuybP[6] . ";" : "";
                        $fontf = !empty($tuybP[3]) ? "font-family: " . $tuybP[3] . ";" : "";
                        $tuybienP = $dam . $nghieng . $gachc . $cle . $fontsize . $fontf . $color1;
            ?>
                <div class="col-6 col-lg-3 mb-4">
                    <div class="card h-100 d-flex flex-column">
                        <div class="card-img-top" onclick="toggleContent(this)">
                            <img src="<?php echo $row['img']; ?>" alt="ảnh" class="img-fluid rounded-top">
                        </div>
                        <div class="card-body flex-grow-1 d-flex flex-column">
                            <!-- Nội dung bị ẩn mặc định cho điện thoại -->
                            <div class="hidden-content">
                                <p class="text-muted mb-2"><?php echo $row['ten_nuoc']; ?></p>
                                <div class="mb-3">
                                    <h6 style="<?php echo $tuybienP; ?>"><?php echo $row['mo_ta']; ?></h6>
                                </div>
                                <!-- Thay đổi để "Tư vấn" và "SĐT" không trên cùng một hàng ở điện thoại -->
                                <div
                                    class="mb-2 d-flex flex-column flex-sm-row justify-content-start align-items-start">
                                    <h6 class="mb-0 me-2">Người tư vấn:</h6>
                                    <p class="mb-0"><a href="#"><?php echo $row['Nguoi_tu_van']; ?></a></p>
                                </div>
                                <div
                                    class="mb-3 d-flex flex-column flex-sm-row justify-content-start align-items-start">
                                    <h6 class="mb-0 me-2">SĐT:</h6>
                                    <p class="mb-0"><?php echo $row['SDT']; ?></p>
                                </div>
                            </div>
                            <div class="mt-auto">
                                <?php 
                                $data = $model->getDatalink();
                                $linkRow = mysqli_fetch_assoc($data);
                            ?>
                                <a href="<?php echo $linkRow['link']; ?>">
                                    <button class="btn btn-primary w-100" style="background-color: green;">Tư vấn giúp
                                        tôi</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } } ?>
            </div>
        </div>
        <div class="clear"></div>
    </div>




    <!-- Footer Start -->
    <?php
    require_once "control/footer.php";
    ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>


    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>