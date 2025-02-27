<?php
require_once "templates/header.php";
?>
<style>


</style>

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
                            <a href="index.php?task=editlienhe" class="btn btn-primary ht">Sửa thông tin liên hệ</a>
                        </div>
                        <section id="posts" class="posts-section">

                            <h2>TRANG QUẢN LÝ </h2>
                            <table class="posts-table"
                                style="width: 100%; height: 300px; border-collapse: collapse; border: 1px solid #ddd;">
                                <thead>
                                    <tr style="background-color: #f4f4f4;">

                                        <th>Ảnh </th>
                                        <th>Address</th>
                                        <th>Mail</th>
                                        <th>Telephone1</th>
                                        <th>Telephone2</th>
                                        <th>Note</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once 'models/model.php';
                                    $model = new Model();
                                    $result = $model->getDatalienhe();
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if ($row['hide'] != "none") {
                                            ?>
                                            <tr>

                                                <td class="tdimg"><img src="<?php echo $row['img']; ?>" alt="ảnh"></td>
                                                <td> <?php echo $row['address']; ?></td>
                                                <td> <?php echo $row['email']; ?></td>
                                                <td> <?php echo $row['telephone1']; ?></td>
                                                <td> <?php echo $row['telephone2']; ?></td>
                                                <td class="note"> <?php echo $row['note']; ?></td>
                                                <!-- <td class="tinhnang">
                                    <a href="index.php?task=editkh&kh=<?php echo $getkh ?>&idsuakh=<?php echo $row['id']; ?>" class="btn btn-edit">sửa</a>
                                    <a href="index.php?task=qlkh&kh=<?php echo $getkh ?>&idlh=<?php echo $row['id']; ?>"
                                                        class="btn btn-delete">Xóa</a>


                                </td> -->
                                            </tr>
                                            <?php
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
            <form class="admin-dashboard" method="post">
                <div>
                    <main class="main-content">

                        <section id="posts" class="posts-section">
                            <h2>Thông tin khách hàng</h2>
                            <table class="posts-table thongtin"
                                style="display: block; height: 250px; width: 100%; border-collapse: collapse; border: 1px solid #ddd;">
                                <thead>
                                    <tr style="background-color: #f4f4f4;">
                                        <th>STT</th>
                                        <th>Tên</th>
                                        <th>SDT</th>
                                        <th>Địa chỉ</th>
                                        <th>Email</th>
                                        <th>Facebook</th>
                                        <th>Tính năng</th>
                                        <th><button type="submit" id="xndlh" onclick="confirmDeletecblh()"
                                                class="btn btn-delete">Xóa liên hệ</button></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once 'models/model.php';
                                    $model = new Model();
                                    $result = $model->getDatattlienhe();
                                    $STT = 1;
                                    if (isset($_SESSION['level'])) {
                                        $level = $_SESSION['level'];
                                    } else
                                        $level = '';
                                    while ($row = mysqli_fetch_assoc($result)) {

                                        if ($row['hide'] != "none") {
                                            ?>
                                            <tr>
                                                <td><?php echo $STT++; ?></td>
                                                <td><?php echo $row['Ten']; ?></td>
                                                <td><?php echo $row['SDT']; ?></td>
                                                <td><?php echo $row['Diachi']; ?></td>
                                                <td><?php echo $row['Email']; ?></td>
                                                <td><?php echo $row['FB']; ?></td>
                                                <td class="tinhnang">
                                                    <a href="javascript:void(0)"
                                                        onclick="confirmDeletelienhe('<?php echo $row['id']; ?>')"
                                                        class="btn btn-delete">Xóa</a>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="idcblh[]" value="<?php echo $row['id'] ?>">
                                                </td>
                                            </tr>

                                            <?php
                                        }
                                    } ?>


                                </tbody>

                            </table>
                            <?php
                            $row = mysqli_fetch_assoc($model->getDatause($_SESSION['use']));
                            if ($row['level'] == 1) {
                                echo "<style>
                                        .posts-table {
                                            height: calc(30vh - 80px);
                                        }
                                    </style>";


                                //     ?>
                                <h2><?php echo "Thùng rác" ?></h2>
                                <table class="posts-table thungrac"
                                    style="<?php echo "display: block;" ?>; width: 100%; height: 350px; border-collapse: collapse; border: 1px solid #ddd;">
                                    <thead>
                                        <tr style="background-color: #f4f4f4;">
                                            <th>STT</th>
                                            <th>Tên</th>
                                            <th>SDT</th>
                                            <th>Địa chỉ</th>
                                            <th>Email</th>
                                            <th>Facebook</th>
                                            <th>Note</th>
                                            <th>Tùy chọn</th>
                                            <th><button type="submit" id="xvvndlh" onclick="confirmDeletecblhvv()" class="btn btn-delete">Xóa</button><button type="submit" id="xvvndlha" onclick="confirmDeletecblhvva()" class="btn btn-delete">Xóa tất cả</button></th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once 'models/model.php';
                                        $model = new Model();
                                        $result = $model->getDatattlienhe();
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            if ($row['hide'] == "none") {
                                                ?>
                                                <tr>
                                                    <td><?php echo $STT++; ?></td>
                                                    <td><?php echo $row['Ten']; ?></td>
                                                    <td><?php echo $row['SDT']; ?></td>
                                                    <td><?php echo $row['Diachi']; ?></td>
                                                    <td><?php echo $row['Email']; ?></td>
                                                    <td><?php echo $row['FB']; ?></td>
                                                    <td class="note"> <?php echo $row['note']; ?></td>
                                                    <td class="tinhnang">
                                                        <a href="index.php?task=qllh&idphlienhe=<?php echo $row['id']; ?>"
                                                            class="btn btn-edit">Phục hồi</a>
                                                        <a href="javascript:void(0)"
                                                            onclick="confirmDeletevvlienhe('<?php echo $row['id']; ?>')"
                                                            class="btn btn-delete">Xóa vv
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="iddcblh[]"
                                                            value="<?php echo $row['id'] ?>">
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
                            <?php } ?>
                        </section>


                    </main>
                </div>
            </form>
        </main>





        <script src="assets/js/script.js"></script>

</body>

</html>