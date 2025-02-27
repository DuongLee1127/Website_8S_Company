<?php
class View{
    public function getPageHome(){
        include_once 'templates/index.php';
    }

    public function dhduc(){
        include_once 'templates/duc.php';
    }
    public function dhnb(){
        include_once 'templates/nb.php';
    }
    public function dhdl(){
        include_once 'templates/dl.php';
    }
    public function dhuc(){
        include_once 'templates/uc.php';
    }
    public function dhhq(){
        include_once 'templates/hq.php';
    }
    public function xkgt(){
        include_once 'templates/xkduc.php';
    }
    public function xksp(){
        include_once 'templates/xknb.php';
    }
    public function nnhq(){
        include_once 'templates/tiengnhatn1.php';
    }
    public function nnduc(){
        include_once 'templates/tiengduca1.php';
    }
    public function contact(){
        include_once 'templates/contact.php';
    }


}

?>