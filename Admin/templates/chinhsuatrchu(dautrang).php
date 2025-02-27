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
                <h2 class="text-center mb-4">Sửa thông tin </h2>
                <form action="" method="post" id="formId">
                <?php
                require_once 'models/model.php';
                $model = new Model();
                $getid =1;
                $result = mysqli_fetch_assoc($model->getDataidtrangchu1($getid));

                ?>
                    <!-- Hình ảnh -->
                    <!-- <div class="mb-3">
                        <label for="image" class="form-label">Porter </label>
                        <input type="text" class="form-control" style="height: 300px;" name="porter" id="image" value="">
                    </div> -->

                    <div class="mb-3">
                    <label for="detailedContent" class="form-label">Nhập link ảnh porter (thêm nhiều ảnh bằng cách đặt dấu phẩy sau link thứ nhất và dán liền link ảnh tiếp theo)</label>
                    <textarea class="form-control" style="height: 300px;" name="porter" id="image"><?php echo htmlspecialchars($result['porter']); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label"> Tiêu đề </label>
                        <textarea class="form-control"  name="tieu_de" placeholder=""><?php echo $result['tieu_de']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Mô tả </label>
                        <textarea class="form-control"  name="mo_ta" placeholder=""><?php echo $result['mo_ta']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">ảnh </label>
                        <textarea class="form-control"  name="img2" placeholder=""><?php echo $result['img2']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Năm phát triển </label>
                        <textarea class="form-control"  name="nampt" placeholder=""><?php echo $result['nampt']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Số chi nhánh </label>
                        <textarea class="form-control"  name="sochinhanh" placeholder=""><?php echo $result['sochinhanh']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Quốc gia hiện diện </label>
                        <textarea class="form-control"  name="quocgiahiendien" placeholder=""><?php echo $result['quocgiahiendien']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Nhân viên</label>
                        <textarea class="form-control"  name="nhanvien" placeholder=""><?php echo $result['nhanvien']; ?></textarea>
                    </div>
                    
                    <!-- Nút hành động -->
                    <div class="d-flex justify-content-end btnnn">
                        <button type="submit" name="edittrangchu1" class="btn btn-primary">Sửa</button>
                        
                    </div>
                </form>

                

            </div>
        </main>
    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>