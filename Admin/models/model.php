<?php

class Model
{
    public $conn;
    public function __construct()
    {
        $this->conn = mysqli_connect('localhost', 'root', '', 'ico_web_final', 4306);
    }

    public function getDataF()
    {
        $sql = "SELECT * FROM `ql_noidung`";
        return mysqli_query($this->conn, $sql);
    }
    // lay du leiu link bam
    public function getDatalink()
    {
        $sql = "SELECT * FROM `ql_link`";
        return mysqli_query($this->conn, $sql);
    }

    public function getDataid($id)
    {
        $sql = "SELECT * FROM `ql_noidung` where `id` =  '$id'";
        return mysqli_query($this->conn, $sql);
    }

    public function update($id, $img, $noidung, $tieude, $phanloai, $fsp, $marginp, $sizei, $margini, $update, $video, $sizev, $fontstd, $margintd)
    {
        $sql = "UPDATE `ql_noidung` SET `img`='$img',`useredit`='$update', `noi_dung`='$noidung',`tieu_de`='$tieude',`pl`='$phanloai',`font-styleP`='$fsp',`marginP`='$marginp',`sizei`='$sizei',`margini`='$margini',`video`='$video',`sizev`='$sizev',`font-styletd`='$fontstd',`margintd`='$margintd' WHERE `id`='$id'";
        $result = $this->conn->query($sql);
        if ($result)
            return true;
        return false;
    }

    public function addF($img, $noidung, $tieude, $phanloai, $fsp, $marginp, $sizei, $margini, $note, $video, $sizev, $fontstd, $margintd)
    {
        $sql = "INSERT INTO `ql_noidung`(`img`, `noi_dung`, `id`, `tieu_de`, `pl`, `font-styleP`, `marginP`, `sizei`, `margini`, `note`, `useredit`, `video`, `hide`, `font-styletd`, `margintd`, `sizev`, `marginv`) VALUES ('$img','$noidung','','$tieude','$phanloai', '$fsp','$marginp', '$sizei', '$margini', '$note', '', '$video', 'block', '$fontstd', '$margintd', '$sizev', '')";
        return mysqli_query($this->conn, $sql);
    }
    public function deletebv($id)
    {
        $sql = "DELETE FROM ql_noidung WHERE `ql_noidung`.`id` = $id";
        return mysqli_query($this->conn, $sql);
    }
    public function deleteabv()
    {
        $sql = "DELETE FROM ql_noidung WHERE `ql_noidung`.`hide` = 'none'";
        return mysqli_query($this->conn, $sql);
    }
    public function deleteacttv()
    {
        $sql = "DELETE FROM `ql_trangchu(congtythanhvien)` WHERE `hide` = 'none'";
        return mysqli_query($this->conn, $sql);
    }
    public function deleteaphkh()
    {
        $sql = "DELETE FROM `ql_phanhoi` WHERE `hide` = 'none'";
        return mysqli_query($this->conn, $sql);
    }
    public function getDataU()
    {
        $sql = "SELECT * FROM `user` WHERE 1";
        return mysqli_query($this->conn, $sql);
    }

    public function getDatasp()
    {
        $sql = "SELECT * FROM `ql_sanpham`";
        return mysqli_query($this->conn, $sql);
    }

    public function getDatabaner()
    {
        $sql = "SELECT * FROM `ql_baner` WHERE 1";
        return mysqli_query($this->conn, $sql);
    }

    public function getDatabanerid($id)
    {
        $sql = "SELECT * FROM `ql_baner` WHERE `id` = $id";
        return mysqli_query($this->conn, $sql);
    }

