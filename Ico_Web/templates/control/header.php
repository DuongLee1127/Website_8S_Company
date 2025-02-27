<?php 
require_once 'models/model.php';
$model = new Model();$icon = mysqli_fetch_assoc($model->getDatawui());
if (!empty($icon)) {
    $ten = $icon['ten'];
    $iconi = $icon['icon'];
} else {
    $ten = "";
    $iconi = "";
}
?>
<div class="container-fluid nav-bar px-0 px-lg-4 py-lg-0">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a href="index.php?task=pageHome" class="navbar-brand p-0">
                    <img src="<?php echo $iconi; ?>" alt="8S icon"></h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-0 mx-lg-auto">
                        <a href="index.php?task=pageHome" class="nav-item nav-link active">Trang chủ</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-bs-toggle="dropdown">
                                <span class="dropdown-toggle">Du học</span>
                            </a>
                            <div class="dropdown-menu">
                                <a href="index.php?task=dhhq" class="dropdown-item">Du học Hàn Quốc</a>
                                <a href="index.php?task=dhnb" class="dropdown-item">Du học Nhật Bản</a>
                                <a href="index.php?task=dhduc" class="dropdown-item">Du học Đức </a>
                                <a href="index.php?task=dhuc" class="dropdown-item">Du học Úc</a>
                                <a href="index.php?task=dhdl" class="dropdown-item">Du học Đài Loan</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-bs-toggle="dropdown">
                                <span class="dropdown-toggle">Xuất khẩu lao động</span>
                            </a>
                            <div class="dropdown-menu">
                                <a href="index.php?task=xkldnhat" class="dropdown-item">Giới thiệu</a>
                                <a href="index.php?task=xksp" class="dropdown-item">Sản phẩm</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-bs-toggle="dropdown">
                                <span class="dropdown-toggle">Ngoại Ngữ</span>
                            </a>
                            <div class="dropdown-menu">
                                <a href="index.php?task=lopduc" class="dropdown-item">Tiếng Đức</a>
                                <a href="index.php?task=lophan" class="dropdown-item">Tiếng Hàn Quốc</a>
                            </div>
                        </div>
                        <a href="index.php?task=contact" class="nav-item nav-link">Liên hệ</a>
                        <div class="nav-btn px-3">
                            <button class="btn-search btn btn-primary btn-md-square rounded-circle flex-shrink-0"
                                data-bs-toggle="modal" data-bs-target="#searchModal"><i
                                    class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
                <div class="d-none d-xl-flex flex-shrink-0 ps-4">
                    <?php
                    $result = $model->getDatalink();
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <a href="<?php echo $row['link']; ?>"
                        class="btn btn-light btn-lg-square rounded-circle position-relative wow tada" target="_blank"
                        data-wow-delay=".9s">
                        <i class="fa fa-phone-alt fa-2x"></i>
                        <div class="position-absolute" style="top: 7px; right: 12px;">
                            <span><i class="fa fa-comment-dots text-secondary"></i></span>
                        </div>
                    </a>
                    <?php } ?>
                    <div class="d-flex flex-column ms-3">
                        <span>Đăng ký tìm hiểu</span>
                        <a href="https://www.google.com/url?q=https%3A%2F%2Fzalo.me%2F0822314555&amp;sa=D&amp;sntz=1&amp;usg=AOvVaw3Byqv2SVVu2BudcEnUOVlu"
                            target="_blank"><span class="text-dark">0822.314.555 - 0566.184.999</span></a>
                    </div>
                </div>
            </nav>
        </div>
    </div>