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
                <h2 class="text-center mb-4">Thêm lời phản hồi</h2>
                <form action="" method="post">
                    <!-- Hình ảnh -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Hình ảnh</label>
                        <input type="text" class="form-control" name="img" id="image" placeholder="Nhập vào link ảnh" required>
                    </div>
                    
                        
                        <!-- <input type="text" class="form-control" id="title" name="pl"
                            placeholder="Ví dụ: Xuất khẩu lao động Đức: xkldduc/ Du học Nhật: dhnhat"> -->
                 

                    <!-- Nội dung chi tiết -->
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Tên khách hàng</label>
                        <textarea class="form-control"  name="tenkhachhang" placeholder="Nhập Tên khách hàng" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Nghề nghiệp</label>
                        <textarea class="form-control"  name="nghenghiep" placeholder="Nhập nghề nghiệp" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Đánh giá</label>
                        
                        <textarea class="form-control"  name="danhgia" placeholder="Nhập đánh giá" oninput="validateDanhGia(event)"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Nội dung </label>
                        <textarea class="form-control"  name="noidung" placeholder="Nhập nội dung" required></textarea>
                    </div>
                    <!-- Nút hành động -->
                    <div class="d-flex justify-content-end btnnn">
                        <button type="submit" name="addph" class="btn btn-primary" >Thêm</button>
                        
                    </div>
                </form>

            </div>
        </main>
    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>