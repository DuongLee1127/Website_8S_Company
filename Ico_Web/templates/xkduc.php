<?php
require_once "models/model.php";
$model = new Model();
$icon = mysqli_fetch_assoc($model->getDatawu());
if (!empty($icon)) {
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
    <style>
    @media (max-width: 768px) {

        .nd,
        .tieude {
            margin: 0 !important;
        }

        .imge {
            text-align: center;
        }

        .container-content {
            padding: 0 !important;
        }
    }

    @media (max-width: 768px) {

        .nd,
        .tieude {
            margin: 0 !important;
        }

        .imge {
            text-align: center;
        }

        .container-content {
            padding: 0 !important;
        }
    }

    @media (max-width: 768px) {

        .nd,
        .tieude {
            margin: 0 !important;
        }

        .imge {
            text-align: center;
        }

        .container-content {
            padding: 0 !important;
        }
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

    <!-- Topbar Start -->


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
    <?php
    require_once 'models/model.php';
    $model = new Model();
    $getct = isset($_GET['task']) ? $_GET['task'] : "";
    $getdtbn = mysqli_fetch_assoc($model->getDatabanerten($getct))
        ?>
    <div class="anhduc" style="width: auto;">
        <img src="<?php echo $getdtbn['baner'] ?>" style="width: 100vw;object-fit: cover;">
    </div>
    <!-- Header End -->


    <!-- Feature Start -->
    <div class="container1">
        <?php
        require_once 'models/model.php';
        $model = new Model();
        $result = $model->getDatasapxep();
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
            if ($row['pl'] == 'xkldnhat' && $row['hide'] != 'none') {
                $tuybP = explode("|", $row['font-styleP']);
                if ($tuybP[0] === 'true') {
                    $dam = "font-weight: bold;";
                } else
                    $dam = "";
                if ($tuybP[1] === 'true') {
                    $nghieng = "font-style: italic;";
                } else
                    $nghieng = "";
                if ($tuybP[2] === 'true') {
                    $gachc = "text-decoration: underline;";
                } else
                    $gachc = "";
                // if($tuybP[3] === 'true'){
                //     $fonf = "text-align: justify;";
                // }else $cle = "";
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

                if ($row['margini'] === 'lefti') {
                    $clei = "text-align: left;";
                } elseif ($row['margini'] === 'righti') {
                    $clei = "text-align: right;";
                } elseif ($row['margini'] === 'centeri') {
                    $clei = "text-align: center;";
                } else
                    $clei = "";

                if (!empty($tuybP[5]) || !empty($tuybP[3])) {
                    $fontsize = "font-size: " . $tuybP[5] . "px;";
                } else
                    $fontsize = "";
                if (!empty($tuybP[6]))
                    $color1 = "color: " . $tuybP[6] . ";";
                else
                    $color1 = "";
                if (!empty($tuybP[3]))
                    $fontf = "font-family: " . $tuybP[3] . ";";
                else
                    $fontf = "";

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

                if (!empty($tuybtd[5])) {
                    $fontsizetd = "font-size: " . $tuybtd[5] . "px;";
                } else
                    $fontsizetd = "";
                if (!empty($tuybtd[6]))
                    $color1td = "color: " . $tuybtd[6] . ";";
                else
                    $color1td = "";
                if (!empty($tuybtd[3]))
                    $fontftd = "font-family: " . $tuybtd[3] . ";";
                else
                    $fontftd = "";

                $tuybientd = $damtd . $nghiengtd . $gachctd . $cletd . $fontsizetd . $fontftd . $color1td;


                $tuybienP = $dam . $nghieng . $gachc . $cle . $fontsize . $fontf . $color1;
                ?>
        <div class="container-content">
            <div class="vnttitle vline">
                <h1 class="tieude"
                    style="<?php echo "margin: {$row['margintd']};" . $tuybientd ?>word-break: break-word;">
                    <?php echo $row['tieu_de']; ?></h1>
            </div>
            <p class="nd" style="<?php echo "margin: {$row['marginP']};" . $tuybienP ?>">
                <?php echo nl2br($row['noi_dung']); ?>
            </p>
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
        <?php }
        } ?>

    </div>
    <!-- Feature End -->


    <!-- Footer Start -->
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
</body>

</html>