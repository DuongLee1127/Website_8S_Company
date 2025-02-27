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
                <h2 class="text-center mb-4">Thêm cty thành viên</h2>
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
                        <label for="detailedContent" class="form-label">Tên</label>
                        <textarea class="form-control"  name="ten" placeholder="Nhập Tên" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Chức vụ</label>
                        <textarea class="form-control"  name="chucvu" placeholder="Nhập chức vụ" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">chi nhánh</label>
                        <textarea class="form-control"  name="chinhanh" placeholder="Nhập chi nhánh" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">mail </label>
                        <textarea class="form-control" name="mail" id="emailInput" placeholder="Nhập mail"></textarea>
        <div id="errorMessage" class="text-danger mt-2" style="display: none;">Email không đúng định dạng. Vui lòng nhập lại (ví dụ: abc@gmail.com).</div>
                    </div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">link FB</label>
                        <textarea class="form-control"  name="linkFB" placeholder="Nhập link FB" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">link zalo</label>
                        <textarea class="form-control"  name="linkZalo" placeholder="Nhập link Zalo " required></textarea>
                    </div>
                    <!-- Nút hành động -->
                    <div class="d-flex justify-content-end btnnn">
                        <button type="submit" name="addcttv" class="btn btn-primary" >Thêm</button>
                        
                    </div>
                </form>

            </div>
        </main>
    </div>
    <script>
    document.querySelector('form').addEventListener('submit', function (event) {
        const emailInput = document.getElementById('emailInput').value.trim();
        const errorMessage = document.getElementById('errorMessage');

        // Regular Expression for Email Validation
        const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        if (!emailRegex.test(emailInput)) {
            errorMessage.style.display = 'block'; // Hiển thị lỗi
            event.preventDefault(); // Ngăn form gửi đi
        } else {
            errorMessage.style.display = 'none'; // Ẩn thông báo lỗi nếu email hợp lệ
        }
    });
</script>
    <script src="assets/js/script.js"></script>
</body>

</html>