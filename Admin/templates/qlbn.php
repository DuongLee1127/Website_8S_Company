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
            $getct = isset($_GET['bn']) ? $_GET['bn'] : "";

            if ($getct == "dhduc") {
                $ct = " du học Đức";
            } elseif ($getct == "xkldnhat") {
                $ct = " giới thiệu xuất khẩu lao động";
            } elseif ($getct == "dhuc") {
                $ct = " du học Úc";
            } elseif ($getct == "dhdl") {
                $ct = " du học Đài Loan";
            } elseif ($getct == "dhnb") {
                $ct = " du học Nhật Bản";
            } elseif ($getct == "dhhq") {
                $ct = " du học Hàn Quốc";
            } elseif ($getct == "contact") {
                $ct = " Trang liên hệ";
            } else
                $ct = "";



            ?>
            <div class="admin-dashboard">
                <h2 class="text-center mb-4">Sửa banner <?php echo $ct ?></h2>
                <form action="" method="post">
                    <?php
                    require_once 'models/model.php';
                    $model = new Model();
                    // $getid = isset($_SESSION['idsua']) ? $_SESSION['idsua'] : "";
                    $getid = $_GET['idsua'];
                    $result = mysqli_fetch_assoc($model->getDatabanerid($getid));

                    ?>
                    <div class="mb-3">
                        <label for="title" class="form-label">Phân loại</label>
                        <select name="pl" class="form-control">
                            <option value="xkldnhat" <?php if ($getct == "xkldnhat")
                                echo "selected"; ?>>Giới thiệu xuất
                                khẩu lao động</option>
                            <option value="dhduc" <?php if ($getct == "dhduc")
                                echo "selected"; ?>>Du học Đức</option>
                            <option value="dhnb" <?php if ($getct == "dhnb")
                                echo "selected"; ?>>Du học Nhật</option>
                            <option value="dhuc" <?php if ($getct == "dhuc")
                                echo "selected"; ?>>Du học Úc</option>
                            <option value="dhhq" <?php if ($getct == "dhhq")
                                echo "selected"; ?>>Du học Hàn Quốc</option>
                            <option value="dhdl" <?php if ($getct == "dhdl")
                                echo "selected"; ?>>Du học Đài Loan</option>
                            <option value="contact" <?php if ($getct == "contact")
                                echo "selected"; ?>>Trang liên hệ</option>
                            <option value="lopduc" <?php if ($getct == "lopduc")
                                echo "selected"; ?>>Trang tiếng đức</option>
                            <option value="lophan" <?php if ($getct == "lophan")
                                echo "selected"; ?>>Trang tiếng hàn</option>
                        </select>
                    </div>

                    <!-- <input type="text" class="form-control" id="title" name="pl"
                            placeholder="Ví dụ: Xuất khẩu lao động Đức: xkldduc/ Du học Nhật: dhnhat"> -->


                    <!-- Nội dung chi tiết -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Hình ảnh</label>
                        <input type="text" class="form-control" name="baner" id="image"
                            value="<?php echo $result['baner'] ?>">
                    </div>
                    
                    <!-- Nút hành động -->
                    <div class="d-flex justify-content-end btnnn">
                        <button type="submit" name="editbaner" class="btn btn-primary">Sửa</button>
                        <a href="index.php?task=qlbaner" class="btn btn-primary ht">Hiển thị danh
                            sách banner</a>
                    </div>
                </form>

                

            </div>


        </main>
    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>