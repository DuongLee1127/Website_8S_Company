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
            <form class="admin-dashboard" method="post">
                <div>
                    <main class="main-content">
                        <div class="d-flex justify-content-end them">
                            <a href="index.php?task=addhome2" class="btn btn-primary ht">Thêm bài
                                viết</a>
                        </div>
                        <section id="posts" class="posts-section">
                            <h2>Thông tin bài viết</h2>
                            <table class="posts-table"
                                style="width: 100%; border-collapse: collapse; border: 1px solid #ddd;">
                                <thead>
                                    <tr style="background-color: #f4f4f4;">
                                        <th>STT</th>
                                        <th>Hình ảnh</th>
                                        <th>Tiêu đề</th>
                                        <th>Nội dung</th>
                                        <th>video</th>
                                        <th>note</th>
                                        <th>Tính năng</th>
                                        <th><button type="submit" id="xndh2" onclick="confirmDeletecbh2()"
                                                class="btn btn-delete">Xóa</button></th>
                                    </tr>
                                </thead>
                                <tbody id="sortable">
                                    <?php
                                    require_once 'models/model.php';
                                    $model = new Model();
                                    $result = $model->getDatasapxephome2();
                                    $STT = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if($row['hide'] != 'none'){
                                        ?>
                                        <tr id="row_<?php echo $row['id']; ?>">
                                            <td><?php echo $STT++; ?></td>
                                            <td class="tdimg"><img src="<?php echo $row['img']; ?>" alt=""></td>
                                            <td><?php echo $row['tieu_de']; ?></td>
                                            <td class="noidung" style="word-break: break-word;">
                                                <?php echo $row['noi_dung']; ?></td>
                                            <td><?php if (!empty($row['video']))
                                                echo $row['video'];
                                            else
                                                echo "Không có video" ?>
                                                </td>
                                                <td><?php echo $row['note']; ?></td>
                                            <td class="tinhnang">
                                                <a href="index.php?task=edithome2&idhome=<?php echo $row['id']; ?>"
                                                    class="btn btn-edit">Sửa
                                                </a>
                                                <a href="javascript:void(0)" onclick="confirmDeletehome2('<?php echo $row['id']?>')"
                                                    class="btn btn-delete">Xóa
                                                </a>

                                            </td>
                                            <td>
                                                <input type="checkbox" name="idcbh2[]"
                                                    value="<?php echo $row['id'] ?>">
                                            </td>
                                        </tr>
                                    <?php 
                                        }
                                } ?>
                                </tbody>

                            </table>
                            <?php
                            $row1 = mysqli_fetch_assoc($model->getDatause($_SESSION['use']));
                            if ($row1['level'] == 1) {
                                echo "<style>
                                        .posts-table {
                                            height: calc(50vh - 80px);
                                        }
                                    </style>";
                                ?>
                                <h2><?php echo "Thùng rác" ?></h2>
                            <table class="posts-table"
                                style="<?php echo "display: block;"?>width: 100%; border-collapse: collapse; border: 1px solid #ddd;">
                                <thead>
                                    <tr style="background-color: #f4f4f4;">
                                        <th>STT</th>
                                        <th>Hình ảnh</th>
                                        <th>Tiêu đề</th>
                                        <th>Nội dung</th>
                                        <th>video</th>
                                        <th>note</th>
                                        <th>Tính năng</th>
                                        <th><button type="submit" id="xvvndh2" onclick="confirmDeletecbvvh2()"
                                                class="btn btn-delete">Xóa</button><button type="submit" id="xvvndh2a" onclick="confirmDeletecbvvh2a()"
                                                class="btn btn-delete">Xóa tất cả</button></th>
                                    </tr>
                                </thead>
                                <tbody >
                                    <?php
                                    require_once 'models/model.php';
                                    $model = new Model();
                                    $result = $model->getqltrangchu2();
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if($row['hide'] == "none"){
                                        ?>
                                        <tr >
                                            <td><?php echo $row['id']; ?></td>
                                            <td class="tdimg"><img src="<?php echo $row['img']; ?>" alt=""></td>
                                            <td><?php echo $row['tieu_de']; ?></td>
                                            <td class="noidung" style="word-break: break-word;">
                                                <?php echo $row['noi_dung']; ?></td>
                                            <td><?php if (!empty($row['video']))
                                                echo $row['video'];
                                            else
                                                echo "Không có video" ?>
                                                </td>
                                                <td><?php echo $row['note']; ?></td>
                                            <td class="tinhnang">
                                                <a href="index.php?task=qlhome2&idphh2=<?php echo $row['id']; ?>"
                                                    class="btn btn-edit">Phục hồi
                                                </a>
                                                <a href="javascript:void(0)" onclick="confirmDeletevvhome2('<?php echo $row['id'] ?>')"
                                                    class="btn btn-delete">Xóa vv
                                                </a>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="iddcbh2[]"
                                                    value="<?php echo $row['id'] ?>">
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    } ?>
                                </tbody>

                            </table>
                            <?php } ?>
                        </section>
                    </main>
                </div>
            </form>
        </main>
    </div>

    <script src="assets/js/script.js"></script>
    <script>
    $(function () {
        $("#sortable").sortable({
            // Khi bắt đầu kéo, thay đổi màu của phần tử đang kéo
            start: function (event, ui) {
                ui.item.css("background-color", "#f7c600"); // Màu vàng khi kéo
            },
            // Khi di chuyển đến vùng mới, sẽ thay đổi màu của vùng thả
            over: function (event, ui) {
                ui.placeholder.css("background-color", "red"); // Màu xanh nhạt cho vùng thả
                ui.placeholder.css("border", "2px dashedrgb(236, 15, 15)"); // Thêm viền dashed
            },
            // Khi thả, thay đổi màu của phần tử đã được thả và gửi lại thứ tự
            stop: function (event, ui) {
                ui.item.css("background-color", ""); // Xóa màu khi thả xong

                // Gửi lại thứ tự mới
                var order = [];
                $("#sortable tr").each(function () {
                    var id = $(this).attr("id").replace("row_", "");
                    order.push(id);
                });

                $.ajax({
                    url: "index.php?task=updateOrderhome2",
                    method: "post",
                    data: { order: order },
                    success: function (response) {
                        var res = JSON.parse(response);
                        alert(res.message); // Thông báo thành công sau khi cập nhật
                    }
                });
            }
        });
    });
    </script>
</body>

</html>