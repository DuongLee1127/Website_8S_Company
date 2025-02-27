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
        <main class="content">
            <form class="admin-dashboard" method="post">
                <div>
                    <?php
                    $getkh = isset($_GET['kh']) ? $_GET['kh'] : "";

                    if ($getkh == "lopduc") {
                        $kh = " LỚP HỌC TIẾNG ĐỨC";
                    } elseif ($getkh == "lophan") {
                        $kh = " LỚP HỌC TIẾNG HÀN";
                    } else
                        $kh = "";

                    ?>

                    <main class="main-content">
                        <div class="d-flex justify-content-end them">
                            <a href="index.php?task=tlh&kh=<?php echo $getkh ?>" class="btn btn-primary ht">Thêm lớp
                                học</a>
                        </div>
                        <section id="posts" class="posts-section">

                            <h2>TRANG QUẢN LÝ <?php echo $kh ?></h2>
                            <table class="posts-table"
                                style="width: 100%; border-collapse: collapse; border: 1px solid #ddd;">
                                <thead>
                                    <tr style="background-color: #f4f4f4;">

                                        <th>Ảnh </th>
                                        <th>Tên lớp</th>
                                        <th>Lịch học</th>
                                        <th>Giờ học</th>
                                        <th>Khu vực</th>
                                        <th>Chi nhánh</th>
                                        <th>Note</th>
                                        <th>Tùy chọn</th>
                                        <th><button type="submit" id="xndkh" onclick="confirmDeletecbkh()" class="btn btn-delete">Xóa khóa học</button></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once 'models/model.php';
                                    $model = new Model();
                                    $result = $model->getDatakhoahoc();
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if ($row['phan_loai'] == $getkh && $row['hide'] != "none") {
                                            ?>
                                            <tr>

                                                <td class="tdimg"><img src="<?php echo $row['img']; ?>" alt="ảnh"></td>
                                                <td> <?php echo $row['ten_lop']; ?></td>
                                                <td> <?php echo $row['lich_hoc']; ?></td>
                                                <td> <?php echo $row['gio_hoc']; ?></td>
                                                <td> <?php echo $row['khu_vuc']; ?></td>
                                                <td> <?php echo $row['chi_nhanh']; ?></td>
                                                <td class="note"> <?php echo $row['note']; ?></td>
                                                <td class="tinhnang">
                                                    <a href="index.php?task=editkh&kh=<?php echo $getkh ?>&idsuakh=<?php echo $row['id']; ?>"
                                                        class="btn btn-edit">sửa</a>
                                                    <a href="javascript:void(0)"
                                                        onclick="confirmDeletekh('<?php echo $row['id']; ?>', '<?php echo $getkh ?>')"
                                                        class="btn btn-delete">Xóa</a>


                                                </td>
                                                <td>
                                                    <input type="checkbox" name="idcbkh[]" value="<?php echo $row['id'] ?>,<?php echo $getkh ?>">
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    // if (isset($_GET['id']))
                                    // $model->deletesp($_GET['id']);
                                    ?>
                                </tbody>
                            </table>

                            <?php
                            $row = mysqli_fetch_assoc($model->getDatause($_SESSION['use']));
                            if ($row['level'] == 1) {
                                echo "<style>
                                        .posts-table {
                                            height: calc(50vh - 80px);
                                        }
                                    </style>";


                                ?>
                                <h2><?php echo "Thùng rác" ?></h2>
                                <table class="posts-table thungrac"
                                    style="<?php echo "display: block;" ?>width: 100%; border-collapse: collapse; border: 1px solid #ddd;">
                                    <thead>
                                        <tr style="background-color: #f4f4f4;">

                                            <th>Ảnh </th>
                                            <th>Tên lớp</th>
                                            <th>Lịch học</th>
                                            <th>Giờ học</th>
                                            <th>Khu vực</th>
                                            <th>Chi nhánh</th>
                                            <th>Note</th>
                                            <th>Tùy chọn</th>
                                            <th><button type="submit" id="xvvndkh" onclick="confirmDeletecbkhvv()" class="btn btn-delete">Xóa</button><button type="submit" id="xvvndkha" onclick="confirmDeletecbkhvva()" class="btn btn-delete">Xóa tất cả</button></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = $model->getDatakhoahoc();
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            if ($row['phan_loai'] == $getkh && $row['hide'] == "none") {
                                                ?>
                                                <tr>

                                                    <td class="tdimg"><img src="<?php echo $row['img']; ?>" alt="ảnh"></td>
                                                    <td> <?php echo $row['ten_lop']; ?></td>
                                                    <td> <?php echo $row['lich_hoc']; ?></td>
                                                    <td> <?php echo $row['gio_hoc']; ?></td>
                                                    <td> <?php echo $row['khu_vuc']; ?></td>
                                                    <td> <?php echo $row['chi_nhanh']; ?></td>
                                                    <td class="note"> <?php echo $row['note']; ?></td>
                                                    <td class="tinhnang">
                                                        <a href="index.php?task=qlkh&kh=<?php echo $getkh ?>&idphkh=<?php echo $row['id']; ?>"
                                                            class="btn btn-edit">Phục hồi</a>
                                                        <a href="javascript:void(0)"
                                                            onclick="confirmDeletevvkh('<?php echo $row['id']; ?>', '<?php echo $getkh ?>')"
                                                            class="btn btn-delete">Xóa vv</a>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="iddcbkh[]" value="<?php echo $row['id'] ?>,<?php echo $getkh ?>">
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                            }
                            // if (isset($_GET['id']))
                            // $model->deletesp($_GET['id']);
                            ?>
                                </tbody>
                            </table>
                        </section>
                    </main>
                </div>
            </form>
        </main>


        <script src="assets/js/script.js"></script>
</body>

</html>