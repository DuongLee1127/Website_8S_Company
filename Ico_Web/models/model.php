<?php

class Model{
    public $conn;
    public function __construct(){
        $this->conn = mysqli_connect('localhost', 'root', '','ico_web_final', 4306);
    }

    public function getDataF(){
        $sql = "SELECT * FROM `ql_noidung`";
        return mysqli_query($this->conn,$sql);
    }
    //lay du lieu link lien kết
    public function getDatalink(){
        $sql = "SELECT * FROM `ql_link`";
        return mysqli_query($this->conn,$sql);
    }

    public function getDatasanpham(){
        $sql = "SELECT * FROM `ql_sanpham`";
        return mysqli_query($this->conn,$sql);
    }

    public function getDatabanerten($id){
        $sql = "SELECT `baner`, `pl`, `id` FROM `ql_baner` WHERE `pl`='$id'";
        return mysqli_query($this->conn,$sql);
    }
    public function getDatakhoahoc(){
        $sql = "SELECT * FROM `ql_khoahoc`";
        return mysqli_query($this->conn,$sql);
    }
    public function luuttkh($name, $email, $std, $fb, $diachi){
        $sql = "INSERT INTO `lien_he`(`id`, `Ten`, `SDT`, `Diachi`, `Email`, `FB`) VALUES ('','$name','$std','$diachi','$email','$fb')";
        return mysqli_query($this->conn,$sql);
    }
    public function getDataFooter(){
        $sql = "SELECT * FROM `ql_footer`";
        return mysqli_query($this->conn,$sql);
    }

    public function getDatalienhe(){
        $sql = "SELECT * FROM `ql_lienhe`";
        return mysqli_query($this->conn,$sql);
    }
    
    public function getDatawu()
    {
        $sql = "SELECT * FROM `ql_web` where `id` = 1";
        return mysqli_query($this->conn, $sql);
    }
    public function getDatawui()
    {
        $sql = "SELECT * FROM `ql_web` where `id` = 3";
        return mysqli_query($this->conn, $sql);
    }
    public function getqltrangchu2(){
        $sql = "SELECT * FROM `ql_trangchubaiviet`";
        return mysqli_query($this->conn,$sql);
    }
    public function getqltrangchu3(){
        $sql = "SELECT * FROM `ql_trangchu(congtythanhvien)`";
        return mysqli_query($this->conn,$sql);
    }
    public function getqltrangchu1(){
        $sql = "SELECT * FROM `ql_trangchu(du_kieu_cung)`";
        return mysqli_query($this->conn,$sql);
    }
    public function getqlphanhoi(){
        $sql = "SELECT * FROM `ql_phanhoi`";
        return mysqli_query($this->conn,$sql);
    }
    public function getDatasapxep()
     {
         $sql = "SELECT * FROM ql_noidung WHERE hide != 'none' ORDER BY `order` ASC";
         return $this->conn->query($sql);
     }
     public function getDatasapxeptrangchu()
     {
         $sql = "SELECT * FROM ql_trangchubaiviet WHERE hide != 'none' ORDER BY `order` ASC";
         return $this->conn->query($sql);
     }
     public function getDataanthongtin(){
        $sql = "SELECT * FROM `ql_anthongtin`";
        return mysqli_query($this->conn,$sql);
    }

}

?>