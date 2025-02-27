<?php
require_once "templates/header.php";
?>

<script>
        function validateDanhGia(event) {
            const danhGiaInput = event.target;
            const value = danhGiaInput.value;

            if (value === "") {
            return;
                  }
            if (isNaN(value) || value < 1 || value > 5) {
                alert("Vui lòng chỉ nhập số từ 1 đến 5 ");
                danhGiaInput.value = ""; 
            }
        }
    </script>

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
                <h2 class="text-center mb-4">Sửa thông tin</h2>
                <form action="" method="post">
                <?php
                require_once 'models/model.php';
                $model = new Model();
                // $getid = isset($_GET['id'] : "1");
                $getid =$_GET['id'];
                $result = mysqli_fetch_assoc($model->getDataidph($getid));

                ?>
                    <!-- Hình ảnh -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Hình ảnh</label>
                        <input type="text" class="form-control" name="img" id="image" required value="<?php echo $result['img'] ?>">
                    </div>
                    
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Tên khách hàng</label>
                        <textarea class="form-control"  name="tenkhachhang" placeholder="" required><?php echo $result['tenkhachhang']; ?></textarea>
                    </div>
                        
                        <!-- <input type="text" class="form-control" id="title" name="pl"
                            placeholder="Ví dụ: Xuất khẩu lao động Đức: xkldduc/ Du học Nhật: dhnhat"> -->
                 

                    <!-- Nội dung chi tiết -->
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Nghề nghiệp </label>
                        <textarea class="form-control" style="height: 100px;" name="nghenghiep" placeholder="" required><?php echo $result['nghenghiep']; ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Đánh giá  </label>
                        <textarea class="form-control"  name="danhgia" placeholder="" oninput="validateDanhGia(event)"><?php echo $result['danhgia']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Nội dung </label>
                        <textarea type="text" class="form-control"  name="noidung" placeholder="" required><?php echo $result['noidung']; ?></textarea>
                    </div>
                    <!-- Nút hành động -->
                    <div class="d-flex justify-content-end btnnn">
                        <button type="submit" name="editphanhoi" class="btn btn-primary" >Sửa</button>
                        <a href="index.php?task=qlphanhoi" class="btn btn-primary ht">Hiển thị danh sách phản hồi</a>
                    </div>
                </form>

            </div>
        </main>
    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>