    public function getDatalienhe()
    {
        $sql = "SELECT * FROM `ql_lienhe`";
        return mysqli_query($this->conn, $sql);
    }
    public function addUser($ttdk)
    {
        $level = 2;
        $sql = "INSERT INTO `user`(`id`, `use`, `pass`, `level`, `note`) VALUES ('{$ttdk['use']}','{$ttdk['pass']}','{$ttdk['ten']}', '$level')";
        $result = $this->conn->query($sql);
        //var_dump($r);exit;
        if ($result)
            return true;
        return false;
    }
    public function deletesp($id)
    {
        $sql = "DELETE FROM `ql_sanpham` WHERE `id` = $id";
        return mysqli_query($this->conn, $sql);
    }
    public function deleteasp()
    {
        $sql = "DELETE FROM `ql_sanpham` WHERE `hide` = 'none'";
        return mysqli_query($this->conn, $sql);
    }
    public function addsp($img, $tennuoc, $mota, $ntv, $sdt, $tuyb, $note)
    {
        $sql = "INSERT INTO `ql_sanpham`(`ten_nuoc`, `mo_ta`, `Nguoi_tu_van`, `SDT`, `img`, `tuyb`, `note`) VALUES ('$tennuoc','$mota','$ntv','$sdt','$img', '$tuyb', '$note')";
        return mysqli_query($this->conn, $sql);
    }

    public function getDatause($use)
    {
        $sql = "SELECT * FROM `ql_dangnhap` where `use`='$use'";
        return mysqli_query($this->conn, $sql);
    }
    public function getDatauseid($id)
    {
        $sql = "SELECT * FROM `ql_dangnhap` where `id` = '$id'";
        return mysqli_query($this->conn, $sql);
    }
    public function getDatausea()
    {
        $sql = "SELECT * FROM `ql_dangnhap` WHERE 1";
        return mysqli_query($this->conn, $sql);
    }

    public function updateusel($use, $tt, $tgbd)
    {
        $sql = "UPDATE `ql_dangnhap` SET `tgbd`='$tgbd',`tthai`='$tt' WHERE `use`='$use'";
        $result = $this->conn->query($sql);
        if ($result)
            return true;
        return false;
    }
    public function updateusele($use, $pass,$pq, $id)
    {
        $sql = "UPDATE `ql_dangnhap` SET `use`='$use', `pass`= '$pass',`tthai` = 'off', `pquyen`= '$pq' WHERE `id` = '$id'";
        $result = $this->conn->query($sql);
        //var_dump($r);exit;
        if ($result)
            return true;
        return false;
    }

    public function updateprofile($use, $pass, $tenhh, $img, $id){
        $sql = "UPDATE `ql_dangnhap` SET `use`='$use', `pass`= '$pass', `tenhh`='$tenhh', `img`= '$img' WHERE `id` = '$id'";
        $result = $this->conn->query($sql);
        //var_dump($r);exit;
        if ($result)
            return true;
        return false;
    }

    public function addusel($use, $pass, $pq)
    {
        $sql = "INSERT INTO `ql_dangnhap`(`id`, `use`, `pass`, `tgbd`, `tthai`, `tgdn`, `level`,`img`, `pquyen`) VALUES ('','$use','$pass','','off','','3','unknown.webp', '$pq')";
        return mysqli_query($this->conn, $sql);
    }

    public function updateuselv($use)
    {
        $sql = "UPDATE `ql_dangnhap` SET `tthai`='off' WHERE `use`='$use'";
        $result = $this->conn->query($sql);
        //var_dump($r);exit;
        if ($result)
            return true;
        return false;
    }
    public function getDatakhoahoc()
    {
        $sql = "SELECT * FROM `ql_khoahoc`";
        return mysqli_query($this->conn, $sql);
    }

    public function addlh($img, $tenlop, $lichhoc, $giohoc, $khuvuc, $chinhanh, $phanloai, $note)
    {
        $sql = "INSERT INTO `ql_khoahoc`(`img`, `ten_lop`, `lich_hoc`, `gio_hoc`, `khu_vuc`, `chi_nhanh`, `phan_loai`, `note`) VALUES ('$img','$tenlop','$lichhoc','$giohoc','$khuvuc','$chinhanh','$phanloai', '$note')";
        return mysqli_query($this->conn, $sql);
    }
    public function deletelh($id)
    {
        $sql = "DELETE FROM `ql_khoahoc` WHERE `id` = $id";
        return mysqli_query($this->conn, $sql);
    }
    public function deleteakh()
    {
        $sql = "DELETE FROM `ql_khoahoc` WHERE `hide` = 'none'";
        return mysqli_query($this->conn, $sql);
    }

