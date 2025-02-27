<?php
require_once "templates/header.php";
?>
    <style>

        .posts-table {
            display: block;
            max-width: 800px;
            max-height: 50vh;
        }
        .qlu {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .vet td{
            width: 800px;
            justify-content: flex-start;
            display: flex;
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
            <form class="admin-dashboard" method="post">
                <div>
                    
                    <main class="main-content">
                        <div class="d-flex justify-content-end them">
                            <a href="index.php?task=themu" class="btn btn-primary ht">Thêm User</a>
                        </div>
                        <section id="posts" class="posts-section">
                            
                            <h2>Admin</h2>
                            <div class="qlu">
                                <table class="posts-table"
                                style="border-collapse: collapse; border: 1px solid #ddd;">
                                <thead>
                                    <tr style="background-color: #f4f4f4;">
                                        <th>ID</th>
                                        <th>Tên đăng nhập</th>
                                        <th>Mật khẩu</th>
                                        <th>Tên hiện hành</th>
                                        <th>Trạng thái</th>
                                        <th>Đăng nhập lần cuối</th>
                                        <th>Avatar</th>
                                        <th>Tính năng</th>
                                        <th><button type="submit" id="xndu" onclick="confirmDeletecbu()" class="btn btn-delete">Xóa Use</button></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once 'models/model.php';
                                    $model = new Model();
                                    $result = $model->getDatausea();
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if ($row['level'] != 1 && $row['hide'] != "none") {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['use']; ?></td>
                                                <td>
                                                    <?php echo nl2br($row['pass']); ?>
                                                </td>
                                                <td>
                                                    <?php echo nl2br($row['tenhh']); ?>
                                                </td>
                                                <td>
                                                    <img src="assets/img/<?php if($row['tthai'] == 'off') echo "off.png"; else echo "onl.png"; ?>" alt="" width="10px" height="10px">
                                                </td>
                                                <td>
                                                    <?php if($row['tthai'] == 'off') echo nl2br($row['tgbd']); else echo "Hiện đang hoạt động"; ?>
                                                </td>
                                                <td class="tdimg"><img src="assets/profile/<?php echo $row['img']; ?>" style="width: 30px; height: 30px;" alt="ảnh"></td>
                                                <td class="tinhnang">
                                                    <a href="index.php?task=themu&idsuau=<?php echo $row['id']; ?>"
                                                        class="btn btn-edit">Sửa</a>
                                                    <a href="javascript:void(0)"
                                                        onclick="confirmDeleteuse('<?php echo $row['id'] ?>')" class="btn btn-delete">Xóa</a>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="idcbu[]" value="<?php echo $row['id'] ?>">
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    // if (isset($_GET['id']))
                                    //     $model->deletebv($_GET['id']);

                                    ?>


                                </tbody>
                            </table>
                            <table class="posts-table"
                                style=" border-collapse: collapse; border: 1px solid #ddd;">
                                <thead>
                                    <tr style="background-color: #f4f4f4;">
                                        <th>Vết Users</th>
                                    </tr>
                                </thead>
                                <tbody class="vet">
                                    <?php
                                    $logFile = "assets/log/vet.log";
                                    if (file_exists($logFile)) {
                                        $logData = file_get_contents($logFile);
                                      
                                    } else {
                                        $logData = "Tệp log không tồn tại.";
                                    }
                                    $logData1 = explode("\n", $logData);
                                
                                    for ($id1 = count($logData1)-1; $id1 >= 0; $id1--) {
                                 
                                        ?>
                                            <tr>
                                                <td><?php echo $logData1[$id1]; ?></td>
                                            </tr>
                                            <?php
                                        
                                    }
                                    // if (isset($_GET['id']))
                                    //     $model->deletebv($_GET['id']);

                                    ?>


                                </tbody>
                            </table>
                            </div>
                            
                        </section>
                    </main>
                </div>
            </form>
        </main>
    </div>
    </form>
    </main>
    </div>

    <script src="assets/js/script.js?v=4"></script>
</body>

</html>