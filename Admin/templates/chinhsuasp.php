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
                <h2 class="text-center mb-4">Sửa thông tin</h2>
                <form action="" method="post">
                    <?php
                    require_once 'models/model.php';
                    $model = new Model();
                    // $getid = isset($_GET['id'] : "1");
                    $getid = $_GET['idssp'];
                    $result = mysqli_fetch_assoc($model->getDataidsp($getid));
                    $tuybP = explode("|", $result['tuyb']);
                    ?>
                    <!-- Hình ảnh -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Hình ảnh</label>
                        <input type="text" class="form-control" name="img" id="image"
                            value="<?php echo $result['img'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Tên nước xuất khẩu</label>
                        <select name="tennuoc" class="form-control">
                            <option value="xuất khẩu lao động Nhật Bản" <?php if ($result['ten_nuoc'] == "xuất khẩu lao động Nhật Bản")
                                echo "selected"; ?>>Xuất khẩu lao động nhật Bản </option>
                            <option value="Xuất khẩu lao động Hàn Quốc" <?php if ($result['ten_nuoc'] == "Xuất khẩu lao động Hàn Quốc")
                                echo "selected"; ?>>Xuất khẩu lao động hàn Quốc </option>
                            <option value="Xuất khẩu Lao động Đức" <?php if ($result['ten_nuoc'] == "Xuất khẩu Lao động Đức")
                                echo "selected"; ?>>Xuất khẩu lao động Đức</option>
                            <option value="Xuất khẩu lao động Đài Loan" <?php if ($result['ten_nuoc'] == "Xuất khẩu lao động Đài Loan")
                                echo "selected"; ?>>Xuất khẩu lao động Đài Loan</option>
                            <option value="Xuất khẩu lao động Úc" <?php if ($result['ten_nuoc'] == "Xuất khẩu lao động Úc")
                                echo "selected"; ?>>Xuất khẩu lao động Úc</option>
                        </select>
                    </div>

                    <!-- <input type="text" class="form-control" id="title" name="pl"
                            placeholder="Ví dụ: Xuất khẩu lao động Đức: xkldduc/ Du học Nhật: dhnhat"> -->


                    <!-- Nội dung chi tiết -->
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Nội dung </label>
                        <div class="tuybien">
                            <select name="font-f">
                            <?php
                                $kt = "";
                                 if (file_exists($filePath)) {
                                    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                                    foreach ($lines as $line) {
                                        if($tuybtd[3] == $line){
                                            $kt = "selected";
                                        }
                                        echo "<option value=\"" . htmlspecialchars($line) . "\">" . htmlspecialchars($line) . $kt . "</option>";
                                    }
                                } else {
                                    echo "<option value=\"\">File not found</option>";
                                }
                                ?>
                            </select>

                            <input type="number" name="font-size" class="ndsize"
                                value="<?php if (!empty($tuybP[5]))
                                    echo $tuybP[5];
                                else
                                    echo 12; ?>" min="1">
                            <div class="canle">
                                <input type="radio" name="clep" id="clelp" value="leftp" <?php if ($tuybP[4] == "leftp")
                                    echo "checked"; ?>>
                                <label for="clelp"><i class="fa-solid fa-align-left"></i></label>
                                <input type="radio" name="clep" id="clecp" value="centerp" <?php if ($tuybP[4] == "centerp")
                                    echo "checked"; ?>>
                                <label for="clecp"><i class="fa-solid fa-align-center"></i></label>
                                <input type="radio" name="clep" id="clerp" value="rightp" <?php if ($tuybP[4] == "rightp")
                                    echo "checked"; ?>>
                                <label for="clerp"><i class="fa-solid fa-align-right"></i></label>
                                <input type="radio" name="clep" id="clep" value="clep" <?php if ($tuybP[4] == "clep")
                                    echo "checked"; ?>>
                                <label for="clep"><i class="fa-solid fa-align-justify"></i></label>
                            </div>
                            <div class="fstyle">
                                <input type="checkbox" name="dam" id="dam" value="true" <?php if ($tuybP[0] == "true")
                                    echo "checked"; ?>>
                                <label for="dam"><Strong>B</Strong></label>
                                <input type="checkbox" name="nghieng" id="nghieng" value="true" <?php if ($tuybP[1] == "true")
                                    echo "checked"; ?>>
                                <label for="nghieng"
                                    style="font-style:italic;font-family: 'Times New Roman', Times, serif;">I</label>
                                <input type="checkbox" name="gachc" id="gachc" value="true" <?php if ($tuybP[2] == "true")
                                    echo "checked"; ?>>
                                <label for="gachc" style="text-decoration: underline;">U</label>
                            </div>
                            <div class="canle">
                                <label for="color">Màu chữ: </label>
                                <input type="color" id="color" name="color" value="<?php echo $tuybP[6] ?>">
                            </div>
                        </div>
                        <textarea class="form-control" style="height: 100px;" name="mota" required
                            placeholder=""><?php echo $result['mo_ta']; ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Người tư vấn </label>
                        <textarea class="form-control" name="ntv" placeholder=""
                            required><?php echo $result['Nguoi_tu_van']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Số điện thoại </label>
                        <textarea type="text" class="form-control" name="SDT" placeholder=""
                            required><?php echo $result['SDT']; ?></textarea>
                    </div>
                    <!-- Nút hành động -->
                    <div class="d-flex justify-content-end btnnn">
                        <button type="submit" name="editsp" class="btn btn-primary">Sửa</button>
                        <a href="index.php?task=qlsp" class="btn btn-primary ht">Hiển thị danh sách sản phẩm</a>
                    </div>
                </form>

            </div>
        </main>
    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>