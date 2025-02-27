<?php
require_once "templates/header.php";
?>

<body>
    <!-- Header -->
    <?php
        require_once "model/head.php";
    ?>

    <!-- Main Layout -->
    <div class="layout">
        <!-- Sidebar -->
        <?php
        require_once "model/navbar.php";
    ?>

        <!-- Main Content -->
        <main class="content">
            <div class="admin-dashboard">
                <h2 class="text-center mb-4">Sửa thông tin Footer</h2>
                <form action="" method="post" id="formId">
                <?php
                require_once 'models/model.php';
                $model = new Model();
                $getid =1;
                $result = mysqli_fetch_assoc($model->getDataFooter());
                $stylei = explode("|", $result['stylei']);

                ?>
                    <!-- Hình ảnh -->
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">icon </label>
                        <div class="tuybien">
                            <div class="isize">
                                <label for="wid">Kích thước</label>
                                <input type="number" name="sizei" id="wid" value="<?php if(!empty($stylei[1])) echo $stylei[1]; else echo "100";?>"
                                    min="0" max="100">%
                            </div>
                            <div class="canle">
                                <input type="radio" name="clei" id="cleli" value="lefti" <?php if (!empty($stylei[0]) && $stylei[0] == "lefti")
                                    echo "checked"; ?>>
                                <label for="cleli"><i class="fa-solid fa-align-left"></i></label>
                                <input type="radio" name="clei" id="cleci" value="centeri" <?php if (!empty($stylei[0]) && $stylei[0] == "centeri")
                                    echo "checked"; ?>>
                                <label for="cleci"><i class="fa-solid fa-align-center"></i></label>
                                <input type="radio" name="clei" id="cleri" value="righti" <?php if (!empty($stylei[0]) && $stylei[0] == "righti")
                                    echo "checked"; ?>>
                                <label for="cleri"><i class="fa-solid fa-align-right"></i></label>
                            </div>
                        </div>
                        <textarea class="form-control"  name="icon" placeholder=""><?php echo $result['icon']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Mô tả bên trái </label>
                        <textarea class="form-control"  name="mota1" placeholder=""><?php echo $result['mo_ta1']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Mô tả bên phải </label>
                        <textarea class="form-control"  name="mota2" placeholder=""><?php echo $result['mo_ta2']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Tiêu đè bên trái </label>
                        <textarea class="form-control"  name="td1" placeholder=""><?php echo $result['tieu_de_trai']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Tiêu đề bên phải </label>
                        <textarea class="form-control"  name="td2" placeholder=""><?php echo $result['tieu_de_phai']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Link Facebook </label>
                        <textarea class="form-control"  name="FB" placeholder=""><?php echo $result['link_FB']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Link Intagram </label>
                        <textarea class="form-control"  name="IN" placeholder=""><?php echo $result['link_Intagram']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Link Youtube </label>
                        <textarea class="form-control"  name="YT" placeholder=""><?php echo $result['link_YT']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Link Zalo </label>
                        <textarea class="form-control"  name="Zalo" placeholder=""><?php echo $result['link_ZALO']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Địa chỉ </label>
                        <textarea class="form-control"  name="diachi" placeholder=""><?php echo $result['Diachi']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Mail </label>
                        <textarea class="form-control"  name="mail" placeholder=""><?php echo $result['Mail']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">SDT </label>
                        <textarea class="form-control"  name="sdt1" placeholder=""><?php echo $result['SDT']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Hình ảnh 1</label>
                        <input type="text" class="form-control" name="img1" id="image" value="<?php echo $result['img1'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Hình ảnh 2</label>
                        <input type="text" class="form-control" name="img2" id="image" value="<?php echo $result['img2'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Hình ảnh 3</label>
                        <input type="text" class="form-control" name="img3" id="image" value="<?php echo $result['img3'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Hình ảnh 4</label>
                        <input type="text" class="form-control" name="img4" id="image" value="<?php echo $result['img4'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Hình ảnh 5</label>
                        <input type="text" class="form-control" name="img5" id="image" value="<?php echo $result['img5'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Hình ảnh 6</label>
                        <input type="text" class="form-control" name="img6" id="image" value="<?php echo $result['img6'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Link map</label>
                        <textarea class="form-control"  name="map" placeholder=""><?php echo $result['link_map']; ?></textarea>
                    </div>
                    <!-- Nút hành động -->
                    <div class="d-flex justify-content-end btnnn">
                        <button type="submit" name="editfooter" class="btn btn-primary">Sửa</button>
                        
                    </div>
                </form>

                

            </div>
        </main>
    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>