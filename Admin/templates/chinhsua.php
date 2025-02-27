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
        <style>
            /* #mySelect {
                display: none;
            } */
        </style>

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
            <div class="admin-dashboard">
                <h2 class="text-center mb-4">Sửa Nội Dung<?php echo $ct; ?></h2>
                <form action="" method="post">
                    <?php
                    require_once 'models/model.php';
                    $model = new Model();
                    // $getid = isset($_SESSION['idsua']) ? $_SESSION['idsua'] : "";
                    $getid = $_GET['idsua'];
                    $result = mysqli_fetch_assoc($model->getDataid($getid));
                    $tuybP = explode("|", $result['font-styleP']);
                    $newmar = str_replace('px', '', $result['marginP']);
                    $marginpp = explode(" ", $newmar);
                    $tuybtd = explode("|", $result['font-styletd']);

                    $newmar1 = str_replace('px', '', $result['margintd']);
                    $marginpp1 = explode(" ", $newmar1);

                    ?>
                    <div class="mb-3">
                        <label for="title" class="form-label">Tiêu đề</label>
                        <div class="tuybien">
                            <input type="text" list="list" name="font-ftd" value="<?php if(!empty($tuybtd[3])) echo $tuybtd[3]; else echo "Arial"; ?>">
                            <datalist id="list">
                                <?php
                                if (file_exists($filePath)) {
                                    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                                    foreach ($lines as $line) {
                                        echo '<option value="' . $line . '">' . $line . '</option>';
                                    }
                                } else {
                                    echo "<option value=\"\">File not found</option>";
                                }
                                ?>
                            </datalist>
                            <input type="number" name="font-sizetd" class="ndsize"
                                value="<?php if (!empty($tuybtd[5]))
                                    echo $tuybtd[5];
                                else
                                    echo '40'; ?>" min="1">
                            <div class="canle">
                                <input type="radio" name="cletd" id="cleltd" value="lefttd" <?php if (!empty($tuybtd[4]) && $tuybtd[4] == "lefttd")
                                    echo "checked"; ?>>
                                <label for="cleltd"><i class="fa-solid fa-align-left"></i></label>
                                <input type="radio" name="cletd" id="clectd" value="centertd" <?php if (!empty($tuybtd[4]) && $tuybtd[4] == "centertd")
                                    echo "checked"; ?>>
                                <label for="clectd"><i class="fa-solid fa-align-center"></i></label>
                                <input type="radio" name="cletd" id="clertd" value="righttd" <?php if (!empty($tuybtd[4]) && $tuybtd[4] == "righttd")
                                    echo "checked"; ?>>
                                <label for="clertd"><i class="fa-solid fa-align-right"></i></label>
                                <input type="radio" name="cletd" id="cletd" value="cletd" <?php if (!empty($tuybtd[4]) && $tuybtd[4] == "cletd")
                                    echo "checked"; ?>>
                                <label for="cletd"><i class="fa-solid fa-align-justify"></i></label>
                            </div>
                            <div class="fstyle">
                                <input type="checkbox" name="damtd" id="damtd" value="true" <?php if (!empty($tuybtd[0]) && $tuybtd[0] == "true")
                                    echo "checked"; ?>>
                                <label for="damtd"><Strong>B</Strong></label>
                                <input type="checkbox" name="nghiengtd" id="nghiengtd" value="true" <?php if (!empty($tuybtd[1]) && $tuybtd[1] == "true")
                                    echo "checked"; ?>>
                                <label for="nghiengtd"
                                    style="font-style:italic;font-family: 'Times New Roman', Times, serif;">I</label>
                                <input type="checkbox" name="gachctd" id="gachctd" value="true" <?php if (!empty($tuybtd[2]) && $tuybtd[2] == "true")
                                    echo "checked"; ?>>
                                <label for="gachctd" style="text-decoration: underline;">U</label>
                            </div>
                            <div class="canle">
                                <label for="color">Màu chữ: </label>
                                <input type="color" id="color" name="colortd"
                                    value="<?php if (!empty($tuybtd[6]))
                                        echo $tuybtd[6];
                                    else
                                        echo "#000"; ?>">
                            </div>
                            <div class="canle">
                                <label for="letrai">
                                    <p>Lề trái: </p>
                                </label>
                                <input type="number" name="letraitd" id="letrai"
                                    value="<?php echo !empty($marginpp1[3]) ? $marginpp1[3] : '0'; ?>" min="0">
                                <label for="lephai">
                                    <p>Lề phải: </p>
                                </label>
                                <input type="number" name="lephaitd" id="lephai"
                                    value="<?php echo !empty($marginpp1[1]) ? $marginpp1[1] : '0'; ?>" min="0">
                                <label for="letren">
                                    <p>Lề trên: </p>
                                </label>
                                <input type="number" name="letrentd" id="letren"
                                    value="<?php echo !empty($marginpp1[0]) ? $marginpp1[0] : '0'; ?>" min="0">
                                <label for="leduoi">
                                    <p>Lề dưới: </p>
                                </label>
                                <input type="number" name="leduoitd" id="leduoi"
                                    value="<?php echo !empty($marginpp1[2]) ? $marginpp1[2] : '0'; ?>" min="0">
                            </div>
                        </div>
                        <input type="text" class="form-control" name="td" id="title"
                            value="<?php echo $result['tieu_de'] ?>">
                    </div>
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
                            <input type="text" list="list" name="font-f" value="<?php if(!empty($tuybP[3])) echo $tuybP[3]; else echo "Arial"; ?>">
                            <datalist id="list">
                                <?php

                                if (file_exists($filePath)) {
                                    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                                    foreach ($lines as $line) {
                                        echo '<option value="' . $line . '">' . $line . '</option>';
                                    }
                                } else {
                                    echo "<option value=\"\">File not found</option>";
                                }
                                ?>
                            </datalist>

                            <input type="number" name="font-size" class="ndsize"
                                value="<?php if (!empty($tuybP[5]))
                                    echo $tuybP[5];
                                else
                                    echo '14'; ?>" min="1">
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
                            <div class="canle">
                                <label for="letrai">
                                    <p>Lề trái: </p>
                                </label>
                                <input type="number" name="letrai" id="letrai" value="<?php echo $marginpp[3]; ?>"
                                    min="0">
                                <label for="lephai">
                                    <p>Lề phải: </p>
                                </label>
                                <input type="number" name="lephai" id="lephai" value="<?php echo $marginpp[1]; ?>"
                                    min="0">
                                <label for="letren">
                                    <p>Lề trên: </p>
                                </label>
                                <input type="number" name="letren" id="letren" value="<?php echo $marginpp[0]; ?>"
                                    min="0">
                                <label for="leduoi">
                                    <p>Lề dưới: </p>
                                </label>
                                <input type="number" name="leduoi" id="leduoi" value="<?php echo $marginpp[2]; ?>"
                                    min="0">
                            </div>
                        </div>
                        <textarea class="form-control" style="height: 300px;"
                            name="nd"><?php echo $result['noi_dung'] ?></textarea>
                    </div>

                    <!-- Hình ảnh -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Hình ảnh</label>
                        <div class="tuybien">
                            <div class="isize">
                                <label for="wid">Kích thước</label>
                                <input type="number" name="sizei" id="wid" value="<?php echo $result['sizei'] ?>"
                                    min="0" max="100">%
                            </div>
                            <div class="canle">
                                <input type="radio" name="clei" id="cleli" value="lefti" <?php if ($result['margini'] == "lefti")
                                    echo "checked"; ?>>
                                <label for="cleli"><i class="fa-solid fa-align-left"></i></label>
                                <input type="radio" name="clei" id="cleci" value="centeri" <?php if ($result['margini'] == "centeri")
                                    echo "checked"; ?>>
                                <label for="cleci"><i class="fa-solid fa-align-center"></i></label>
                                <input type="radio" name="clei" id="cleri" value="righti" <?php if ($result['margini'] == "righti")
                                    echo "checked"; ?>>
                                <label for="cleri"><i class="fa-solid fa-align-right"></i></label>
                            </div>
                        </div>
                        <input type="text" class="form-control" name="img" id="image"
                            value="<?php echo $result['img'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="video" class="form-label">Video</label>
                        <div class="tuybien">
                            <div class="isize">
                                <label for="video">Kích thước</label>
                                <input type="number" name="sizev" value="<?php echo $result['sizev'] ?>" min="0"
                                    max="100">%
                            </div>
                            <!-- <div class="canle">
                                <input type="radio" name="clei" id="cleli" value="lefti">
                                <label for="cleli"><i class="fa-solid fa-align-left"></i></label>
                                <input type="radio" name="clei" id="cleci" value="centeri">
                                <label for="cleci"><i class="fa-solid fa-align-center"></i></label>
                                <input type="radio" name="clei" id="cleri" value="righti">
                                <label for="cleri"><i class="fa-solid fa-align-right"></i></label>
                            </div> -->
                        </div>
                        <input type="text" class="form-control" name="video" id="video"
                            value="<?php echo $result['video'] ?>" placeholder="Nhập vào video ">
                    </div>
                    <!-- Nút hành động -->
                    <div class="d-flex justify-content-end btnnn">
                        <button type="submit" name="edit" class="btn btn-primary">Sửa</button>

                        <a href="index.php?task=ht&ct=<?php echo $getct; ?>" class="btn btn-primary ht">Hiển thị danh
                            sách bài viết <?php echo $ct; ?></a>
                    </div>
                </form>

                <?php
                // require_once 'models/model.php';
                // $model = new Model();
                // if (isset($_POST['edit'])) {
                //     $td = empty($_POST['td']) ? 'true' : null;
                //     $pl = empty($_POST['pl']) ? 'true' : null;
                //     $nd = empty($_POST['nd']) ? 'true' : null;
                //     $img = empty($_POST['img']) ? 'true' : null;
                
                //     if (isset($_POST['dam']) && $_POST['dam'] === 'true') {
                //         $dam = "true";
                //     } else
                //         $dam = "false";
                //     if (isset($_POST['nghieng']) && $_POST['nghieng'] === 'true') {
                //         $nghieng = "true";
                //     } else
                //         $nghieng = "false";
                //     if (isset($_POST['gachc']) && $_POST['gachc'] === 'true') {
                //         $gachc = "true";
                //     } else
                //         $gachc = "false";
                
                //     if (isset($_POST['clep'])) {
                //         $cle = $_POST['clep'];
                //     } else
                //         $cle = "";
                
                //     if (isset($_POST['clei'])) {
                //         $clei = $_POST['clei'];
                //     } else
                //         $clei = "";
                
                //     $fonts = $dam . "|" . $nghieng . "|" . $gachc . "|" . $_POST['font-f'] . "|" . $cle . "|" . $_POST['font-size'];
                
                //     $marginp = "{$_POST['letren']}px {$_POST['lephai']}px {$_POST['leduoi']}px {$_POST['letrai']}px";
                
                //     $time = date("Y-m-d H:i:s");
                //     $note = "Người sửa: <strong>{$_SESSION['use']}</strong> - Time: $time";
                
                //     // if ($td || $pl || $nd || $img) {
                //     //     echo "<script>alert('Dữ liệu thêm không được bỏ trống')</script>";
                //     // } else {
                //     if ($model->update($_GET['idsua'], $_POST['img'], $_POST['nd'], $_POST['td'], $_POST['pl'], $fonts, $marginp, $_POST['sizei'], $clei, $note)) {
                //         // // header('Location: /index.php');
                //         // if (isset($_SERVER['HTTP_REFERER']))
                //         //     header('Location: ' . $_SERVER['HTTP_REFERER']);
                //     } else {
                //         echo "<script>alert('Sửa không thành công')</script>";
                //     }
                
                $_SESSION['ct'] = $getct;
                // }
                // }
                ?>

            </div>


        </main>
    </div>
    <!-- <script>
        const searchInput = document.getElementById('searchInput');
        const mySelect = document.getElementById('mySelect');

        // Lắng nghe sự kiện nhập vào ô tìm kiếm
        searchInput.addEventListener('keyup', function() {
            let filter = searchInput.value.toLowerCase(); // Lấy giá trị nhập, chuyển về chữ thường
            let options = mySelect.options;
            let hasResult = false;

            // Duyệt qua tất cả các option
            for (let i = 0; i < options.length; i++) {
                let text = options[i].text.toLowerCase();
                if (text.includes(filter) && filter !== "") {
                    options[i].style.display = ''; // Hiển thị nếu khớp
                    hasResult = true; // Đánh dấu là có kết quả
                } else {
                    options[i].style.display = 'none'; // Ẩn nếu không khớp
                }
            }

            // Nếu có kết quả và ô tìm kiếm không trống, hiển thị danh sách
            if (hasResult && filter !== "") {
                mySelect.style.display = 'block';
            } else {
                mySelect.style.display = 'none'; // Ẩn nếu không có kết quả
            }
        });

        // Ẩn danh sách khi nhấn ra ngoài ô tìm kiếm
        document.addEventListener('click', function(event) {
            if (!searchInput.contains(event.target) && !mySelect.contains(event.target)) {
                mySelect.style.display = 'none';
            }
        });
    </script> -->
    <script src="assets/js/script.js"></script>
</body>

</html>