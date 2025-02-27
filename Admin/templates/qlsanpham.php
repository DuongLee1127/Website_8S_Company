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

                    <main class="main-content">
                        <div class="d-flex justify-content-end them">
                            <a href="index.php?task=tsp" class="btn btn-primary ht">Thêm sản phẩm</a>
                        </div>
                        <section id="posts" class="posts-section">

                            <h2>TRANG QUẢN LÝ SẢN PHẨM</h2>
                            <table class="posts-table"
                                style="width: 100%; border-collapse: collapse; border: 1px solid #ddd;">
                                <thead>
                                    <tr style="background-color: #f4f4f4;">
                                        <th>ID</th>
                                        <th>Ảnh sản phẩm</th>
                                        <th>Tên nước</th>
                                        <th>Nội dung</th>
                                        <th>Người tư vấn</th>
                                        <th>Số điện thoại</th>
                                        <th>Note</th>
                                        <th>Tùy chọn</th>
                                        <th><button type="submit" id="xnd" onclick="confirmDeletecbsp()" class="btn btn-delete">Xóa nội dung</button></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once 'models/model.php';
                                    $model = new Model();
                                    $result = $model->getDatasp();
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if($row['hide'] != "none"){
                                        ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td class="tdimg"><img src="<?php echo $row['img']; ?>" alt="ảnh"></td>
                                            <td> <?php echo $row['ten_nuoc']; ?></td>
                                            <td> <?php echo $row['mo_ta']; ?></td>
                                            <td> <?php echo $row['Nguoi_tu_van']; ?></td>
                                            <td> <?php echo $row['SDT']; ?></td>
                                            <td class="note"> <?php echo $row['note']; ?></td>
                                            <td class="tinhnang">
                                                <a href="index.php?task=editsp&idssp=<?php echo $row['id'];?>"
                                                    class="btn btn-edit">sửa</a>
                                                <a href="javascript:void(0)" onclick="confirmDeletesp('<?php echo $row['id'];?>')"
                                                    class="btn btn-delete">xóa
                                                </a>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="idcb[]" id="" value="<?php echo $row['id'] ?>" >
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
                            <h2><?php echo "Thùng rác"?></h2>
                            <table class="posts-table thungrac"
                                style="<?php echo "display: block;" ?>;width: 100%; border-collapse: collapse; border: 1px solid #ddd;">
                                <thead>
                                    <tr style="background-color: #f4f4f4;">
                                        <th>ID</th>
                                        <th>Ảnh sản phẩm</th>
                                        <th>Tên nước</th>
                                        <th>Nội dung</th>
                                        <th>Người tư vấn</th>
                                        <th>Số điện thoại</th>
                                        <th>Note</th>
                                        <th>Tùy chọn</th>
                                        <th><button type="submit" id="xvvnd" onclick="confirmDeletecbspvv()" class="btn btn-delete">Xóa nội dung</button><button type="submit" id="xvvnda" onclick="confirmDeletecbspvva()" class="btn btn-delete">Xóa tất cả</button></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once 'models/model.php';
                                    $model = new Model();
                                    $result = $model->getDatasp();
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if($row['hide'] == "none"){
                                        ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td class="tdimg"><img src="<?php echo $row['img']; ?>" alt="ảnh"></td>
                                            <td> <?php echo $row['ten_nuoc']; ?></td>
                                            <td> <?php echo $row['mo_ta']; ?></td>
                                            <td> <?php echo $row['Nguoi_tu_van']; ?></td>
                                            <td> <?php echo $row['SDT']; ?></td>
                                            <td class="note"> <?php echo $row['note']; ?></td>
                                            <td class="tinhnang">
                                                <a href="index.php?task=qlsp&idphsp=<?php echo $row['id']; ?>"
                                                    class="btn btn-edit">Phục hồi</a>
                                                <a href="javascript:void(0)"
                                                    onclick="confirmDeletevvsp('<?php echo $row['id'];?>')" class="btn btn-delete">Xóa vv
                                                </a>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="iddcbsp[]" id="" value="<?php echo $row['id'] ?>" >
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


        <script src="assets/js/script.js?v=3"></script>
</body>

</html>