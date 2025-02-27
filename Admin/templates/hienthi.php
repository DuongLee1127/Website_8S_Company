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
                    <?php
                    $getct = isset($_GET['ct']) ? $_GET['ct'] : "";

                    if ($getct == "dhduc") {
                        $ct = " du học Đức";
                    } elseif ($getct == "xkldnhat") {
                        $ct = " giới thiệu xuất khẩu lao động";
                    } elseif ($getct == "dhuc") {
                        $ct = " du học Úc";
                    } elseif ($getct == "dhdl") {
                        $ct = " du học Đài Loan";
                    } elseif ($getct == "dhnb") {
                        $ct = " du học Nhật Bản";
                    } elseif ($getct == "dhhq") {
                        $ct = " du học Hàn Quốc";
                    } elseif ($getct == "lopduc") {
                        $ct = " Lớp khóa học tiếng Đức";
                    } elseif ($getct == "lophan") {
                        $ct = " Lớp khóa học tiếng Hàn";
                    } else
                        $ct = "";
                    if (isset($_SESSION['level'])) {
                        $ktlv = true;
                    } else
                        $ktlv = false;
                    ?>
                    <main class="main-content">
                        <div class="d-flex justify-content-end them">
                            <a href="index.php?task=them&ct=<?php echo $getct; ?>" class="btn btn-primary ht">Thêm bài
                                viết</a>
                        </div>
                        <section id="posts" class="posts-section">

                            <h2>Chi tiết bài viết<?php echo $ct; ?></h2>
                            <table class="posts-table"
                                style="width: 100%; border-collapse: collapse; border: 1px solid #ddd;">
                                <thead>
                                    <tr style="background-color: #f4f4f4;">
                                        <th>Tiêu đề</th>
                                        <th>Nội dung chi tiết</th>
                                        <th>Hình ảnh</th>
                                        <th>video</th>
                                        <th>Note</th>
                                        <th>Tính năng</th>
                                        <th><button type="submit" id="xndbv" onclick="confirmDeletecbbv()"
                                                class="btn btn-delete">Xóa bài viết</button></th>
                                    </tr>
                                </thead>
                                <tbody id="sortable">
                                    <?php
                                    require_once 'models/model.php';
                                    $model = new Model();
                                    $result = $model->getDatasapxep();
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if ($row['pl'] == $getct && $row['hide'] != 'none') {
                                            ?>
                                            <tr id="row_<?php echo $row['id']; ?>">
                                                <td><?php echo $row['tieu_de']; ?></td>
                                                <td class="noidung">
                                                    <p style="word-break: break-word;"><?php echo nl2br($row['noi_dung']); ?>
                                                    </p>
                                                </td>
                                                <td class="tdimg"><img src="<?php echo $row['img']; ?>" alt="ảnh"></td>
                                                <td class="tdimg">
                                                    <?php if (!empty($row['video'])): ?>
                                                        <a href="<?php echo htmlspecialchars($row['video'], ENT_QUOTES, 'UTF-8'); ?>"
                                                            target="_blank" style="color:black ; text-decoration: underline;">
                                                            <?php echo htmlspecialchars($row['video'], ENT_QUOTES, 'UTF-8'); ?>
                                                        </a>
                                                    <?php else: ?>
                                                        Không có video
                                                    <?php endif; ?>
                                                </td>

                                                <td class="note"><?php echo $row['note'] . "<br/>" . $row['useredit']; ?></td>
                                                <td class="tinhnang">
                                                    <a href="index.php?task=edit&ct=<?php echo $getct ?>&idsua=<?php echo $row['id']; ?>"
                                                        class="btn btn-edit">Sửa</a>
                                                    <a href="javascript:void(0)"
                                                        onclick="confirmDelete('<?php echo $row['id']; ?>', '<?php echo $getct; ?>')"
                                                        class="btn btn-delete">Xóa</a>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="idcbbv[]"
                                                        value="<?php echo $row['id'] ?>,<?php echo $getct ?>">
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
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
                                    style="<?php echo "display: block;" ?>;width: 100%; border-collapse: collapse; border: 1px solid #ddd;">
                                    <thead>
                                        <tr style="background-color: #f4f4f4;">
                                            <th>Tiêu đề</th>
                                            <th>Nội dung chi tiết</th>
                                            <th>Hình ảnh</th>
                                            <th>Video</th>
                                            <th>Note</th>
                                            <th>Tính năng</th>
                                            <th><button type="submit" id="xvvndbv" onclick="confirmDeletecbbvvv()"
                                                    class="btn btn-delete">Xóa</button><button type="submit" id="xvvndbva" onclick="confirmDeletecbbvvva()"
                                                    class="btn btn-delete">Xóa tất cả</button></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $result = $model->getDataF();

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            if ($row['pl'] == $getct && $row['hide'] == 'none') {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['tieu_de']; ?></td>
                                                    <td class="noidung">
                                                        <p style="word-break: break-word;"><?php echo nl2br($row['noi_dung']); ?>
                                                        </p>
                                                    </td>
                                                    <td class="tdimg"><img src="<?php echo $row['img']; ?>" alt="ảnh"></td>
                                                    <td class="tdimg">
                                                        <?php if (!empty($row['video'])): ?>
                                                            <a href="<?php echo htmlspecialchars($row['video'], ENT_QUOTES, 'UTF-8'); ?>"
                                                                target="_blank" style="color:black ; text-decoration: underline;">
                                                                <?php echo htmlspecialchars($row['video'], ENT_QUOTES, 'UTF-8'); ?>
                                                            </a>
                                                        <?php else: ?>
                                                            Không có video
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="note"><?php echo $row['note'] . "<br/>" . $row['useredit']; ?></td>
                                                    <td class="tinhnang">
                                                        <a href="index.php?task=ht&ct=<?php echo $getct ?>&idphbv=<?php echo $row['id']; ?>"
                                                            class="btn btn-edit">Phục hồi</a>
                                                        <a href="javascript:void(0)"
                                                            onclick="confirmDeletevv('<?php echo $row['id']; ?>', '<?php echo $getct ?>')"
                                                            class="btn btn-delete">Xóa vv</a>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="iddcbbv[]"
                                                            value="<?php echo $row['id'] ?>,<?php echo $getct ?>">
                                                    </td>
                                                </tr>

                                                <?php
                                            }
                                        }
                                // if (isset($_GET['id']))
                                //     $model->deletebv($_GET['id']);
                            }
                            ?>


                                </tbody>
                            </table>
                        </section>
                    </main>
                </div>
            </form>
        </main>
    </div>
    </form>
    </main>
    </div>
    <script src="assets/js/script.js?v=3"></script>
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
                    url: "index.php?task=updateOrder",
                    method: "POST",
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