    public function updatespxkld($id, $img, $tennuoc, $mota, $ntv, $sdt, $note, $tuyb)
    {
        $sql = "UPDATE `ql_sanpham` SET `ten_nuoc`='$tennuoc',`mo_ta`='$mota',`tuyb`='$tuyb',`note`='$note',`Nguoi_tu_van`='$ntv',`SDT`='$sdt',`img`='$img' WHERE `id`= $id";
        $result = $this->conn->query($sql);
        if ($result)
            return true;
        return false;
    }
    public function updatebanner($id, $img, $pl, $note)
    {
        $sql = "UPDATE `ql_baner` SET `baner`='$img',`pl`='$pl',`note`='$note' WHERE `id`=$id";
        $result = $this->conn->query($sql);
        if ($result)
            return true;
        return false;
    }
    public function getDataidsp($idsp)
    {
        $sql = "SELECT * FROM `ql_sanpham` where `id` =  '$idsp'";
        return mysqli_query($this->conn, $sql);
    }
    public function updatekh($id, $img, $tenlop, $lichhoc, $giohoc, $khuvuc, $chinhanh, $phanloai, $note)
    {
        $sql = " UPDATE `ql_khoahoc` SET `img`='$img',`ten_lop`='$tenlop',`lich_hoc`='$lichhoc',`note`='$note',`gio_hoc`='$giohoc',`khu_vuc`='$khuvuc',`chi_nhanh`='$chinhanh',`phan_loai`='$phanloai' WHERE `id`= $id";
        $result = $this->conn->query($sql);
        if ($result)
            return true;
        return false;
    }
    public function getDataidkh($id)
    {
        $sql = "SELECT * FROM `ql_khoahoc` where `id` =  '$id'";
        return mysqli_query($this->conn, $sql);
    }

    public function getDatalh()
    {
        $sql = "SELECT * FROM `ql_lienhe`";
        return mysqli_query($this->conn, $sql);
    }
    // xoa thong tin ttkh
    public function deletettkh($id)
    {
        $sql = "DELETE FROM `lien_he` WHERE `id` = $id";
        return mysqli_query($this->conn, $sql);
    }
    public function deletealh()
    {
        $sql = "DELETE FROM `lien_he` WHERE `hide` = 'none'";
        return mysqli_query($this->conn, $sql);
    }

    public function deleteu($id)
    {
        $sql = "DELETE FROM ql_dangnhap WHERE `ql_dangnhap`.`id` = $id";
        return mysqli_query($this->conn, $sql);
    }
    // lay thong tin footer
    public function getDataFooter()
    {
        $sql = "SELECT * FROM `ql_footer`";
        return mysqli_query($this->conn, $sql);
    }
    // sửa thong tin footer
    public function updatefooter($icon, $mota1, $mota2, $FB, $IN, $YT, $Zalo, $diachi, $mail, $sdt1, $img1, $img2, $img3, $img4, $img5, $img6, $map, $td1, $td2, $note, $stylei)
    {
        $sql = " UPDATE `ql_footer` SET `icon`='$icon',`mo_ta1`='$mota1',`mo_ta2`='$mota2',`link_FB`='$FB',`link_Intagram`='$IN',`link_YT`='$YT',`link_ZALO`='$Zalo',`Diachi`='$diachi',`Mail`='$mail',`SDT`='$sdt1',`img1`='$img1',`img2`='$img2',`img3`='$img3',`img4`='$img4',`img5`='$img5',`img6`='$img6',`link_map`='$map',`tieu_de_trai`='$td1',`tieu_de_phai`='$td2',`note`='$note',`stylei`='$stylei' WHERE `id`= '1'";
        $result = $this->conn->query($sql);
        if ($result)
            return true;
        return false;
    }
    public function updatelink($link, $note)
    {
        $sql = " UPDATE `ql_link` SET `link`='$link',`note`='$note' WHERE `id`= '1'";
        $result = $this->conn->query($sql);
        if ($result)
            return true;
        return false;
    }

    // sửa thong tin liên hệ
    public function updatelienhe($img, $address, $email, $telephone1, $telephone2, $note, $map, $id)
    {
        $sql = " UPDATE `ql_lienhe` SET `img`='$img',`address`='$address',`email`='$email',`telephone1`='$telephone1',`telephone2`='$telephone2',`note`='$note',`map`='$map' WHERE `id`= '$id'";
        $result = $this->conn->query($sql);
        if ($result)
            return true;
        return false;
    }
    //lay thong lien he

