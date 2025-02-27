

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
            <h2>Chào mừng đến với trang admin</h2>
        </main>
    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>