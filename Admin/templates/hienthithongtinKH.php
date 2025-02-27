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
                            <h2>Thông tin khách hàng</h2>
                            <table class="posts-table" style="width: 100%; border-collapse: collapse; border: 1px solid #ddd;">
                                <thead>
                                    <tr style="background-color: #f4f4f4;">
                                        <th>STT</th>
                                        <th>Tên</th>
                                        <th>SDT</th>
                                        <th>Địa chỉ</th>
                                        <th>Email</th>
                                        <th>Facebook</th>
                                        <th>Tính năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    require_once 'models/model.php';
                                    $model = new Model();
                                    $result = $model->getDatattlienhe();
                                    $STT = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                    <tr>
                                            <td><?php echo $STT++; ?></td>
                                            <td><?php echo $row['Ten']; ?></td>
                                            <td><?php echo $row['SDT']; ?></td>
                                            <td><?php echo $row['Diachi']; ?></td>
                                            <td><?php echo $row['Email']; ?></td>
                                            <td><?php echo $row['FB']; ?></td>
                                            <td class="tinhnang">
                                                <a href="index.php?task=ttkh&idttkh=<?php echo $row['id']; ?>"
                                                    class="btn btn-delete">xóa
                                                </a>


                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>

                            </table>

                        </section>
                    </main>
                </div>
            </form>
        </main>
    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>