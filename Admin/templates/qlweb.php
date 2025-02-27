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

                            <h2>Quản lý Website</h2>
                            <table class="posts-table"
                                style="width: 100%;height: 50%; border-collapse: collapse; border: 1px solid #ddd;">
                                <thead>
                                    <tr style="background-color: #f4f4f4;">
                                        <th>Tên Website</th>
                                        <th>Logo</th>
                                        <th>Trang</th>
                                        <th>Tính năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once 'models/model.php';
                                    $model = new Model();
                                    $result = $model->getDataw();
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                    <tr>
                                        <td><?php echo $row['ten']; ?></td>
                                        <td class="tdimg"><img src="<?php echo $row['icon']; ?>" alt="ảnh"></td>
                                        <td><?php echo $row['trang']; ?></td>
                                        <td class="tinhnang">
                                            <a href="index.php?task=suaw&idsuaw=<?php echo $row['id']?>"
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
                            <h2>Quản lý link</h2>
                            <table class="posts-table"
                                style="width: 100%;height: 25%; border-collapse: collapse; border: 1px solid #ddd;">
                                <thead>
                                    <tr style="background-color: #f4f4f4;">
                                        <th>link</th>
                                        <th>note</th>
                                        <th>Tính năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once 'models/model.php';
                                    $model = new Model();
                                    $result = $model->getDatalink();
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                    <tr>
                                        <td><?php echo $row['link']; ?></td>
                                        <td><?php echo $row['note']; ?></td>
                                        <td class="tinhnang">
                                            <a href="index.php?task=sualink" class="btn btn-edit">Sửa</a>
                                        </td>
                                    </tr>
                                    <?php

                                    }
                                    // if (isset($_GET['id']))
                                    //     $model->deletebv($_GET['id']);
                                    
                                    ?>


                                </tbody>
                            </table>
                            <h2>Quản lý ẩn hiện</h2>
                            <table class="posts-table"
                                style="width: 100%;height: 25%; border-collapse: collapse; border: 1px solid #ddd;">
                                <thead>
                                    <tr style="background-color: #f4f4f4;">
                                        <th>Tên trang web ẩn</th>
                                        <th>Trang thái</th>
                                        <th>Tính năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once 'models/model.php';
                                    $model = new Model();
                                    $result = $model->getanhienthongtin();
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                    <tr>
                                        <td><?php if($row['ten']==='anthongtin1'){ 
                                            echo "Trang công ty thành viên";
                                        }elseif($row['ten']==='anthongtin2'){
                                            echo"Trang phản hồi của khách hàng";
                                        } ?></td>
                                        <td><?php if($row['hide']==='none'){ 
                                            echo "Dữ liệu đang ẩn";
                                        }else{
                                            echo"Dữ liệu đang hiện";
                                        } ?></td>
                                        <td class="tinhnang">
                                            <a href="index.php?task=qlweb&idan=<?php echo $row['id']; ?>"
                                                class="btn btn-delete">Ẩn
                                            </a>
                                            <a href="index.php?task=qlweb&idhien=<?php echo $row['id']; ?>"
                                                    class="btn btn-edit">Hiện
                                                </a>
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