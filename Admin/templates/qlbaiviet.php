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
            $getct = isset($_GET['ct']) ? $_GET['ct'] : "";
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
            } elseif ($getct == "lopduc") {
                $ct = " lớp khóa học Đức";
            } elseif ($getct == "lophan") {
                $ct = " lớp khóa học Hàn";
            } else
                $ct = "";

            ?>
            <div class="admin-dashboard" style="margin-left: 8px">
                <h2 class="text-center mb-4">Thêm Nội Dung<?php echo $ct; ?></h2>
                <form action="" method="post" style="margin-left: 8px">
                    <div class="mb-3">
                        <label for="title" class="form-label">Tiêu đề</label>
                        <div class="tuybien">
                        <input type="text" list="list" name="font-ftd" value="Arial">
                            <datalist id="list">
                                <?php if (file_exists($filePath)) {
                                    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                                    foreach ($lines as $line) {
                                        echo '<option value="'. $line .'">' . $line .'</option>';
                                    }
                                } else {
                                    echo "<option value=\"\">File not found</option>";
                                }
                                ?>
                            </datalist>
                            <input type="number" name="font-sizetd" class="ndsize" value="40" min="1">
                            <div class="canle">
                                <input type="radio" name="cletd" id="cleltd" value="lefttd">
                                <label for="cleltd"><i class="fa-solid fa-align-left"></i></label>
                                <input type="radio" name="cletd" id="clectd" value="centertd">
                                <label for="clectd"><i class="fa-solid fa-align-center"></i></label>
                                <input type="radio" name="cletd" id="clertd" value="righttd">
                                <label for="clertd"><i class="fa-solid fa-align-right"></i></label>
                                <input type="radio" name="cletd" id="cletd" value="cletd">
                                <label for="cletd"><i class="fa-solid fa-align-justify"></i></label>
                            </div>
                            <div class="fstyle">
                                <input type="checkbox" name="damtd" id="damtd" value="true">
                                <label for="damtd"><Strong>B</Strong></label>
                                <input type="checkbox" name="nghiengtd" id="nghiengtd" value="true">
                                <label for="nghiengtd"
                                    style="font-style:italic;font-family: 'Times New Roman', Times, serif;">I</label>
                                <input type="checkbox" name="gachctd" id="gachctd" value="true">
                                <label for="gachctd" style="text-decoration: underline;">U</label>
                            </div>
                            <div class="canle">
                                <label for="color">Màu chữ: </label>
                                <input type="color" id="color" name="colortd" value="">
                            </div>
                            <div class="canle">
                                <label for="letraitd">
                                    <p>Lề trái: </p>
                                </label>
                                <input type="number" name="letraitd" id="letraitd" value="0" min="0">
                                <label for="lephaitd">
                                    <p>Lề phải: </p>
                                </label>
                                <input type="number" name="lephaitd" id="lephaitd" value="0" min="0">
                                <label for="letrentd">
                                    <p>Lề trên: </p>
                                </label>
                                <input type="number" name="letrentd" id="letrentd" value="0" min="0">
                                <label for="leduoitd">
                                    <p>Lề dưới: </p>
                                </label>
                                <input type="number" name="leduoitd" id="leduoitd" value="0" min="0">
                            </div>
                        </div>
                        <input type="text" class="form-control" name="td" id="title"
                            placeholder="Nhập tiêu đề nội dung">
                    </div>
                    <div class="mb-3">
                        <label for="pl" class="form-label">Phân loại</label>
                        <select name="pl" class="form-control" id="pl">
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
                            <option value="lopduc" <?php if ($getct == "lopduc")
                                echo "selected"; ?>>Lớp khóa học Đức
                            </option>
                            <option value="lophan" <?php if ($getct == "lophan")
                                echo "selected"; ?>>Lớp khóa học Hàn
                            </option>
                        </select>
                    </div>

                    <!-- <input type="text" class="form-control" id="title" name="pl"
                            placeholder="Ví dụ: Xuất khẩu lao động Đức: xkldduc/ Du học Nhật: dhnhat"> -->


                    <!-- Nội dung chi tiết -->
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Nội dung chi tiết</label>
                        <div class="tuybien">
                        <input type="text" list="list" name="font-f" value="Arial">
                            <datalist id="list">
                            <?php if (file_exists($filePath)) {
                                     $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                                    foreach ($lines as $line) {
                                        echo '<option value="'. $line .'">' . $line .'</option>';
                                    }
                                } else {
                                    echo "<option value=\"\">File not found</option>";
                                }
                                ?>
                            </datalist>
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
                                <input type="color" id="color" name="color" value="">
                            </div>
                            <div class="canle">
                                <label for="letrai">
                                    <p>Lề trái: </p>
                                </label>
                                <input type="number" name="letrai" id="letrai" value="0" min="0">
                                <label for="lephai">
                                    <p>Lề phải: </p>
                                </label>
                                <input type="number" name="lephai" id="lephai" value="0" min="0">
                                <label for="letren">
                                    <p>Lề trên: </p>
                                </label>
                                <input type="number" name="letren" id="letren" value="0" min="0">
                                <label for="leduoi">
                                    <p>Lề dưới: </p>
                                </label>
                                <input type="number" name="leduoi" id="leduoi" value="0" min="0">
                            </div>
                        </div>
                        <textarea id="detailedContent" class="form-control" style="height: 300px;" name="nd"
                            placeholder="Nhập nội dung chi tiết"></textarea>

                    </div>

                    <!-- Hình ảnh -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Hình ảnh</label>
                        <div class="tuybien">
                            <div class="isize" style="display: block;margin: 10px;">
                                <label for="wid">Kích thước</label>
                                <input type="number" name="sizei" id="wid" value="100" min="0" max="100">%
                            </div>
                            <div class="canle">
                                <input type="radio" name="clei" id="cleli" value="lefti">
                                <label for="cleli"><i class="fa-solid fa-align-left"></i></label>
                                <input type="radio" name="clei" id="cleci" value="centeri">
                                <label for="cleci"><i class="fa-solid fa-align-center"></i></label>
                                <input type="radio" name="clei" id="cleri" value="righti">
                                <label for="cleri"><i class="fa-solid fa-align-right"></i></label>
                            </div>
                        </div>
                        <input type="text" class="form-control" name="img" id="image" placeholder="Nhập vào link ảnh">
                    </div>
                    <div class="mb-3">
                        <label for="video" class="form-label">Video</label>
                        <div class="tuybien">
                            <div class="isize">
                                <label for="video">Kích thước</label>
                                <input type="number" name="sizev" value="100" min="0" max="100">%
                            </div>
                            <!-- <div class="canle">
                                <input type="radio" name="clev" id="clelv" value="leftv">
                                <label for="clelv"><i class="fa-solid fa-align-left"></i></label>
                                <input type="radio" name="clev" id="cleci" value="centerv">
                                <label for="clelv"><i class="fa-solid fa-align-center"></i></label>
                                <input type="radio" name="clev" id="cleri" value="rightv">
                                <label for="clelv"><i class="fa-solid fa-align-right"></i></label>
                            </div> -->
                        </div>
                        <input type="text" class="form-control" name="video" id="video" placeholder="Nhập vào video">
                    </div>
                    <!-- Nút hành động -->
                    <div class="d-flex justify-content-end btnnn">
                        <button type="submit" name="add" class="btn btn-primary">Thêm</button>
                        <a href="index.php?task=ht&ct=<?php echo $getct ?>" class="btn btn-primary ht">Hiển thị danh
                            sách bài viết</a>
                    </div>
                </form>

                <?php
                $_SESSION['ct'] = $getct;
                ?>

            </div>
        </main>
    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>