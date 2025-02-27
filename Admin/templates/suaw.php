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
            if(isset($_GET['idsuaw'])){
                $idw = $_GET['idsuaw'];
            }else $idw = "1";
            $model = new Model();
            $abc = $model->getDatawid($idw);
            $result = mysqli_fetch_assoc($abc);
            ?>
            <div class="admin-dashboard">
                <h2 class="text-center mb-4">Sửa <?php echo $result['trang'] ?></h2>
                <form action="" method="post">
                    
                    <!-- <input type="text" class="form-control" id="title" name="pl"
                            placeholder="Ví dụ: Xuất khẩu lao động Đức: xkldduc/ Du học Nhật: dhnhat"> -->


                    <!-- Nội dung chi tiết -->
                    <div class="mb-3">
                        <label for="use" class="form-label">Tên Website</label>
                        <input type="text" class="form-control" name="ten" id="use"
                            value="<?php echo $result['ten'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="pass" class="form-label">Icon Website</label>
                        <input type="text" class="form-control" name="icon" id="pass"
                            value="<?php echo $result['icon'] ?>">
                    </div>
                    <!-- Nút hành động -->
                    <div class="d-flex justify-content-end btnnn">
                        <button type="submit" name="editw" class="btn btn-primary">Sửa</button>
                        <a href="index.php?task=qlweb" class="btn btn-primary ht">Hiển thị</a>
                    </div>
                </form>
            </div>


        </main>
    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>