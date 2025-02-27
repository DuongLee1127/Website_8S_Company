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
                            <a href="index.php?task=themph" class="btn btn-primary ht">Thêm đánh giá</a>
                        </div>
                        <section id="posts" class="posts-section">

                            <h2>Đánh giá khách hàng</h2>
                            <table class="posts-table"
                                style="width: 100%; border-collapse: collapse; border: 1px solid #ddd;">
                                <thead>
                                    <tr style="background-color: #f4f4f4;">
                                        <th>ID</th>
                                        <th>Ảnh khách hàng</th>
                                        <th>Tên khách hàng </th>
                                        <th>Nghề nghiệp </th>
                                        <th>Đánh giá</th>
                                        <th>nội dung</th>
                                        <th>Note</th>
                                        <th>Tùy chọn</th>
                                        <th><button type="submit" id="xndphkh" onclick="confirmDeletecbphkh()"
                                                class="btn btn-delete">Xóa</button></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once 'models/model.php';
                                    $model = new Model();
                                    $result = $model->getqlphanhoi();
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if($row['hide'] != 'none'){
                                        ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td class="tdimg"><img src="<?php echo $row['img']; ?>" alt="ảnh"></td>
                                            <td> <?php echo $row['tenkhachhang']; ?></td>
                                            <td> <?php echo $row['nghenghiep']; ?></td>
                                            <td> <?php
                                                       $danhgia = $row['danhgia']; 
                                                       for ($i = 0; $i < $danhgia; $i++) {
                                                            echo "<span class='star'>&#9733;</span>"; 
                                                       }
                                                       for ($i = $danhgia; $i < 5; $i++) {
                                                            echo "<span class='star'>&#9734;</span>";
                                                       }
                                                       ?></td>
                                            
                                            <td> <?php echo $row['noidung']; ?></td>
                                            <td class="note"> <?php echo $row['note']; ?></td>
                                            <td class="tinhnang">
                                                <a href="index.php?task=editphanhoi&id=<?php echo $row['id']; ?>"
                                                    class="btn btn-edit">sửa</a>
                                                <a href="javascript:void(0)"
                                                    class="btn btn-delete" onclick="confirmDeletephkh('<?php echo $row['id'] ?>')">xóa
                                                </a>
                                            </td>
                                            <td>
                                                        <input type="checkbox" name="idcbphkh[]"
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
                            <table class="posts-table"
                                style="<?php echo "display: block;" ?>width: 100%; border-collapse: collapse; border: 1px solid #ddd;">
                                <thead>
                                    <tr style="background-color: #f4f4f4;">
                                        <th>ID</th>
                                        <th>Ảnh khách hàng</th>
                                        <th>Tên khách hàng </th>
                                        <th>Nghề nghiệp </th>
                                        <th>Đánh giá</th>
                                        <th>nội dung</th>
                                        <th>Note</th>
                                        <th>Tùy chọn</th>
                                        <th><button type="submit" id="xvvndphkh" onclick="confirmDeletecbvvphkh()"
                                                    class="btn btn-delete">Xóa</button><button type="submit" id="xvvndphkha" onclick="confirmDeletecbvvphkha()"
                                                    class="btn btn-delete">Xóa tất cả</button></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once 'models/model.php';
                                    $model = new Model();
                                    $result = $model->getqlphanhoi();
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if($row['hide'] == 'none'){
                                        ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td class="tdimg"><img src="<?php echo $row['img']; ?>" alt="ảnh"></td>
                                            <td> <?php echo $row['tenkhachhang']; ?></td>
                                            <td> <?php echo $row['nghenghiep']; ?></td>
                                            <td> <?php
                                                       $danhgia = $row['danhgia']; 
                                                       for ($i = 0; $i < $danhgia; $i++) {
                                                            echo "<span class='star'>&#9733;</span>"; 
                                                       }
                                                       for ($i = $danhgia; $i < 5; $i++) {
                                                            echo "<span class='star'>&#9734;</span>";
                                                       }
                                                       ?></td>
                                            
                                            <td> <?php echo $row['noidung']; ?></td>
                                            <td class="note"> <?php echo $row['note']; ?></td>
                                            <td class="tinhnang">
                                                <a href="index.php?task=qlphanhoi&idphph=<?php echo $row['id']; ?>"
                                                    class="btn btn-edit">phục hồi</a>
                                                <a href="index.php?task=qlphanhoi&idxvvph=<?php echo $row['id']; ?>"
                                                    class="btn btn-delete">xóa vv
                                                </a>
                                            </td>
                                                    <td>
                                                        <input type="checkbox" name="iddcbphkh[]"
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