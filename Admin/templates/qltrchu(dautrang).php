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
            <form class="admin-dashboard">
                <div>


                    <main class="main-content">
                        <div class="d-flex justify-content-end them">
                            <a href="index.php?task=edittrangchu1" class="btn btn-primary ht">Sửa thông tin </a>
                        </div>
                        <section id="posts" class="posts-section">

                            <h2>TRANG QUẢN LÝ </h2>
                            <table class="posts-table"
                                style="width: 100%; border-collapse: collapse; border: 1px solid #ddd;">
                                <thead>
                                    <tr style="background-color: #f4f4f4;">
                                        <th>Porter </th>
                                        <th>Tiêu đề </th>
                                        <th>Mô tả</th>
                                        <th>ảnh </th>
                                        <th>Năm phát triển </th>
                                        <th>Số chi nhánh</th>
                                        <th>Quốc gia hiện diện</th>
                                        <th>Nhân viên</th>
                                        <th>Note</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once 'models/model.php';
                                    $model = new Model();
                                    $result = $model->getqltrangchu1();
                                    while ($row = mysqli_fetch_assoc($result)) {

                                        $images = explode(',', $row['porter']);
                                        ?>
                                        <tr>
                                            <td class="tdimg">
                                                <?php

                                                foreach ($images as $image) {
                                                    $image = trim($image);
                                                    if (!empty($image)) {
                                                        ?>
                                                        <img src="<?php echo $image; ?>" alt="ảnh"
                                                            style="width: 100px; height: auto; margin-right: 10px;">
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            <td> <?php echo $row['tieu_de']; ?></td>
                                            <td> <?php echo $row['mo_ta']; ?></td>
                                            <td class="tdimg"><img src="<?php echo $row['img2']; ?>" alt="ảnh"></td>
                                            <td> <?php echo $row['nampt']; ?></td>
                                            <td> <?php echo $row['sochinhanh']; ?></td>
                                            <td> <?php echo $row['quocgiahiendien']; ?></td>
                                            <td> <?php echo $row['nhanvien']; ?></td>
                                            <td class="note"> <?php echo $row['note']; ?></td>
                                            
                                            
                                            <!-- <td class="tinhnang">
                                    <a href="index.php?task=editkh&kh=<?php echo $getkh ?>&idsuakh=<?php echo $row['id']; ?>" class="btn btn-edit">sửa</a>
                                    <a href="index.php?task=qlkh&kh=<?php echo $getkh ?>&idlh=<?php echo $row['id']; ?>"
                                                        class="btn btn-delete">Xóa</a>


                                </td> -->
                                        </tr>
                                        <?php

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