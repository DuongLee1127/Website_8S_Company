<header class="header">
        <a href="../Ico_Web" target="_blank" class="logo"><img class="img-fluid able-logo" src="https://lh3.googleusercontent.com/pw/AP1GczOP6fUst1ZQrf3L-XPUmJIZFw_g5dPuuZnfLEswWuls0vOg6gFjxTMD_FHuQsWAVxqlHr2_xMPJDmmKoF9HO45CKdoikdvBtjrasDWEdCV4QxYDfmrW4p3vEFAzYeEyctCW67Ij51HppMzHLcKVny_PFg=w1355-h590-s-no-gm?authuser=1"
                alt="Theme-logo"></a>
        <div class="navbar">
            <a href="#!" class="sidebar-toggle"> <span class="material-symbols-outlined">
                    menu
                </span></a>
            <div class="navbar-custom">
                <ul class="item-nav">
                    <li class="dropdown"><a href="#!" class="dropdown-toggle dropdown-js"><i
                                class="fa-regular fa-bell"></i>
                        </a>
                        <ul class="dropdown-menu show-drop">
                            <li>
                                <p class="heading-text">You have 4 new notifications.</p>
                            </li>
                            <li><a href="#" class="menu-item">
                                    <div class="item-img"><img src="assets/img/acb.jpg" alt=""></div>
                                    <div class="item-text">
                                        <h3>Lisa sent you a mail</h3>
                                        <p>2min ago</p>
                                    </div>
                                </a>
                            </li>
                            <li><a href="#" class="menu-item">
                                    <div class="item-img"><img src="assets/img/acb.jpg" alt=""></div>
                                    <div class="item-text">
                                        <h3>Lisa sent you a mail</h3>
                                        <p>2min ago</p>
                                    </div>
                                </a>
                            </li>
                            <li><a href="#" class="menu-item">
                                    <div class="item-img"><img src="assets/img/acb.jpg" alt=""></div>
                                    <div class="item-text">
                                        <h3>Lisa sent you a mail</h3>
                                        <p>2min ago</p>
                                    </div>
                                </a>
                            </li>
                            <li><a href="" class="see-more">See all notifications</a></li>
                        </ul>
                    </li>
                    <?php 
                    require_once "models/model.php";  
                    $model = new Model();
                    $row = mysqli_fetch_assoc($model->getDatause($_SESSION['use'])); ?>
                    <li class="dropdown"><a href="#!" class="dropdown-toggle2 dropdown-js">
                            <div><img src="assets/profile/<?php if(!empty($row['img']))echo $row['img'];else echo "unknown.webp" ?>" width="40px" height="40px" style="border-radius: 50%;">
                            </div>
                            <div>
                                
                                 <span><?php
                                    echo $row['tenhh'];
                                    ?></span><i class="fa-solid fa-chevron-down"></i></div></i>
                        </a>
                        <ul class="dropdown-menu2 show-drop">
                            <li>
                                <a href="index.php?task=profile"><i class="fa-regular fa-user"></i>
                                    <span>Profile</span></a>
                            </li>
                            <li class="blur">
                                <div></div>
                            </li>
                            <li>
                                <a href="index.php?task=login"><i class="fa-solid fa-power-off"></i>
                                    <span>Logout</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

    </header>