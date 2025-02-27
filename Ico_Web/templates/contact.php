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
    <link href="css/style.css?v=3" rel="stylesheet">
    <style>
.contact-img-inner img {
    width: 100%;
    height: 100%;
    object-fit: cover; 
}

@media (max-width: 768px) {
    .contact-img-inner {
        width: 350px; 
        height: 350px;
    }
}

@media (max-width: 576px) {
    .contact-img-inner {
        width: 250px; 
        height: 250px;
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
                    <h5 class="modal-title" id="exampleModalLabel">Nhâp từ khóa tìm kiếm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center bg-primary">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="nhâp từ kháo tìm kiếm"
                            aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="btn bg-light border nput-group-text p-3"><i
                                class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->


    <!-- ảnh banner -->

    <!-- Header Start -->

    <!-- Header End -->
    <?php
    require_once 'models/model.php';
    $model = new Model();
    $getct = isset($_GET['task']) ? $_GET['task'] : "";
    $getdtbn = mysqli_fetch_assoc($model->getDatabanerten($getct))
        ?>
    <div class="lienhe" style="width: auto;">
        <img src="<?php echo $getdtbn['baner'] ?>" style="width: 100vw" alt="Image">
    </div>

    <!-- Contact Start -->
    <div class="container-fluid contact bg-light py-5">
        <div class="container py-5">

            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Liên hệ</h4>
                <h1 class="display-4 mb-4">Nếu bạn muốn được tư vấn hãy liên hệ với chúng tôi</h1>
            </div>
            <div class="row g-5">

                <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <?php
                    require_once 'models/model.php';
                    $model = new Model();
                    $result = $model->getdatalienhe();
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="contact-img d-flex justify-content-center">
                            <div class="contact-img-inner">
                                <img src="<?php echo $row['img']; ?>"  alt="ảnh" class="img-fluid rounded">
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.4s">
                    <div>
                        <h4 class="text-primary">Thông tin khách hàng</h4>
                        <p class="mb-4">Nếu không liên hệ được trực tiếp hãy cho chúng tôi thông tin liên lạc của
                            bạn</a>.</p>
                        <form action="" method="post" id="myForm">
                            <div class="row g-3">
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" name="name1" id="name"
                                            placeholder="Your Name" required>
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control border-0" name="emali1" id="email"
                                            placeholder="Your Email" required>
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control border-0" name="std1" id="phone"
                                            placeholder="Phone" required>
                                        <label for="phone">Your Phone</label>
                                        <div id="phoneError" class="text-danger mt-2" style="display: none;">Vui lòng
                                            chỉ nhập số hợp lệ.</div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" name="FB1" id="project"
                                            placeholder="Project" required>
                                        <label for="project">Your Facebook</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" name="diachi1" id="subject"
                                            placeholder="Subject" required>
                                        <label for="subject">Address</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary w-100 py-3" name="themttkh">Send
                                        Message</button>
                                </div>
                            </div>
                        </form>
                        <?php
                        require_once 'models/model.php';
                        $model = new Model();
                        if (isset($_POST['themttkh'])) {
                            // } else {
                            if ($model->luuttkh($_POST['name1'], $_POST['emali1'], $_POST['std1'], $_POST['FB1'], $_POST['diachi1'])) {
                                echo "<script>alert('Thêm dữ liệu thành công')</script>";
                            } else {
                                echo "<script>alert('Thêm không thành công')</script>";
                            }
                            // }
                        }
                        ?>
                    </div>
                </div>
                <?php
                require_once 'models/model.php';
                $model = new Model();
                $result = $model->getdatalienhe();
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="col-12">
                        <div>
                        <div class="row g-4">
                            <div class="col-6 col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                                <div class="contact-add-item">
                                    <div class="contact-icon text-primary mb-4">
                                        <i class="fas fa-map-marker-alt fa-2x"></i>
                                    </div>
                                    <div>
                                        <h4>Address</h4>
                                        <p class="mb-0"><?php echo $row['address']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.4s">
                                <div class="contact-add-item">
                                    <div class="contact-icon text-primary mb-4">
                                        <i class="fas fa-envelope fa-2x"></i>
                                    </div>
                                    <div>
                                        <h4>Mail</h4>
                                        <p class="mb-0"><?php echo $row['email']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.6s">
                                <div class="contact-add-item">
                                    <div class="contact-icon text-primary mb-4">
                                        <i class="fa fa-phone-alt fa-2x"></i>
                                    </div>
                                    <div>
                                        <h4>Telephone</h4>
                                        <p class="mb-0"><?php echo $row['telephone1']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.6s">
                                <div class="contact-add-item">
                                    <div class="contact-icon text-primary mb-4">
                                        <i class="fa fa-phone-alt fa-2x"></i>
                                    </div>
                                    <div>
                                        <h4>Telephone</h4>
                                        <p class="mb-0"><?php echo $row['telephone2']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-12 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="rounded">
                            <iframe class="rounded w-100" style="height: 400px;" src="<?php echo $row['map']; ?>"
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- Contact End -->

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

    <script>
    const phoneInput = document.getElementById('phone');
    const phoneError = document.getElementById('phoneError');

    phoneInput.addEventListener('input', function () {
        const phoneValue = phoneInput.value;
        const numberRegex = /^[0-9]*$/; 

        
        if (!numberRegex.test(phoneValue)) {
            phoneError.style.display = 'block'; 
            phoneInput.value = phoneValue.replace(/\D/g, ''); 
        } else if (phoneValue.length > 10) {
            phoneError.style.display = 'block'; 
            phoneInput.value = phoneValue.slice(0, 10); 
        } else {
            phoneError.style.display = 'none'; 
        }
    });

    document.querySelector('form').addEventListener('submit', function (event) {
        const phoneValue = phoneInput.value;

        
        if (phoneValue.trim() === '' || phoneValue.length !== 10 || !/^[0-9]{10}$/.test(phoneValue)) {
            phoneError.style.display = 'block';
            event.preventDefault(); 
        }
    });
</script>
<script>
    document.querySelector('form').addEventListener('submit', function (event) {
        const emailInput = document.getElementById('emailInput').value.trim();
        const errorMessage = document.getElementById('errorMessage');

        // Regular Expression for Email Validation
        const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        if (!emailRegex.test(emailInput)) {
            errorMessage.style.display = 'block'; // Hiển thị lỗi
            event.preventDefault(); // Ngăn form gửi đi
        } else {
            errorMessage.style.display = 'none'; // Ẩn thông báo lỗi nếu email hợp lệ
        }
    });
</script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>