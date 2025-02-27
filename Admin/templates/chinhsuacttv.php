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
                <h2 class="text-center mb-4">Sửa thông tin cty thành viên</h2>
                <form action="" method="post">
                <?php
                require_once 'models/model.php';
                $model = new Model();
                $getid =$_GET['id'];
                $result = mysqli_fetch_assoc($model->getDataidcttv($getid));

                ?>
                    <!-- Hình ảnh -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Hình ảnh </label>
                        <input type="text" required class="form-control" name="img" id="image" value="<?php echo $result['img'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label"> Tên</label>
                        <textarea class="form-control"  name="ten" placeholder="" required><?php echo $result['ten']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label"> chức vụ </label>
                        <textarea class="form-control"  name="chucvu" placeholder="" required><?php echo $result['chucvu']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Chi nhánh</label>
                        <textarea class="form-control"  name="chinhanh" placeholder="" required><?php echo $result['chinhanh']; ?></textarea>
                    </div>
                    <textarea class="form-control" name="mail" id="emailInput" placeholder="Nhập mail"></textarea>
        <div id="errorMessage" class="text-danger mt-2" style="display: none;">Email không đúng định dạng. Vui lòng nhập lại (ví dụ: abc@gmail.com).</div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">link FB </label>
                        <textarea class="form-control"  name="linkFB" placeholder="" required><?php echo $result['linkFB']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Link Zalo</label>
                        <textarea class="form-control"  name="linkZalo" placeholder="" required><?php echo $result['linkZalo']; ?></textarea>
                    </div>
                    
                    <!-- Nút hành động -->
                    <div class="d-flex justify-content-end btnnn">
                        <button type="submit" name="editcttv" class="btn btn-primary">Sửa</button>
                        
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