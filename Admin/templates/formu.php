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
            if (isset($_GET['idsuau'])) {
                $kieu = "Sửa";
                $getid = $_GET['idsuau'];
                $result = mysqli_fetch_assoc($model->getDatauseid($getid));
                $pq = explode("|", $result['pquyen']);
                $tenu = $result['use'];
                $mk = $result['pass'];
                $level = $result['level'];
            } else {
                $kieu = "Thêm";
                $tenu = "";
                $pq = ["", "", "", "", "", "", "", "", ""];
                $mk = "";
                $level = "";
            }
            ?>
            <div class="admin-dashboard">
                <h2 class="text-center mb-4"><?php echo $kieu ?> Use</h2>
                <form action="" method="post">
                    <?php

                    ?>
                    <!-- <input type="text" class="form-control" id="title" name="pl"
                            placeholder="Ví dụ: Xuất khẩu lao động Đức: xkldduc/ Du học Nhật: dhnhat"> -->


                    <!-- Nội dung chi tiết -->
                    <div class="mb-3">
                        <label for="use" class="form-label">Tên đăng nhập</label>
                        <input type="text" class="form-control" name="use" id="use" value="<?php echo $tenu ?>">
                    </div>
                    <div class="mb-3">
                        <label for="pass" class="form-label">Mật khẩu</label>
                        <input type="text" class="form-control" name="pass" id="pass" value="<?php echo $mk ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phân quyền Use</label>
                        <div class="cb">
                            <label for="qlw">Quản lý website</label><input type="checkbox" name="qlw" value="true" id="qlw" <?php if((isset($pq[0]) && $pq[0] == "true") || $level == 1) echo "checked"; ?>>
                        </div>
                        <div class="cb">
                            <label for="qlbv">Quản lý bài viết</label><input type="checkbox" name="qlbv" value="true" id="qlbv" <?php if((!empty($pq[1]) && $pq[1] == "true") || $level == 1) echo "checked"; ?>>
                        </div>
                        <div class="cb">
                            <label for="qlsp">Quản lý sản phẩm</label><input type="checkbox" name="qlsp" value="true" id="qlsp" <?php if((!empty($pq[2]) && $pq[2] == "true") || $level == 1) echo "checked"; ?>>
                        </div>
                        <div class="cb">
                            <label for="qlkh">Quản lý khóa học</label><input type="checkbox" name="qlkh" value="true" id="qlkh" <?php if((!empty($pq[3]) && $pq[3] == "true") || $level == 1) echo "checked"; ?>>
                        </div>
                        <div class="cb">
                            <label for="qlft">Quản lý footer</label><input type="checkbox" name="qlft" value="true" id="qlft" <?php if((!empty($pq[4]) && $pq[4] == "true") || $level == 1) echo "checked"; ?>>
                        </div>
                        <div class="cb">
                            <label for="qllh">Quản lý liên hệ</label><input type="checkbox" name="qllh" value="true" id="qllh" <?php if((!empty($pq[5]) && $pq[5] == "true") || $level == 1) echo "checked"; ?>>
                        </div>
                        <div class="cb">
                            <label for="qltrchu">Quản lý trang chủ</label><input type="checkbox" name="qltrchu"
                                value="true" id="qltrchu" <?php if((!empty($pq[6]) && $pq[6] == "true") || $level == 1) echo "checked"; ?>>
                        </div>
                        <div class="cb">
                            <label for="qlbn">Quản lý banner</label><input type="checkbox" name="qlbn" value="true" id="qlbn" <?php if((!empty($pq[7]) && $pq[7] == "true") || $level == 1) echo "checked"; ?>>
                        </div>
                        <div class="cb">
                            <label for="qladmin">Admin</label><input type="checkbox" name="qladmin" value="true" id="qladmin" <?php if((!empty($pq[8]) && $pq[8] == "true") || $level == 1) echo "checked"; ?>>
                        </div>
                    </div>
                    <style>
                        .cb {
                            display: flex;
                            align-items: center;
                        }
                        .cb label {
                            display: inline-block;
                            width: 150px;
                            font-size: 18px;
                        }

                        .cb input {
                            width: 18px;
                            height: 18px;
                        }
                    </style>
                    <!-- Nút hành động -->
                    <div class="d-flex justify-content-end btnnn">
                        <button type="submit" name="addu" class="btn btn-primary"><?php echo $kieu ?></button>
                        <a href="index.php?task=qlu" class="btn btn-primary ht">Hiển thị danh
                            sách Use</a>
                    </div>
                </form>



            </div>


        </main>
    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>