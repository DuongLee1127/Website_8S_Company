<aside class="sidebar">
    <?php
    require_once "models/model.php";
    $model = new Model();
    $row = mysqli_fetch_assoc($model->getDatause($_SESSION['use']));
    $pq = explode("|", $row['pquyen']);
?>
    <nav>
        <ul>
            <li class="nav-level">--- Điều khiển</li>
            <li class="nav-content"><a href="index.php?task=pageHome" class="abc1"><i
                        class="fa-solid fa-chalkboard"></i><span>Bảng
                        điều
                        khiển</span></a>
            </li>
            <li class="nav-level">--- Thành phần</li>
            <?php
            if ($row['level'] == 1 || (!empty($pq[0]) && $pq[0] == "true")) {
                echo '<li class="nav-content"><a href="index.php?task=qlweb" class="abc1"><i class="fa-solid fa-earth-americas"></i><span>Quản lý
                        website</span></a>
            </li>';
            }
            if ($row['level'] == 1 || (!empty($pq[7]) && $pq[7] == "true")) {
                echo '<li class="nav-content"><a href="index.php?task=qlbaner" class="abc1"><i
                        class="fa-solid fa-image"></i><span>Quản lý banner</span></a>
            </li>';
            }
            if ($row['level'] == 1 || (!empty($pq[6]) && $pq[6] == "true")) {
                echo '<li class="nav-content dropdown"><a href="#" class="dropdown-js abc1"><i class="fa-solid fa-house"></i><span>Quản lý trang chủ</span><i
                        class="fa-solid fa-caret-down"></i></a>
                <ul class="dropdown-menu show-drop">
                    <li><a href="index.php?task=qltrchu1" class="menu-item">
                            <span>Phần đầu trang</span>
                        </a>
                    </li>
                    <li><a href="index.php?task=qlhome2" class="menu-item">
                            <span>Phần thân trang</span>
                        </a>
                    </li>
                    <li><a href="index.php?task=qlctytv" class="menu-item">
                            <span>Quản lý
                            cty thành viên hiển thị ở trang chủ</span>
                        </a>
                    </li>
                    <li><a href="index.php?task=qlphanhoi" class="menu-item">
                            <span>Phản hồi khách hàng</span>
                        </a>
                    </li>
                </ul>
            </li>';
            }
            if ($row['level'] == 1 || (!empty($pq[1]) && $pq[1] == "true")) {
                echo '<li class="nav-content dropdown"><a href="#" class="dropdown-js abc1"><i
                        class="fa-solid fa-clipboard"></i><span>Quản lý
                        bài viết</span><i class="fa-solid fa-caret-down"></i></a>
                <ul class="dropdown-menu show-drop">
                    <li><a href="index.php?task=ht&ct=xkldnhat" class="menu-item">
                            <span>Giới thiệu xuất khẩu lao động</span>
                        </a>
                    </li>
                    <li><a href="index.php?task=ht&ct=dhduc" class="menu-item">
                            <span>Du học Đức</span>
                        </a>
                    </li>
                    <li><a href="index.php?task=ht&ct=dhuc" class="menu-item">
                            <span>Du học Úc</span></a>
                    </li>
                    <li><a href="index.php?task=ht&ct=dhnb" class="menu-item">
                            <span>Du học Nhật Bản</span></a>
                    </li>
                    <li><a href="index.php?task=ht&ct=dhdl" class="menu-item">
                            <span>Du học Đài Loan</span></a>
                    </li>
                    <li><a href="index.php?task=ht&ct=dhhq" class="menu-item">
                            <span>Du học Hàn Quốc</span></a>
                    </li>
                    <li><a href="index.php?task=ht&ct=lopduc" class="menu-item">
                            <span>Lớp khóa học tiếng Đức</span></a>
                    </li>
                    <li><a href="index.php?task=ht&ct=lophan" class="menu-item">
                            <span>Lớp khóa học tiếng Hàn</span></a>
                    </li>
                </ul>
            </li>';
            }
            if ($row['level'] == 1 || (!empty($pq[2]) && $pq[2] == "true")) {
                echo '<li class="nav-content"><a href="index.php?task=qlsp" class="abc1"><i class="fa-solid fa-shop"></i><span>Quản lý
                        sản phẩm</span></a></li>';
            }
            if ($row['level'] == 1 || (!empty($pq[3]) && $pq[3] == "true")) {
                echo '<li class="nav-content dropdown"><a href="#" class="dropdown-js abc1"><i class="fa-solid fa-book"></i><span>Quản lý khóa học</span><i
                        class="fa-solid fa-caret-down"></i></a>
                <ul class="dropdown-menu show-drop">
                    <li><a href="index.php?task=qlkh&kh=lopduc" class="menu-item">
                            <span>Lớp học tiếng Đức</span>
                        </a>
                    </li>
                    <li><a href="index.php?task=qlkh&kh=lophan" class="menu-item">
                            <span>Lớp học tiếng Hàn</span>
                        </a>
                    </li>
                </ul>
            </li>';
            }
            if ($row['level'] == 1 || (!empty($pq[4]) && $pq[4] == "true")) {
                echo '<li class="nav-content"><a href="index.php?task=qlfooter" class="abc1"><i class="fa-solid fa-bookmark"></i><span>Quản lý
                        Footer</span></a>
            </li>';
            }

            if ($row['level'] == 1 || (!empty($pq[5]) && $pq[5] == "true")) {
                echo '<li class="nav-content"><a href="index.php?task=qllh" class="abc1"><i class="fa-solid fa-comment"></i><span>Quản lý
                        liên hệ</span></a>
            </li>';
            }
            
            if ($row['level'] == 1 || (!empty($pq[8]) && $pq[8] == "true")) {
                echo '<li class="nav-content"><a href="index.php?task=qlu" class="abc1"><i class="fa-solid fa-circle-user"></i><span>Admin</span></a>
            </li>';
                //             echo '<li class="nav-content"><a href="index.php?task=qlvet" class="abc1"><i class="fa-solid fa-file"></i><span>Vết người dùng</span></a>
                // </li>';
            }
            ?>
            <li class="nav-level">--- Thêm</li>


        </ul>
    </nav>
</aside>