    public function getDatattlienhe()
    {
        $sql = "SELECT * FROM `lien_he`";
        return mysqli_query($this->conn, $sql);
    }
    public function getDataw()
    {
        $sql = "SELECT * FROM `ql_web`";
        return mysqli_query($this->conn, $sql);
    }
    public function getDatawid($id)
    {
        $sql = "SELECT * FROM `ql_web` WHERE `id`= $id";
        return mysqli_query($this->conn, $sql);
    }
    public function updatew($icon, $ten, $id)
    {
        $sql = "UPDATE `ql_web` SET `icon`='$icon',`ten`='$ten' WHERE `id`='$id'";
        $result = $this->conn->query($sql);
        if ($result)
            return true;
        return false;
    }
    public function hidebv($id, $log)
    {
        $sql = "UPDATE `ql_noidung` SET`hide`='none', `useredit`='$log' WHERE `id`= $id";
        $result = $this->conn->query($sql);
        if ($result)
            return true;
        return false;
    }
    public function phbv($id)
    {
        $sql = "UPDATE `ql_noidung` SET`hide`='', `useredit`='Admin phục hồi' WHERE `id`= $id";
        $result = $this->conn->query($sql);
        if ($result)
            return true;
        return false;
    }
    public function hidelh($id, $log)
    {
        $sql = "UPDATE `ql_lienhe` SET`hide`='none',  WHERE `id`= $id";
        $result = $this->conn->query($sql);
        if ($result)
            return true;
        return false;
    }
    public function hidesp($id, $log)
    {
        $sql = "UPDATE `ql_sanpham` SET`hide`='none', `note`='$log' WHERE `id`= $id";
        $result = $this->conn->query($sql);
        if ($result)
            return true;
        return false;
    }
    public function phsp($id)
    {
        $sql = "UPDATE `ql_sanpham` SET`hide`='', `note`='Admin phục hồi' WHERE `id`= $id";
        $result = $this->conn->query($sql);
        if ($result)
            return true;
        return false;
    }
    public function phcttv($id)
    {
        $sql = "UPDATE `ql_trangchu(congtythanhvien)` SET`hide`='', `note`='Admin phục hồi' WHERE `id`= $id";
        $result = $this->conn->query($sql);
        if ($result)
            return true;
        return false;
    }
    public function phh2($id)
    {
        $sql = "UPDATE `ql_trangchubaiviet` SET`hide`='', `note`='Admin phục hồi' WHERE `id`= $id";
        $result = $this->conn->query($sql);
        if ($result)
            return true;
        return false;
    }
    public function hidekh($id, $log)
    {
        $sql = "UPDATE `ql_khoahoc` SET `hide`='none', `note`='$log' WHERE `id`= $id";
        $result = $this->conn->query($sql);
        if ($result)
            return true;
        return false;
    }
    public function phkh($id)
    {
        $sql = "UPDATE `ql_khoahoc` SET`hide`='' WHERE `id`= $id";
        $result = $this->conn->query($sql);
        if ($result)
            return true;
        return false;
    }
    public function hideu($id)
    {
        $sql = "UPDATE `ql_dangnhap` SET`hide`='none' WHERE `id`= $id";
        $result = $this->conn->query($sql);
        if ($result)
            return true;
        return false;
    }
    public function getDatawadmin()
    {
        $sql = "SELECT * FROM `ql_web` where `id` = 2";
        return mysqli_query($this->conn, $sql);
    }

    public function hideh2($id, $log)
    {
        $sql = "UPDATE `ql_trangchubaiviet` SET`hide`='none', `useredit`='$log' WHERE `id`= $id";
        $result = $this->conn->query($sql);
        if ($result)
            return true;
        return false;
    }
    
    public function hidecttv($id, $log)
    {
        $sql = "UPDATE `ql_trangchu(congtythanhvien)` SET`hide`='none', `note`='$log' WHERE `id`= $id";
        $result = $this->conn->query($sql);
        if ($result)
            return true;
        return false;
    }
    public function hidephkh($id, $log)
    {
        $sql = "UPDATE `ql_phanhoi` SET`hide`='none', `note`='$log' WHERE `id`= $id";
        $result = $this->conn->query($sql);
        if ($result)
            return true;
        return false;
    }
    public function deletehome2($id)
    {
        $sql = "DELETE FROM `ql_trangchubaiviet` WHERE `id` = $id";
        return mysqli_query($this->conn, $sql);
    }
    public function deleteah2()
    {
        $sql = "DELETE FROM `ql_trangchubaiviet` WHERE `hide` = 'none'";
        return mysqli_query($this->conn, $sql);
    }

