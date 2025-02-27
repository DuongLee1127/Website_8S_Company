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
                <h2 class="text-center mb-4">Thêm Sản phẩm</h2>
                <form action="" method="post">
                    <!-- Hình ảnh -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Hình ảnh</label>
                        <input type="text" class="form-control" name="img" id="image" placeholder="Nhập vào link ảnh" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Tên nước xuất khẩu</label>
                        <select name="tennuoc" class="form-control">
                            <option value="xuất khẩu lao động Nhật Bản">Xuất khẩu lao động nhật Bản </option>
                            <option value="Xuất khẩu lao động Hàn Quốc ">Xuất khẩu lao động hàn Quốc </option>
                            <option value="Xuất khẩu Lao động Đức">Xuất khẩu lao động Đức</option>
                            <option value="Xuất khẩu lao động Đài Loan">Xuất khẩu lao động Đài Loan</option>
                            <option value="Xuất khẩu lao động Úc">Xuất khẩu lao động Úc</option>

                        </select>
                    </div>
                        
                        <!-- <input type="text" class="form-control" id="title" name="pl"
                            placeholder="Ví dụ: Xuất khẩu lao động Đức: xkldduc/ Du học Nhật: dhnhat"> -->
                 

                    <!-- Nội dung chi tiết -->
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Nội dung </label>
                        <div class="tuybien">
                            <select name="font-f">
                                <option value="time new roman" style="font-family: 'Times New Roman', Times, serif;">
                                    Time New Roman</option>
                                <option value="calibri" style="font-family: 'calibri'">Calibri</option>
                                <option value="inherit" style="font-family: 'Inter',sans-serif;">Inter</option>
                                <option value="arial" style="font-family: arial">Arial</option>
                            </select>
                            <input type="number" name="font-size" class="ndsize" value="14" min="1">
                            <div class="canle">
                                <input type="radio" name="clep" id="clelp" value="leftp">
                                <label for="clelp"><i class="fa-solid fa-align-left"></i></label>
                                <input type="radio" name="clep" id="clecp" value="centerp">
                                <label for="clecp"><i class="fa-solid fa-align-center"></i></label>
                                <input type="radio" name="clep" id="clerp" value="rightp">
                                <label for="clerp"><i class="fa-solid fa-align-right"></i></label>
                                <input type="radio" name="clep" id="clep" value="clep">
                                <label for="clep"><i class="fa-solid fa-align-justify"></i></label>
                            </div>
                            <div class="fstyle">
                                <input type="checkbox" name="dam" id="dam" value="true">
                                <label for="dam"><Strong>B</Strong></label>
                                <input type="checkbox" name="nghieng" id="nghieng" value="true">
                                <label for="nghieng"
                                    style="font-style:italic;font-family: 'Times New Roman', Times, serif;">I</label>
                                <input type="checkbox" name="gachc" id="gachc" value="true">
                                <label for="gachc" style="text-decoration: underline;">U</label>
                            </div>
                            <div class="canle">
                                <label for="color">Màu chữ: </label>
                                <input type="color" id="color" name="color" >
                            </div>
                        </div>
                        <textarea class="form-control" style="height: 100px;" name="mota" placeholder="Nhập nội dung chi tiết" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Người tư vấn </label>
                        <textarea class="form-control"  name="ntv" placeholder="Nhập nội dung chi tiết" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Số điện thoại </label>
                        <textarea class="form-control"  name="sdt" placeholder="Nhập nội dung chi tiết" required></textarea>
                    </div>
                    <!-- Nút hành động -->
                    <div class="d-flex justify-content-end btnnn">
                        <button type="submit" name="addsp" class="btn btn-primary" >Thêm</button>
                        <a href="index.php?task=qlsp" class="btn btn-primary ht">Hiển thị danh sách sản phẩm</a>
                    </div>
                </form>

            </div>
        </main>
    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>