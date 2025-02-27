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
            <div class="admin-dashboard">
                <h2 class="text-center mb-4">Sửa thông tin liên hệ</h2>
                <form action="" method="post" id="formId">
                <?php
                require_once 'models/model.php';
                $model = new Model();
                $getid =1;
                $result = mysqli_fetch_assoc($model->getDatalh($getid));

                ?>
                    <!-- Hình ảnh -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Hình ảnh </label>
                        <input type="text" class="form-control" name="img" id="image" value="<?php echo $result['img'] ?>">
                    </div>
                   
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label"> Address </label>
                        <textarea class="form-control"  name="address" placeholder="" ><?php echo $result['address']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Mail </label>
                        <textarea class="form-control"  name="email" placeholder=""><?php echo $result['email']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Telephone1 </label>
                        <textarea class="form-control"  name="telephone1" placeholder=""><?php echo $result['telephone1']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Telephone2 </label>
                        <textarea class="form-control"  name="telephone2" placeholder=""><?php echo $result['telephone2']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detailedContent" class="form-label">Link map</label>
                        <textarea class="form-control"  name="map" placeholder=""><?php echo $result['map']; ?></textarea>
                    </div>
                    
                    <!-- Nút hành động -->
                    <div class="d-flex justify-content-end btnnn">
                        <button type="submit" name="editlienhe" class="btn btn-primary">Sửa</button>
                        
                    </div>
                </form>

                

            </div>
        </main>
    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>