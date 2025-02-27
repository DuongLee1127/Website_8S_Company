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
        require_once "models/model.php";
        $model = new Model();
        if (isset($_SESSION['use'])) {
            $temp = mysqli_fetch_assoc($model->getDatause($_SESSION['use']));
        } else
            $temp = "";
        ?>

        <!-- Main Content -->
        <main class="content">
            <div class="admin-dashboard">
                <h2 class="text-center mb-4">Profile</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="ten" class="form-label">Tên đăng nhập</label>
                        <input type="text" class="form-control" name="ten" id="ten" 
                            value="<?php if (!empty($temp['use']))
                                echo $temp['use'];?>">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Hình ảnh</label>
                            <input type="hidden" name="current_file" value="<?php echo $temp['img']; ?>">
                            <div class="img">
                                <input type="file" class="form-control" name="img" id="image" onchange="previewImage(event)">
                                <?php if(!empty($temp['img'])){
                                    $img = $temp['img'];

                                    echo "<style>
                                    .img img {
                                        display: block !important;
                                        }
                                        </style>";
                                    } else $img = "unknown.webp";
                                    
                                    ?>
                                <strong><?php echo $img?></strong>
                                <img src="assets/profile/<?php echo $img?>" alt="ảnh" id="preview">
                            </div>
                            <script>
                                function previewImage(event) {
                                    const file = event.target.files[0];
                                    if (file) {
                                        const reader = new FileReader();
                                        reader.onload = function (e) {
                                            const preview = document.getElementById("preview");
                                            preview.src = e.target.result;
                                            preview.style.display = "block";
                                        };
                                        reader.readAsDataURL(file);
                                    }
                                }
                            </script>
                            <style>
                                .img {
                                    display: flex;
                                    align-items: center;
                                }

                                .img input {
                                    width: 85%;
                                }

                                .img img {
                                    width: 120px;
                                    height: 120px;
                                    object-fit: cover;
                                    display: none;
                                    margin-left: 20px;
                                }
                            </style>
                        </div>
                        <div class="mb-3">
                            <label for="tennd" class="form-label">Tên người dùng</label>
                            <input type="text" class="form-control" name="tennd" id="tennd" placeholder="Điền tên hiện hành"
                                value="<?php if (!empty($temp['tenhh']))
                                echo $temp['tenhh'];?>">
                        </div>
                        <div class="mb-3">
                            <label for="mk" class="form-label">Mật khẩu</label>
                            <input type="text" class="form-control" name="mk" id="mk"
                                value="<?php if (!empty($temp['pass']))
                                echo $temp['pass'];
                            else
                                echo "Điền mật khẩu" ?>">
                        </div>

                        <!-- Nút hành động -->
                        <div class="d-flex justify-content-end btnnn">
                            <button type="submit" name="editprofile" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </form>



                </div>


            </main>
        </div>

        <script src="assets/js/script.js"></script>
    </body>

    </html>