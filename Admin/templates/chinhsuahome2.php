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
                <h2 class="text-center mb-4">Sửa Nội Dung</h2>
                <form action="" method="post">
                    <?php
                    require_once 'models/model.php';
                    $model = new Model();
                    $getid = $_GET['idhome'];
                    $result = mysqli_fetch_assoc($model->getqltrangchu2id($getid));
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
                        <input type="text" list="list" name="font-ftd" value="Arial">
                            <datalist id="list">
                            <?php
                                
                                 if (file_exists($filePath)) {
                                    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                                    foreach ($lines as $line) {
                                        $kt = "";
                                        if($tuybtd[3] == $line){
                                            $kt = "selected";
                                        }
                                        echo '<option value="' .$line .'"'.  $kt.'>' . $line .'</option>';
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


                    <!-- Nội dung chi tiết -->
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Nội dung chi tiết</label>
                        <div class="tuybien">
                        <input type="text" list="list" name="font-f" value="<?php if(!empty($tuybtd[3])) echo $tuybtd[3]; else echo "Arial"; ?>">
                            <datalist id="list">
                            <?php
                                
                                 if (file_exists($filePath)) {
                                    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                                    foreach ($lines as $line) {
                                        echo '<option value="'.$line.'">' . $line .'</option>';
                                    }
                                } else {
                                    echo "<option value=\"\">File not found</option>";
                                }
                                ?>
                            </datalist>

                            <input type="number" name="font-size" class="ndsize" value="<?php echo $tuybP[5]; ?>"
                                min="1">
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
                                <input type="number" name="sizev"
                                    value="<?php if (!empty($result['sizev']))
                                        echo $result['sizev'];
                                    else
                                        echo 100; ?>"
                                    min="0" max="100">%
                            </div>
                        </div>
                        <input type="text" class="form-control" name="video" id="video"
                            value="<?php echo $result['video'] ?>" placeholder="Nhập vào video">
                    </div>
                    <!-- Nút hành động -->
                    <div class="d-flex justify-content-end btnnn">
                        <button type="submit" name="edithome2" class="btn btn-primary">Sửa</button>

                    </div>
                </form>

                <?php

                // }
                // }
                ?>

            </div>


        </main>
    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>