    public function updatehome2($id, $img, $noidung, $tieude, $fsp, $marginp, $sizei, $margini, $note, $video, $sizev, $fontstd, $margintd)
    {
        $sql = "UPDATE `ql_trangchubaiviet` SET `tieu_de`='$tieude',`noi_dung`='$noidung',`img`='$img',`video`='$video',`sizev`='$sizev',`note`='$note',`font-styleP`='$fsp',`marginP`='$marginp',`sizei`='$sizei',`margini`='$margini',`font-styletd`='$fontstd',`margintd`='$margintd' WHERE `id`= '$id'";
        $result = $this->conn->query($sql);
        if ($result)
            return true;
        return false;
    }

    public function getqltrangchu2id($id)
    {
        $sql = "SELECT * FROM `ql_trangchubaiviet` where `id` =  '$id'";
        return mysqli_query($this->conn, $sql);
    }
    public function getqltrangchu2()
    {
        $sql = "SELECT * FROM `ql_trangchubaiviet`";
        return mysqli_query($this->conn, $sql);
    }
    public function addhome2($tieude, $noidung, $img, $video, $note, $fsp, $marginp, $sizei, $margini, $sizev, $fontstd, $margintd)
    {
        $sql = "INSERT INTO `ql_trangchubaiviet`(`id`, `tieu_de`, `noi_dung`, `img`, `video`, `note`, `font-styleP`, `marginP`, `sizei`, `margini`, `useredit`, `sizev`, `font-styletd`, `margintd`) VALUES ('','$tieude','$noidung','$img','$video','$note','$fsp','$marginp','$sizei','$margini','', '$sizev', '$fontstd', '$margintd')";
        return mysqli_query($this->conn, $sql);
    }
    public function getqltrangchu3(){
        $sql = "SELECT * FROM `ql_trangchu(congtythanhvien)`";
        return mysqli_query($this->conn,$sql);
    }

    public function addcttv($img, $ten, $chucvu, $chinhanh, $mail, $linkFB, $linkZalo, $note){
        $sql = "INSERT INTO `ql_trangchu(congtythanhvien)`(`img`, `ten`, `chucvu`, `chinhanh`, `mail`, `linkFB`, `linkZalo`, `note`) VALUES ('$img','$ten','$chucvu','$chinhanh','$mail','$linkFB','$linkZalo', '$note')";
        return mysqli_query($this->conn,$sql);
    }
    public function updatecttv($id, $img, $ten, $chucvu, $chinhanh, $mail, $linkFB, $linkZalo, $note){
        $sql = " UPDATE `ql_trangchu(congtythanhvien)` SET `img`='$img',`ten`='$ten',`chucvu`='$chucvu',`chinhanh`='$chinhanh',`mail`='$mail',`linkFB`='$linkFB',`linkZalo`='$linkZalo',`note`='$note' WHERE `id`= '$id'";
        $result = $this->conn->query($sql);
        if($result) return true;
        return false;
    }
    public function deletecttv($id){
        $sql = "DELETE FROM `ql_trangchu(congtythanhvien)` WHERE `id` = $id";
        return mysqli_query($this->conn,$sql);
    }
    public function getDataidcttv($id){
        $sql = "SELECT * FROM `ql_trangchu(congtythanhvien)` where `id` =  '$id'";
        return mysqli_query($this->conn,$sql);
    }

    public function getqlphanhoi(){
        $sql = "SELECT * FROM `ql_phanhoi`";
        return mysqli_query($this->conn,$sql);
    }

    public function addph($img, $tenkhachhang, $nghenghiep, $danhgia, $noidung, $note){
        $sql = "INSERT INTO `ql_phanhoi`(`img`, `tenkhachhang`, `nghenghiep`, `danhgia`, `noidung`, `note`) VALUES ('$img','$tenkhachhang','$nghenghiep','$danhgia','$noidung', '$note')";
        return mysqli_query($this->conn,$sql);
    }

