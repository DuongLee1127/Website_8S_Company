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
                <?php
                require_once 'models/model.php';
                $model = new Model();
                $getid =1;
                $result = mysqli_fetch_assoc($model->getDatalink($getid));

                ?>
            <div class="admin-dashboard">
                <h2 class="text-center mb-4">Sửa link liên kết</h2>
                <form action="" method="post">
                    
                    <!-- <input type="text" class="form-control" id="title" name="pl"
                            placeholder="Ví dụ: Xuất khẩu lao động Đức: xkldduc/ Du học Nhật: dhnhat"> -->

                    <!-- Nội dung chi tiết -->
                    <div class="mb-3">
                        <label for="link" class="form-label">link liên kết</label>
                        <input type="text" class="form-control" name="link" id="link"
                            value="<?php echo $result['link'] ?>">
                    </div>
                    <!-- Nút hành động -->
                    <div class="d-flex justify-content-end btnnn">
                        <button type="submit" name="editlink" class="btn btn-primary">Sửa</button>
                        <a href="index.php?task=qlweb" class="btn btn-primary ht">Hiển thị</a>
                    </div>
                </form>
            </div>


        </main>
    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>