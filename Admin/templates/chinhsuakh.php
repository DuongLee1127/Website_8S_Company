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
                $getkh = isset($_GET['kh']) ? $_GET['kh'] : "";

                if ($getkh == "lopduc") {
                    $kh = " lớp khóa học tiếng Đức";
                } elseif ($getkh == "lophan") {
                    $kh = " Lớp học tiếng Hàn";               
                } else
                    $kh = "";
   
            ?>
            <div class="admin-dashboard">
                <h2 class="text-center mb-4">Sửa thông tin<?php echo $kh ?></h2>
                <form action="" method="post">
                <?php
                require_once 'models/model.php';
                $model = new Model();
                // $getid = isset($_GET['id'] : "1");
                $getid =$_GET['idsuakh'];
                $result = mysqli_fetch_assoc($model->getDataidkh($getid));

                ?>
                    <div class="mb-3">
                        <label for="image" class="form-label">Hình ảnh</label>
                        <input type="text" class="form-control" name="img" id="image" placeholder="Nhập vào link ảnh" value="<?php echo $result['img'] ?>">
                    </div>
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Phân loại</label>
                        <select name="phanloai" class="form-control">
                            <option value="lopduc" <?php if ($getkh == "lopduc")
                                echo "selected"; ?>> Lớp học tiếng Đức</option>
                            <option value="lophan" <?php if ($getkh == "lophan")
                                echo "selected"; ?>>Lớp học tiếng Hàn</option>
                        </select>
                    </div>
                        
                        <!-- <input type="text" class="form-control" id="title" name="pl"
                            placeholder="Ví dụ: Xuất khẩu lao động Đức: xkldduc/ Du học Nhật: dhnhat"> -->
                 

                    <!-- Nội dung chi tiết -->
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Tên lớp học</label>
                        <textarea class="form-control"  name="tenlop" placeholder="Nhập lớp học" required><?php echo $result['ten_lop']; ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">lịch học</label>
                        <textarea class="form-control"  name="lichhoc" placeholder="Nhập lịch học" required><?php echo $result['lich_hoc']; ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Giờ học </label>
                        <textarea class="form-control"  name="giohoc" placeholder="Nhập giờ học" required><?php echo $result['gio_hoc']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Khu vực </label>
                        <textarea class="form-control"  name="khuvuc" placeholder="Nhập khu vực" required><?php echo $result['khu_vuc']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Chi nhánh</label>
                        <textarea class="form-control"  name="chinhanh" placeholder="Nhập chi nhánh" required><?php echo $result['chi_nhanh']; ?></textarea>
                    </div>
                    <!-- Nút hành động -->
                    <div class="d-flex justify-content-end btnnn">
                        <button type="submit" name="editkh" class="btn btn-primary">Sửa</button>
                        <a href="index.php?task=qlkh&kh=<?php echo $getkh; ?>" class="btn btn-primary ht">Hiển thị danh sách bài viết <?php echo $kh; ?></a>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>