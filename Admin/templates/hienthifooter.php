
<?php
require_once "templates/header.php";
?>
    <style>
        table {
            display: block;
            height: calc(100vh - 180px);
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
            overflow: hidden scroll;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
            max-width: 60%;
        }

        th {
            background-color: #f4f4f4;
            width: 20%;
        }

        td {
            width: 20%;
        }

        .vertical-header {
            transform-origin: left center;
            white-space: nowrap;
            vertical-align: middle;
        }

        .data td {
            width: 60%;
        }

        .edit-btn-container {
            text-align: right;
            /* Căn phải */
            padding: 10px;
        }

        .edit-btn {
            padding: 8px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .edit-btn:hover {
            background-color: #45a049;
        }
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

        <!-- Main Content -->
        <main class="content">
            <form class="admin-dashboard">
                <div>
                    <main class="main-content">
                        <section id="posts" class="posts-section">
                            <div class="chudautrang">
                                <h1>Quản lí footer</h1>
                            </div>
                            <?php
                            require_once 'models/model.php';
                            $model = new Model();
                            $result = $model->getDataFooter();
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <div class="edit-btn-container">
                                    <a href="index.php?task=editfooter"
                                        class="edit-btn">sửa</a>
                                </div>

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="vertical-header">Tiêu đề</th>
                                            <th class="vertical-header">Dữ liệu</th>
                                            <th >note</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="vertical-header">icon</td>
                                            <td><?php echo $row['icon']; ?></td>
                                            <td><?php echo $row['note']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="vertical-header">Mô tả bên trái</td>
                                            <td><?php echo $row['mo_ta1']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="vertical-header">Mô tả bên phải</td>
                                            <td><?php echo $row['mo_ta2']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="vertical-header">Link Facebook</td>
                                            <td><?php echo $row['link_FB']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="vertical-header">Link Instagram</td>
                                            <td><?php echo $row['link_Intagram']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="vertical-header">Link Youtube</td>
                                            <td><?php echo $row['link_YT']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="vertical-header">Link Zalo</td>
                                            <td><?php echo $row['link_ZALO']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="vertical-header">Địa chỉ</td>
                                            <td><?php echo $row['Diachi']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="vertical-header">Mail</td>
                                            <td><?php echo $row['Mail']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="vertical-header">SDT</td>
                                            <td><?php echo $row['SDT']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="vertical-header">Hình ảnh 1</td>
                                            <td class="tdimg"><img src="<?php echo $row['img1'] ?>" alt=""></td>
                                        </tr>
                                        <tr>
                                            <td class="vertical-header">Hình ảnh 2</td>
                                            <td class="tdimg"><img src="<?php echo $row['img2'] ?>" alt=""></td>
                                        </tr>
                                        <tr>
                                            <td class="vertical-header">Hình ảnh 3</td>
                                            <td class="tdimg"><img src="<?php echo $row['img3'] ?>" alt=""></td>
                                        </tr>
                                        <tr>
                                            <td class="vertical-header">Hình ảnh 4</td>
                                            <td class="tdimg"><img src="<?php echo $row['img4'] ?>" alt=""></td>
                                        </tr>
                                        <tr>
                                            <td class="vertical-header">Hình ảnh 5</td>
                                            <td class="tdimg"><img src="<?php echo $row['img5'] ?>" alt=""></td>
                                        </tr>
                                        <tr>
                                            <td class="vertical-header">Hình ảnh 6</td>
                                            <td class="tdimg"><img src="<?php echo $row['img6'] ?>" alt=""></td>
                                        </tr>
                                        <!-- <tr>
                                    <td class="vertical-header">Map</td>
                                    <td ></td>
                                </tr> -->
                                        <tr>
                                            <td class="vertical-header">Tiêu đề trái</td>
                                            <td><?php echo $row['tieu_de_trai']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="vertical-header">Tiêu đề phải</td>
                                            <td><?php echo $row['tieu_de_phai']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php } ?>
                        </section>
                    </main>
                </div>
            </form>
        </main>
    </div>
    </form>
    </main>
    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>