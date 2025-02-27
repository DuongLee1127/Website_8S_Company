<?php
require_once "templates/header.php";
?>
    <style>
        .posts-table {
            display: block;
            width: calc(100vw - 260px);
            height: calc(100vh - 180px);
            overflow: hidden scroll;
        }

        td {
            width: calc(100vw - 230px);
        }
        .tinhnang {
            width: 300px;
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
                            
                            <h2>Truy vết user</h2>
                            <table class="posts-table"
                                style=" border-collapse: collapse; border: 1px solid #ddd;">
                                <thead>
                                    <tr style="background-color: #f4f4f4;">
                                        <th>Nội dung</th>
                                        <th>Tính năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $logFile = "assets/log/vet.log";
                                    if (file_exists($logFile)) {
                                        $logData = file_get_contents($logFile);
                                      
                                    } else {
                                        $logData = "Tệp log không tồn tại.";
                                    }
                                    $logData1 = explode("\n", $logData);
                                
                                    for ($id1 = 0; $id1 < count($logData1); $id1++) {
                                        ?>
                                            <tr>
                                                <td><?php echo $logData1[$id1]; ?></td>
                                            <td class="tinhnang">
                                                <a href="index.php?task=suaw&idsuaw=<?php echo $row['id']?>"
                                                    class="btn btn-edit">Phục hồi</a>
                                                <a href="#"
                                                    class="btn btn-delete">Xóa vĩnh viễn</a>
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