    public function deleteph($id){
        $sql = "DELETE FROM `ql_phanhoi` WHERE `id` = $id";
        return mysqli_query($this->conn,$sql);
    }
    public function updatephanhoi($id, $img, $tenkhachhang, $nghenghiep, $danhgia, $noidung, $note){
        $sql = " UPDATE `ql_phanhoi` SET `img`='$img',`tenkhachhang`='$tenkhachhang',`nghenghiep`='$nghenghiep',`danhgia`='$danhgia',`noidung`='$noidung',`note`='$note' WHERE `id`= '$id'";
        $result = $this->conn->query($sql);
        if($result) return true;
        return false;
    }
    public function getDataidph($idph){
        $sql = "SELECT * FROM `ql_phanhoi` where `id` =  '$idph'";
        return mysqli_query($this->conn,$sql);
    }
    public function getqltrangchu1(){
        $sql = "SELECT * FROM `ql_trangchu(du_kieu_cung)`";
        return mysqli_query($this->conn,$sql);
    }
    public function updatetrangchu1($porter, $tieu_de, $mo_ta, $img2, $nampt, $sochinhanh, $quocgiahiendien, $nhanvien, $note){
        $sql = " UPDATE `ql_trangchu(du_kieu_cung)` SET `porter`='$porter',`tieu_de`='$tieu_de',`mo_ta`='$mo_ta',`img2`='$img2',`nampt`='$nampt',`sochinhanh`='$sochinhanh',`quocgiahiendien`='$quocgiahiendien',`nhanvien`='$nhanvien',`note`='$note' WHERE `id`= '1'";
        $result = $this->conn->query($sql);
        if($result) return true;
        return false;
    }
    public function getDataidtrangchu1($idtc){
        $sql = "SELECT * FROM `ql_trangchu(du_kieu_cung)` where `id` =  '$idtc'";
        return mysqli_query($this->conn,$sql);
    }
    public function hidelienhe($id, $log)
    {
        $sql = "UPDATE `lien_he` SET`hide`='none', `note`='$log' WHERE `id`= $id";
        $result = $this->conn->query($sql);
        if ($result)
            return true;
        return false;
    }
    public function phlienhe($id)
    {
        $sql = "UPDATE `lien_he` SET`hide`='', `note`='Admin phục hồi' WHERE `id`= $id";
        $result = $this->conn->query($sql);
        if ($result)
            return true;
        return false;
    }
    public function phphkh($id)
    {
        $sql = "UPDATE `ql_phanhoi` SET`hide`='', `note`='Admin phục hồi' WHERE `id`= $id";
        $result = $this->conn->query($sql);
        if ($result)
            return true;
        return false;
    }
    // Lấy dữ liệu theo thứ tự đã sắp xếp
    public function getDatasapxep()
    {
        $sql = "SELECT * FROM ql_noidung WHERE hide != 'none' ORDER BY `order` ASC";
        return $this->conn->query($sql); 
    }
    public function getDatasapxephome2()
    {
        $sql = "SELECT * FROM ql_trangchubaiviet WHERE hide != 'none' ORDER BY `order` ASC";
        return $this->conn->query($sql);
    }

    // Cập nhật thứ tự sắp xếp
    public function updateOrder($id, $position)
    {
        $sql = "UPDATE ql_noidung SET `order` = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $position, $id);
        $stmt->execute();
        $stmt->close();
    }
    public function updateOrderhome2($id, $position)
    {
        $sql = "UPDATE ql_trangchubaiviet SET `order` = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $position, $id);
        $stmt->execute();
        $stmt->close();
    }
    public function anthongtin($id)
    {
        $sql = "UPDATE `ql_anthongtin` SET `hide`='none' WHERE id = '$id'";
        return mysqli_query($this->conn, $sql);
    }
    public function hienthongtin($id)
    {
        $sql = "UPDATE `ql_anthongtin` SET `hide`='' WHERE id = '$id'";
        return mysqli_query($this->conn, $sql);
    }
    public function getanhienthongtin()
    {
        $sql = "SELECT * FROM `ql_anthongtin`";
        return mysqli_query($this->conn, $sql);
    }

}

?>