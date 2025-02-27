
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
            <form class="admin-dashboard">
                <div>
                    <main class="main-content">
                        <section id="posts" class="posts-section">

                            <h2>Quản lý banner</h2>
                            <table class="posts-table"
                                style="border-collapse: collapse; border: 1px solid #ddd;">
                                <thead>
                                    <tr style="background-color: #f4f4f4;">
                                        <th>Banner</th>
                                        <th>phân loại</th>
                                        <th>Note</th>
                                        <th>Tính năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once 'models/model.php';
                                    $model = new Model();
                                    $result = $model->getDatabaner();
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if ($row['pl'] == "dhduc") {
                                            $ct = " du học Đức";
                                        } elseif ($row['pl'] == "xkldnhat") {
                                            $ct = " giới thiệu xuất khẩu lao động";
                                        } elseif ($row['pl'] == "dhuc") {
                                            $ct = " du học Úc";
                                        } elseif ($row['pl'] == "dhdl") {
                                            $ct = " du học Đài Loan";
                                        } elseif ($row['pl'] == "dhnb") {
                                            $ct = " du học Nhật Bản";
                                        }elseif ($row['pl'] == "dhhq") {
                                            $ct = " du học Hàn Quốc";
                                        }elseif ($row['pl'] == "lopduc") {
                                            $ct = " lớp khóa học Đức";
                                        }elseif ($row['pl'] == "lophan") {
                                            $ct = " lớp khóa học Hàn";
                                        }elseif ($row['pl'] == "contact") {
                                            $ct = " Trang liên hệ";
                                        } else
                                            $ct = "";
                                        ?>
                                            <tr>
                                                <td class="baner"><img src="<?php echo $row['baner']; ?>" alt="baner"></td>
                                                <td class="note"><?php echo $ct;?></td>
                                                <td class="note"><?php echo $row['note']?></td>
                                                <td class="tinhnang">
                                                    <a href="index.php?task=suabaner&bn=<?php echo $row['pl'] ?>&idsua=<?php echo $row['id']; ?>"
                                                        class="btn btn-edit">Sửa</a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    
                                    // if (isset($_GET['id']))
                                    //     $model->deletebv($_GET['id']);
                                    
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

    <script src="assets/js/script.js"></script>
</body>

</html>