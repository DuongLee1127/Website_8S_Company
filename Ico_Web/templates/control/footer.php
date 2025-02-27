<div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
    <?php require_once 'models/model.php';
        $model = new Model();
        $result = $model->getDataFooter();
        while ($row = mysqli_fetch_assoc($result)) { 
            $tuybi = explode("|", $row['stylei']);
            $stylei = "";
            if (!empty($tuybi[0]) && $tuybi[0] == 'lefti') {
                $stylei = "justify-content: flex-start;";
            } elseif (!empty($tuybi[0]) && $tuybi[0] == 'righti') {
                $stylei = "justify-content: flex-end;";
            } elseif (!empty($tuybi[0]) && $tuybi[0] == 'centeri') {
                $stylei = "justify-content: center;";
            } else
                $stylei = "";

            if(!empty($tuybi[1])){
                $sizei = 'width:'.$tuybi[1].'%';
            }else 
            $sizei = 'width: 100%';
            
            ?>
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-xl-9">
                <div class="mb-5">
                    <div class="row g-4">
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="footer-item">
                                <a href="index.php?task=pageHome" class="p-0">
                                    <div class="footer-img-container " style="display: flex; <?php echo $stylei ?>">
                                        <img src="<?php echo $row['icon']; ?>" alt="" class="footer-img" style="<?php echo $sizei ?>">
                                    </div>
                                </a>
                                <p class="text-white mb-4"><?php echo $row['mo_ta1']; ?></p>
                                <div class="footer-btn d-flex">
                                    <a class="btn btn-md-square rounded-circle me-3"
                                        href="<?php echo $row['link_FB']; ?>"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-md-square rounded-circle me-3"
                                        href="<?php echo $row['link_Intagram']; ?>"><i class="fas fa-phone"></i></a>
                                    <a class="btn btn-md-square rounded-circle me-3"
                                        href="<?php echo $row['link_YT']; ?>"><i class="fab fa-instagram"></i></a>
                                    <a class="btn btn-md-square rounded-circle me-0"
                                        href="<?php echo $row['link_ZALO']; ?>"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="footer-item">
                                <h4 class="mb-4 text-white"><?php echo $row['tieu_de_trai']; ?></h4>
                                <div class="row g-3">
                                    <div class="col-4">
                                        <div class="footer-instagram rounded">
                                            <img src="<?php echo $row['img1']; ?>" class="img-fluid w-100" alt="">
                                            <div class="footer-search-icon">
                                                <a href="<?php echo $row['img1']; ?>" data-lightbox="footerInstagram-1"
                                                    class="my-auto"><i class="fas fa-link text-white"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="footer-instagram rounded">
                                            <img src="<?php echo $row['img2']; ?>" class="img-fluid w-100" alt="">
                                            <div class="footer-search-icon">
                                                <a href="<?php echo $row['img2']; ?>" data-lightbox="footerInstagram-2"
                                                    class="my-auto"><i class="fas fa-link text-white"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="footer-instagram rounded">
                                            <img src="<?php echo $row['img3']; ?>" class="img-fluid w-100" alt="">
                                            <div class="footer-search-icon">
                                                <a href="<?php echo $row['img3']; ?>" data-lightbox="footerInstagram-3"
                                                    class="my-auto"><i class="fas fa-link text-white"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="footer-instagram rounded">
                                            <img src="<?php echo $row['img4']; ?>" class="img-fluid w-100" alt="">
                                            <div class="footer-search-icon">
                                                <a href="<?php echo $row['img4']; ?>" data-lightbox="footerInstagram-4"
                                                    class="my-auto"><i class="fas fa-link text-white"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="footer-instagram rounded">
                                            <img src="<?php echo $row['img5']; ?>" class="img-fluid w-100" alt="">
                                            <div class="footer-search-icon">
                                                <a href="<?php echo $row['img5']; ?>" data-lightbox="footerInstagram-5"
                                                    class="my-auto"><i class="fas fa-link text-white"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="footer-instagram rounded">
                                            <img src="<?php echo $row['img6']; ?>" class="img-fluid w-100" alt="">
                                            <div class="footer-search-icon">
                                                <a href="<?php echo $row['img6']; ?>" data-lightbox="footerInstagram-6"
                                                    class="my-auto"><i class="fas fa-link text-white"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-5" style="border-top: 1px solid rgba(255, 255, 255, 0.08);">
                    <div class="row g-0">
                        <div class="col-12">
                            <div class="row g-4">
                                <div class="col-lg-6 col-xl-4">
                                    <div class="d-flex">
                                        <div class="btn-xl-square bg-primary text-white rounded p-4 me-4">
                                            <i class="fas fa-map-marker-alt fa-2x"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-white">Address</h4>
                                            <p class="mb-0"><?php echo $row['Diachi']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-4">
                                    <div class="d-flex">
                                        <div class="btn-xl-square bg-primary text-white rounded p-4 me-4">
                                            <i class="fas fa-envelope fa-2x"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-white">Mail </h4>
                                            <p class="mb-0"><?php echo $row['Mail']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-4">
                                    <div class="d-flex">
                                        <div class="btn-xl-square bg-primary text-white rounded p-4 me-4">
                                            <i class="fa fa-phone-alt fa-2x"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-white">Telephone</h4>
                                            <p class="mb-0"><?php echo $row['SDT']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Khoi 3 footer start -->
            <div class="col-xl-3">
                <div class="footer-item">
                    <h4 class="text-white mb-4"><?php echo $row['tieu_de_phai']; ?></h4>
                    <p class="text-white mb-3"><?php echo $row['mo_ta2']; ?></p>
                    <iframe src="<?php echo $row['link_map']; ?>" class="col-12" style="border:0;" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <div class="d-flex flex-shrink-0" style=" margin-top: 20px;">
                        <div class="footer-btn">
                            <a href="#" class="btn btn-lg-square rounded-circle position-relative wow tada"
                                data-wow-delay=".9s">
                                <i class="fa fa-phone-alt fa-2x"></i>
                                <div class="position-absolute" style="top: 2px; right: 12px;">
                                    <span><i class="fa fa-comment-dots text-secondary"></i></span>
                                </div>
                            </a>
                        </div>
                        <div class="d-flex flex-column ms-3 flex-shrink-0">
                            <span>Đăng ký tìm hiểu</span>
                            <a href="tel:+ <?php echo $row['SDT']; ?>"><span class="text-white"><?php echo $row['SDT']; ?></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Khoi 3 footer end -->
        </div>
    </div>
    <?php } ?>
</div>