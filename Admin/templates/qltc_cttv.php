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
                            <a href="index.php?task=tcttv" class="btn btn-primary ht">Thêm thông tin cty thành viên </a>
                        </div>
                        <section id="posts" class="posts-section">

                            <h2>TRANG QUẢN LÝ cty thành viên</h2>
                            <table class="posts-table"
                                style="width: 100%; border-collapse: collapse; border: 1px solid #ddd;">
                                <thead>
                                    <tr style="background-color: #f4f4f4;">
                                        <th>ID</th>
                                        <th>Ảnh sản phẩm</th>
                                        <th>Tên </th>
                                        <th>Chức vụ </th>
                                        <th>chi nhánh</th>
                                        <th>Mail</th>
                                        <th>Link FB</th>
                                        <th>Link Zalo</th>
                                        <th>Note</th>
                                        <th>Tùy chọn</th>
                                        <th><button type="submit" id="xndcttv" onclick="confirmDeletecbcttv()"
                                                class="btn btn-delete">Xóa</button></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once 'models/model.php';
                                    $model = new Model();
                                    $result = $model->getqltrangchu3();
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if($row['hide'] != 'none'){
                                        ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td class="tdimg"><img src="<?php echo $row['img']; ?>" alt="ảnh"></td>
                                            <td> <?php echo $row['ten']; ?></td>
                                            <td> <?php echo $row['chucvu']; ?></td>
                                            <td> <?php echo $row['chinhanh']; ?></td>
                                            <td> <?php echo $row['mail']; ?></td>
                                            <td > <?php echo $row['linkFB']; ?></td>
                                            <td> <?php echo $row['linkZalo']; ?></td>
                                            <td class="note"> <?php echo $row['note']; ?></td>
                                            <td class="tinhnang">
                                                <a href="index.php?task=editcttv&idscttv=<?php echo $row['id']; ?>"
                                                    class="btn btn-edit">sửa</a>
                                                <a href="javascript:void(0)" onclick="confirmDeletecttv('<?php echo $row['id'] ?>')"
                                                    class="btn btn-delete">xóa
                                                </a>
                                            </td>
                                            <td>
                                                        <input type="checkbox" name="idcbcttv[]"
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
                                        <th>ID</th>
                                        <th>Ảnh sản phẩm</th>
                                        <th>Tên </th>
                                        <th>Chức vụ </th>
                                        <th>chi nhánh</th>
                                        <th>Mail</th>
                                        <th>Link FB</th>
                                        <th>Link Zalo</th>
                                        <th>Note</th>
                                        <th>Tùy chọn</th>
                                        <th><button type="submit" id="xvvndcttv" onclick="confirmDeletecbvvcttv()"
                                                    class="btn btn-delete">Xóa</button><button type="submit" id="xvvndcttva" onclick="confirmDeletecbvvcttva()"
                                                    class="btn btn-delete">Xóa tất cả</button></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $result = $model->getqltrangchu3();
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if($row['hide'] == 'none'){
                                        ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td class="tdimg"><img src="<?php echo $row['img']; ?>" alt="ảnh"></td>
                                            <td> <?php echo $row['ten']; ?></td>
                                            <td> <?php echo $row['chucvu']; ?></td>
                                            <td> <?php echo $row['chinhanh']; ?></td>
                                            <td> <?php echo $row['mail']; ?></td>
                                            <td > <?php echo $row['linkFB']; ?></td>
                                            <td> <?php echo $row['linkZalo']; ?></td>
                                            <td class="note"> <?php echo $row['note']; ?></td>
                                            <td class="tinhnang">
                                                <a href="index.php?task=qlctytv&idphcttv=<?php echo $row['id']; ?>"
                                                    class="btn btn-edit">phục hồi</a>
                                                <a href="javascript:void(0)" class="btn btn-delete" onclick="confirmDeletevvcttv('<?php echo $row['id']; ?>')">xóa vv
                                                </a>
                                            </td>
                                                    <td>
                                                        <input type="checkbox" name="iddcbcttv[]"
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
                            <?php
                        }
                        ?>
                        </section>
                    </main>
                </div>
            </form>
        </main>


        <script src="assets/js/script.js"></script>
</body>

</html>