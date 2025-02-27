<?php
require_once 'models/model.php';
$model = new Model();
$ico = $model->getDatawu();
$icon = mysqli_fetch_assoc($ico);
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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/UTM-fonts.css">
    <!-- Template Stylesheet -->
    <link href="css/style.css?v=9" rel="stylesheet">
    <link rel="stylesheet" href="css/new.css">
    <style>
    /* CSS mặc định cho tất cả các kích thước màn hình */
    .container-content {
        margin: 0;
        padding: 20px;
        /* Nếu cần padding mặc định cho desktop/tablet */
    }

    /* Media Query cho các màn hình nhỏ hơn 768px (thường là điện thoại) */
    @media (max-width: 768px) {

        /* Loại bỏ margin cho các phần tử */
        .nd,
        .tieude1 {
            margin: 0 !important;
            /* Đảm bảo loại bỏ margin cho cả tiêu đề và nội dung */
            padding: 0 !important;
            /* Nếu cần loại bỏ padding */
        }

        .imge {
            text-align: center;
        }

        /* Điều chỉnh lại một số kiểu khác nếu cần thiết */
        .container-content {
            padding: 10px !important;
            /* Có thể thay đổi nếu muốn giảm padding trên điện thoại */
        }
    }

    .container1 {
        padding-top: 0 !important;
        /* Xóa padding trên của container */
    }

    .row {
        margin-top: 0 !important;
        /* Xóa margin trên của row */
    }

    .col-sm-12,
    .col-xl-6,
    .col-12 {
        padding-top: 0 !important;
        /* Nếu có padding-top từ col, bỏ đi */
    }

    .about-item-content,
    .counter-item {
        margin-top: 0 !important;
        /* Xóa margin-top cho các phần tử bên trong */
    }

    .container-fluid.bg-light {
        margin-top: 0 !important;
        /* Loại bỏ margin-top */
    }

    .container {
        padding-top: 0 !important;
        /* Loại bỏ padding-top */
    }

    .row {
        margin-top: 0 !important;
        /* Loại bỏ margin-top của row */
    }

    .col-sm-12,
    .col-xl-6,
    .col-12 {
        padding-top: 0 !important;
        /* Loại bỏ padding-top của các cột */
    }

    .about-item-content,
    .counter-item {
        margin-top: 0 !important;
        /* Loại bỏ margin-top của các phần tử con */
    }
    .container.pb-5 {
        padding-bottom: 0 !important;
    }
    </style>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tìm kiếm từ khóa</h5>
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


    <!-- Carousel Start -->
    <?php
        require_once 'models/model.php';
        $model = new Model();
        $result = $model->getqltrangchu1();
        ?>
    <div class="swiper">
        <div class="swiper-wrapper">
            <?php while ($row = mysqli_fetch_assoc($result)) {
                $images = explode(',', $row['porter']);
                foreach ($images as $image) { 
                    ?>
            <div class="swiper-slide">
                <img style="width: 100%;" src="<?php echo trim($image); ?>" alt="Poster">
            </div>
            <?php } ?>

        </div>
        <div class="swiper-pagination"></div>
    </div>
    <!-- Carousel End -->

    <div class="container-fluid bg-light about pb-5" style="margin-top: 50px;">

        <div class="container pb-5">
            <div class="row g-5 col-sm-12 col-12 pt-4 container1">
                <div class="col-xl-6 gx-1 gx-lg-3 gx-sm-2 col-12 col-sm-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="about-item-content bg-white rounded p-5 h-100">
                        <!-- fs-td-sm -->
                        <h1 class="display-4 mb-4 "><?php echo $row['tieu_de']; ?></h1>
                        <p class="fs-4"><?php echo $row['mo_ta']; ?></p>
                    </div>
                </div>
                <div class="col-xl-6 gx-1 gx-lg-3 gx-sm-2 col-12 col-sm-6 wow fadeInRight" data-wow-delay="0.2s">
                    <div class="bg-white rounded p-5 h-100">
                        <div class="row g-4 justify-content-center">
                            <div class="col-12">
                                <div class="rounded bg-light">
                                    <img src="<?php echo $row['img2']; ?>" class="img-fluid rounded w-100" alt="">
                                </div>
                            </div>
                            <div class="col-sm-6 col-6">
                                <div class="counter-item bg-light rounded p-3 h-100">
                                    <div class="counter-counting">
                                        <span class="text-primary fs-2 fw-bold"
                                            data-toggle="counter-up"><?php echo $row['nampt']; ?></span>
                                        <span class="fs-2 fw-bold text-primary">+</span> <!-- Điều chỉnh cỡ chữ -->
                                    </div>
                                    <h5 class="mb-0 text-dark">Năm phát triển</h5>
                                </div>
                            </div>
                            <div class="col-sm-6 col-6">
                                <div class="counter-item bg-light rounded p-3 h-100">
                                    <div class="counter-counting">
                                        <span class="text-primary fs-2 fw-bold"
                                            data-toggle="counter-up"><?php echo $row['sochinhanh']; ?></span>
                                        <!-- Điều chỉnh cỡ chữ -->
                                        <span class="fs-2 fw-bold text-primary">+</span> <!-- Điều chỉnh cỡ chữ -->
                                    </div>
                                    <h5 class="mb-0 text-dark">Chi nhánh</h5>
                                </div>
                            </div>
                            <div class="col-sm-6 col-6">
                                <div class="counter-item bg-light rounded p-3 h-100">
                                    <div class="counter-counting">
                                        <span class="text-primary fs-2 fw-bold"
                                            data-toggle="counter-up"><?php echo $row['nhanvien']; ?></span>
                                        <span class="h1 fw-bold text-primary">+</span>
                                    </div>
                                    <h5 class="mb-0 text-dark">Cán bộ, nhân viên</h5>
                                </div>
                            </div>
                            <div class="col-sm-6 col-6">
                                <div class="counter-item bg-light rounded p-3 h-100">
                                    <div class="counter-counting">
                                        <span class="text-primary fs-2 fw-bold"
                                            data-toggle="counter-up"><?php echo $row['quocgiahiendien']; ?></span>
                                        <span class="h1 fw-bold text-primary">+</span>
                                    </div>
                                    <h5 class="mb-0 text-dark">Quốc gia hiện diện</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <!-- Feature Start -->

    <!-- Feature End -->

    <!-- About Start -->
    <!-- About End -->

    <!-- Service Start -->

    <!-- Service End -->

    <div class="container-fluid service">
        <?php
                $result = $model->getDatasapxeptrangchu();
                function convert_to_embed_url($url)
        {
            // youtube
            if (strpos($url, 'shorts/') !== false) {
                $video_id = explode('shorts/', $url)[1];
                $video_id = explode('?', $video_id)[0];
                return "https://www.youtube.com/embed/$video_id";
            }

            if (strpos($url, 'youtu.be/') !== false) {
                $video_id = explode('youtu.be/', $url)[1];
                return "https://www.youtube.com/embed/$video_id";
            }

            if (strpos($url, 'watch?v=') !== false) {
                $video_id = explode('watch?v=', $url)[1];
                $video_id = explode('&', $video_id)[0];
                return "https://www.youtube.com/embed/$video_id";
            }
            if (strpos($url, 'youtube.com/embed/') !== false) {
                return $url;
            }
            // tik tok
            if (strpos($url, 'tiktok.com/') !== false) {
                if (strpos($url, '/video/') !== false) {
                    $video_id = explode('/video/', $url)[1];
                    $video_id = explode('?', $video_id)[0];
                    return "https://www.tiktok.com/embed/$video_id";
                } elseif (strpos($url, '/embed/') !== false) {
                    return $url;
                } elseif (strpos($url, 'vt.tiktok.com/') !== false) {
                    // Resolve shortened TikTok URL
                    $headers = @get_headers($url, 1);
                    if ($headers && isset($headers['Location'])) {
                        $resolved_url = is_array($headers['Location']) ? end($headers['Location']) : $headers['Location'];
                        return convert_to_embed_url($resolved_url); // Recursively process resolved URL
                    }
                }
            }
            // Facebook video links
            if (strpos($url, 'facebook.com/') !== false || strpos($url, 'fb.watch/') !== false) {
                if (strpos($url, '/videos/') !== false) {
                    $video_id = explode('/videos/', $url)[1];
                    $video_id = explode('/', $video_id)[0];
                    return "https://www.facebook.com/plugins/video.php?href=" . urlencode($url);
                } elseif (strpos($url, 'fb.watch/') !== false) {
                    $video_id = explode('fb.watch/', $url)[1];
                    $video_id = explode('?', $video_id)[0];
                    return "https://www.facebook.com/plugins/video.php?href=" . urlencode($url);
                }
            }

            return $url;
        }
        while ($row = mysqli_fetch_assoc($result)) {
            if($row['hide']!="none"){
            $tuybP = explode("|", $row['font-styleP']);
        if (!empty($tuybP[0]) && $tuybP[0] === 'true') {
            $dam = "font-weight: bold;";
        } else
            $dam = "";
        if (!empty($tuybP[1]) && $tuybP[1] === 'true') {
            $nghieng = "font-style: italic;";
        } else
            $nghieng = "";
        if (!empty($tuybP[2]) && $tuybP[2] === 'true') {
            $gachc = "text-decoration: underline;";
        } else
            $gachc = "";

            if ($row['margini'] === 'lefti') {
                $clei = "text-align: left;";
            } elseif ($row['margini'] === 'righti') {
                $clei = "text-align: right;";
            } elseif ($row['margini'] === 'centeri') {
                $clei = "text-align: center;";
            } else
                $clei = "";

                $tuybtd = explode("|", $row['font-styletd']);
                if (isset($tuybtd[0]) && $tuybtd[0] === 'true') {
                    $damtd = "font-weight: bold;";
                } else
                    $damtd = "";
                if (isset($tuybtd[1]) && $tuybtd[1] === 'true') {
                    $nghiengtd = "font-style: italic;";
                } else
                    $nghiengtd = "";
                if (isset($tuybtd[2]) && $tuybtd[2] === 'true') {
                    $gachctd = "text-decoration: underline;";
                } else
                    $gachctd = "";

                // if($tuybP[3] === 'true'){
                //     $fonf = "justify-content: justify;";
                // }else $cle = "";
                if (isset($tuybtd[4]) && $tuybtd[4] === 'cletd') {
                    $cletd = "text-align: justify;";
                } elseif (isset($tuybtd[4]) && $tuybtd[4] === 'lefttd') {
                    $cletd = "text-align: left;";
                } elseif (isset($tuybtd[4]) && $tuybtd[4] === 'righttd') {
                    $cletd = "text-align: right;";
                } elseif (isset($tuybtd[4]) && $tuybtd[4] === 'centertd') {
                    $cletd = "text-align: center;";
                } else
                    $cletd = "";

    if ($tuybP[4] === 'clep') {
                        $cle = "text-align: justify;";
                    } elseif ($tuybP[4] === 'leftp') {
                        $cle = "text-align: left;";
                    } elseif ($tuybP[4] === 'rightp') {
                        $cle = "text-align: right;";
                    } elseif ($tuybP[4] === 'centerp') {
$cle = "text-align: center;";
                    } else
                        $cle = "";

                        if (!empty($tuybtd[5])) {
                            $fontsizetd = "font-size: " . $tuybtd[5] . "px;";
                        } else
                            $fontsizetd = "";
                        if (!empty($tuybtd[6]))
                            $color1td = "color: '" . $tuybtd[6] . "', ;";
                        else
                            $color1td = "";
                        if (!empty($tuybtd[3]))
                            $fontftd = "font-family: '" . $tuybtd[3] . "', cursive;";
                        else
                            $fontftd = "";
        
                        $tuybientd = $damtd . $nghiengtd . $gachctd . $cletd . $fontsizetd . $fontftd . $color1td;
                    
                if (!empty($tuybP[5])) {
                    $fontsize = "font-size: " . $tuybP[5] . "px;";
                } else
                    $fontsize = "";
                if (!empty($tuybP[6]))
                    $color1 = "color: " . $tuybP[6] . ";";
                else
                    $color1 = "";
                if (!empty($tuybP[3]))
                    $fontf = "font-family: '" . $tuybP[3] . "', sans-serif;";
                else
                    $fontf = "";
                if (!empty($row['hide']))
                    $hide = $row['hide'];
                else
                    $hide = "";

                $tuybienP = $dam . $nghieng . $gachc . $cle . $fontsize . $fontf . $color1;
                
        // if($tuybP[3] === 'true'){
        //     $fonf = "text-align: justify;";
        // }else $cle = "";
        ?>
        <div class="container">
            <div data-wow-delay="0.2s" style="margin: 0px; padding: 0px;">
                <?php
                    // Kiểm tra nếu tiêu đề không trống
                    if (!empty($row['tieu_de'])) {
                        $margin = isset($row['margintd']) ? $row['margintd'] : '0px'; 
                        $style = "margin: {$margin}; " . $tuybientd;
                    } else {
                        $style = "display: none;"; 
                    }
                    ?>
                <div>
                    <h1 class="tieude" style="<?php echo $style; ?>word-break: break-word;">
                        <?php echo !empty($row['tieu_de']) ? $row['tieu_de'] : ''; ?>
                    </h1>
                </div>
                <p class="nd" style="<?php echo "margin: {$row['marginP']};" . $tuybienP ?>word-break: break-word;">
                    <?php echo nl2br($row['noi_dung']); ?></p>
                <?php
                    // Kiểm tra nếu có ảnh
                    if (!empty($row['img'])) {
                        $imgSrc = $row['img'];
                        
                        $size = isset($row['sizei']) ? $row['sizei'] : 100; 
                    } else {
                        $imgSrc = null; 
                        $size = 0; 
                    }
                    ?>
                <div class="imge" style="<?php echo !empty($row['img']) ? $clei : ''; ?>">
                    <?php if ($imgSrc): ?>
                    <img src="<?php echo $imgSrc; ?>" style="width: <?php echo $size . "%"; ?>;">
                    <?php endif; ?>
                </div>
                <?php
                            if (!empty($row['video'])) {
                                $embed_video_url = convert_to_embed_url($row['video']);
                                echo "
                                <div style='
                                    display: flex; 
                                    justify-content: center; 
                                    align-items: center; 
                                    width: {$row['sizev']}%; 
                                    margin: 0 auto; 
                                    position: relative; 
                                    
                                    aspect-ratio: 16/9;
                                    overflow: hidden; 
                                '>
                                    <iframe 
                                        src='$embed_video_url' 
                                        style='
                                            width: 100%; 
                                            height: 100%; 
                                            border: none; 
                                        ' 
                                        frameborder='0' 
                                        allowfullscreen>
                                    </iframe>
                                </div>";
                            }
                            ?>
            </div>
        </div>
        <?php }
        }?>
    </div>

    <!-- Team Start -->

    <div class="container-fluid team pb-5">
        <div class="container pb-5">
            <?php 
     require_once 'models/model.php';          
     $model = new Model();
     $result = $model->getDataanthongtin();
     while ($row = mysqli_fetch_assoc($result)) { 
        if($row['ten'] === 'anthongtin1') {?>
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s"
                style="max-width: 800px; display: <?php echo $row['hide'];?>">
                <h2 class="text-primary">Công ty thành viên</h2>
                <p class="mb-0">Giới thiệu về các chi nhánh của công ty</p>
            </div>
            <div class="row g-4" style="display: <?php echo $row['hide']; ?>">
                <?php } } ?>
                <?php
                require_once 'models/model.php';
                
                $model = new Model();
                $result = $model->getqltrangchu3();
                while ($row = mysqli_fetch_assoc($result)) {
                    if($row['hide']!='none'){
                ?>
                <div class="col-md-6 col-lg-6 col-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="team-item" style="border-radius: 10px; border: 2px ">
                        <div class="team-img" style="width: 306px; height: 250px; border: 1px solid #ddd">
                            <img src="<?php echo $row['img']; ?>" class="img-fluid rounded-top w-100" alt="">
                            <div class="team-icon">
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2"
                                    href="<?php echo $row['linkFB']; ?>"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2"
                                    href="<?php echo $row['linkZalo']; ?>"><i class="fas fa-phone"></i></a>
                            </div>

                        </div>
                        <div class="team-title p-4" style="width: 306px; height: 200px;border: 1px solid #ddd">
                            <h4 class="mb-0 "><?php echo $row['ten']; ?></h4>
                            <p class="mb-0 fs-7">Chức vị : <?php echo $row['chucvu']; ?>
                            </p>
                            <p class="mb-0 fs-7">Chi nhánh phụ trách: <?php echo $row['chinhanh']; ?></p>
                            <p class="fs-7"> Email: <?php echo $row['mail']; ?></p>
                        </div>
                    </div>
                </div>
                <?php } 
                }?>
            </div>

            <?php 
     require_once 'models/model.php';          
     $model = new Model();
     $result = $model->getDataanthongtin();
     while ($row = mysqli_fetch_assoc($result)) { 
        if($row['ten'] === 'anthongtin2'){?>
            <div class="container-fluid testimonial pb-5" style="display: <?php echo $row['hide']; ?>">
                <?php } } ?>
                <div class="container pb-5">
                    <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s"
                        style="max-width: 800px;font-weight: 700;font-size: 20px;line-height: 50px;margin-top: 100px;visibility: visible;animation-delay: 0.2s;">

                        <h1 class="display-4 mb-4" style="color: #005B9E;">Chia sẻ của khách hàng</h1>
                        <p class="mb-0">Mỗi ý kiến của bạn là động lực để chúng tôi hoàn thiện hơn mỗi ngày.
                        </p>
                    </div>
                    <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.8s">

                        <?php
                require_once 'models/model.php';
                $model = new Model();
                $result = $model->getqlphanhoi();
                while ($row = mysqli_fetch_assoc($result)) {
                    if($row['hide']!='none'){
                ?>
                        <div class="testimonial-item bg-light rounded" style="width: 610px; height: 220px;">
                            <div class="row g-0">
                                <div class="col-4  col-lg-4 col-xl-3" style="width: 130px; height: 220px;">
                                    <div class="h-100">
                                        <img src="<?php echo $row['img']; ?>" class="img-fluid h-100 rounded"
                                            style="object-fit: cover; " alt="">
                                    </div>
                                </div>
                                <div class="col-8 col-lg-8 col-xl-9">
                                    <div class="d-flex flex-column my-auto text-start p-4">
                                        <h4 class="text-dark mb-0"><?php echo $row['tenkhachhang']; ?></h4>
                                        <p class="mb-3"><?php echo $row['nghenghiep']; ?></p>
                                        <div class="d-flex text-primary mb-3" style="font-size: 26px;">
                                            <?php
                                    $danhgia = $row['danhgia']; 
                                    for ($i = 0; $i < $danhgia; $i++) {
                                        echo "<span class='star'>&#9733;</span>"; 
                                    }
                                    for ($i = $danhgia; $i < 5; $i++) {
                                        echo "<span class='star'>&#9734;</span>";
                                    }
                                    ?>
                                        </div>
                                        <p class="mb-0"><?php echo $row['noidung']; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } 
                        }?>

                    </div>

                </div>
            </div>
            <!-- <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="img/team-4.jpg" class="img-fluid rounded-top w-100" alt="">
                            <div class="team-icon">
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i
                                        class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-0" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="team-title p-4">
                            <h4 class="mb-0">David James</h4>
                            <p class="mb-0">Profession</p>
                        </div>
                    </div>
                </div> -->
        </div>
    </div>
    </div>
    <!-- Team End -->


    <?php 
    require_once "control/footer.php";
    ?>

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
    <script>
    const swiper = new Swiper('.swiper', {
        loop: true,
        autoplay: {
            delay: 3000,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
    </script>
</body>

</html>