<?php

use function PHPSTORM_META\map;

ob_start();
require_once "models/model.php";
require_once "views/view.php";
class Controller
{
	var $model, $view, $useLogin, $uploadfile;
	function __construct()
	{
		$this->model = new Model();
		$this->view = new View();
		$directory = __DIR__;
		$pathParts = explode(DIRECTORY_SEPARATOR, $directory);
		$this->directory1 = $pathParts[count($pathParts) - 3];
		$this->uploadfile = "assets/profile/";
	}
	var $logFile = "assets/log/vet.log";

	public function saveLog($logFile, $content)
	{
		file_put_contents($logFile, $content, FILE_APPEND);
	}

	public function getPageHome()
	{
		$this->view->getPageHome();
	}
	public function profile()
	{
		$this->view->profile();
	}
	public function them()
	{
		$this->view->them();
	}
	public function qlwebsite()
	{
		$this->view->qlwebsite();
	}
	public function suawebsite()
	{
		$this->view->suawebsite();
	}
	public function sualink()
	{
		$this->view->sualink();
	}
	public function edit()
	{
		$this->view->edit();
	}
	public function editw($icon, $ten, $id)
	{
		if ($this->model->updatew($icon, $ten, $id)) {
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$time = date("Y-m-d H:i:s");
			$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Sửa tên, icon website ID: $id" . "\n";
			$this->saveLog($this->logFile, $log);
			header("location: index.php?task=qlweb");
		} else
			echo "<script>alert('Sửa không thành công')</script>";
	}
	public function ttkh()
	{
		$this->view->ttkh();
	}
	public function login()
	{
		// if (isset($_SESSION['use']))
		// 	unset($_SESSION['use']);
		// // setcookie('use', "", time()-(86400*30), "/");
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		if (isset($_SESSION['use'])) {
			$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Đăng xuất" . "\n";
			$this->saveLog($this->logFile, $log);
			$this->model->updateuselv($_SESSION['use']);
			unset($_SESSION['use']);
			unset($_SESSION['tenhh']);
			unset($_SESSION['iduse']);
		}

		if (isset($_SESSION['level'])) {
			unset($_SESSION['level']);
		}
		$this->view->login();
	}
	public function ht()
	{

		$this->view->ht();
	}
	public function qlu()
	{
		$this->view->checku();
		$this->view->qlu();
	}

	public function qlsp()
	{
		$this->view->qlsp();
	}
	public function themsp()
	{
		$this->view->themsp();
	}
	public function themu()
	{
		$this->view->themu();
	}
	public function suabaner()
	{
		$this->view->suabaner();
	}
	public function getusel($id)
	{
		return  $this->model->getDatauseid($id);
	}

	public function baner()
	{
		$this->view->baner();
	}
	public function qlvet()
	{
		$this->view->qlvet();
	}
	public function qlctytv()
	{
		$this->view->qlctytv();
	}

	public function tcttv()
	{
		$this->view->tcttv();
	}

	public function deletecttv($id)
	{

		$this->model->deletecttv($id);
	}

	public function qlphanhoi()
	{
		$this->view->qlphanhoi();
	}

	public function themph()
	{
		$this->view->themph();
	}

	public function deleteph($id)
	{
		$this->model->deleteph($id);
	}
	public function editphanhoi()
	{
		$this->view->editphanhoi();
	}
	public function qltrchu1()
	{
		$this->view->qltrchu1();
	}

	public function edittrangchu1()
	{
		$this->view->edittrangchu1();
	}

	public function updateprof()
	{
		$ten = !empty($_POST['ten']) ? true : false;
		$img = (isset($_FILES["img"]) && !$_FILES["img"]["error"]) ? true : false;
		$tennd = !empty($_POST['tennd']) ? true : false;
		$mk = !empty($_POST['mk']) ? true : false;
		$current_file = !empty($_POST['current_file']) ? $_POST['current_file'] : "unknown.webp";
		$row = mysqli_fetch_assoc($this->model->getDatause($_SESSION['use']));
		if ($ten && $tennd && $mk) {
			if ($img) {
				$file_tmp_path = $_FILES['img']['tmp_name'];
				$file = $_FILES["img"]["name"];
				$imageFileType = pathinfo($file, PATHINFO_EXTENSION);

				$check = getimagesize($_FILES["img"]["tmp_name"]);
				if ($check === false) {
					echo '<script>alert("File bạn chọn không phải là ảnh.")</script>';
					return;
				}
				$new_file_name = "file_" . time() . "." . $imageFileType;
				$destination = $this->uploadfile . $new_file_name;
				if ($this->model->updateprofile($_POST['ten'], $_POST['mk'], $_POST['tennd'], $new_file_name, $row['id']) && move_uploaded_file($file_tmp_path, $destination)) {
					echo '<script>alert("Cập nhật thành công")</script>';
				} else
					echo '<script>alert("Cập nhật không thành công")</script>';
			} else {
				if ($this->model->updateprofile($_POST['ten'], $_POST['mk'], $_POST['tennd'], $current_file, $row['id'])) {
					echo '<script>alert("Cập nhật thành công")</script>';
				} else
					echo '<script>alert("Cập nhật không thành công")</script>';
			}

		} else {
			echo '<script>alert("Không được để trống")</script>';
		}
	}
	var $directory1;
	public function hidelienhe($id)
	{

		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
		$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Xóa liên hệ ID: $id" . "\n";
		if ($this->model->hidelienhe($id, $log)) {
			$this->saveLog($this->logFile, $log);
			header("location: index.php?task=qllh");
		}
	}
	public function hideph($id)
	{

		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
		$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Xóa phản hồi khách hàng ID: $id" . "\n";
		if ($this->model->hidephkh($id, $log)) {
			$this->saveLog($this->logFile, $log);
			header("location: index.php?task=qlphanhoi");
		}
	}

	public function hidecblh()
	{
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
		if (isset($_POST['idcblh'])) {
			$idcb = $_POST['idcblh'];
			$countid = count($idcb);
			if ($countid > 0) {
				for ($id = 0; $id < $countid; $id++) {
					$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Xóa liên hệ ID: $idcb[$id]" . "\n";
					$this->model->hidelienhe($idcb[$id], $log);
					$this->saveLog($this->logFile, $log);
				}
				header("location: index.php?task=qllh");
			} else
				echo "<script>alert('Chưa có mục nào được chọn')</script>";
		}
	}
	public function phlienhe($id)
	{
		if ($this->model->phlienhe($id)) {
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$time = date("Y-m-d H:i:s");
			// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
			$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Phục hồi phản hồi khách hàng ID: $id" . "\n";
			$this->saveLog($this->logFile, $log);
			header("location: index.php?task=qlphanhoi");
		}
	}
	public function phphkh($id)
	{
		if ($this->model->phphkh($id)) {
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$time = date("Y-m-d H:i:s");
			// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
			$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Phục hồi phản hồi khách hàng ID: $id" . "\n";
			$this->saveLog($this->logFile, $log);
			header("location: index.php?task=qlphanhoi");
		}
	}
	public function deletettkh($id)
	{
		if ($this->model->deletettkh($id)) {
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$time = date("Y-m-d H:i:s");
			// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
			$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Xóa vĩnh viễn liên hệ ID: $id" . "\n";
			$this->saveLog($this->logFile, $log);
			header("location: index.php?task=qllh");

		}
	}

	public function deleteah2()
	{
		if ($this->model->deleteah2()) {
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$time = date("Y-m-d H:i:s");
			// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
			$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Xóa thùng rác trang chủ bài viết" . "\n";
			$this->saveLog($this->logFile, $log);
			header("location: index.php?task=qlhome2");

		}
	}

	public function deletealh()
	{
		if ($this->model->deletealh()) {
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$time = date("Y-m-d H:i:s");
			// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
			$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Xóa thùng rác liên hệ" . "\n";
			$this->saveLog($this->logFile, $log);
			header("location: index.php?task=qllh");

		}
	}

	public function deleteacttv()
	{
		if ($this->model->deleteacttv()) {
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$time = date("Y-m-d H:i:s");
			// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
			$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Xóa thùng rác công ty thành viên" . "\n";
			$this->saveLog($this->logFile, $log);
			header("location: index.php?task=qlctytv");

		}
	}
	public function deleteaphkh()
	{
		if ($this->model->deleteaphkh()) {
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$time = date("Y-m-d H:i:s");
			// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
			$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Xóa thùng rác phản hồi khách hàng" . "\n";
			$this->saveLog($this->logFile, $log);
			header("location: index.php?task=qlphanhoi");

		}
	}
	public function hidecbbv()
	{
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
		if (isset($_POST['idcbbv'])) {
			$idcb = $_POST['idcbbv'];
			$countid = count($idcb);
			if ($countid > 0) {
				for ($id = 0; $id < $countid; $id++) {
					$idcut = explode(",", $idcb[$id]);
					$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Xóa bài viết ID: $idcut[0]" . "\n";
					$getct = $idcut[1];
					$this->model->hidebv($idcut[0], $log);
					$this->saveLog($this->logFile, $log);
				}
				header("location: index.php?task=ht&ct={$getct}");
			} else
				echo "<script>alert('Chưa có mục nào được chọn')</script>";
		}
	}
	public function hidebv($id)
	{
		if (isset($_SESSION['ct']))
			$_GET['ct'] = $_SESSION['ct'];
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
		$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Xóa bài viết ID: $id" . "\n";
		if ($this->model->hidebv($id, $log)) {
			$this->saveLog($this->logFile, $log);
			header("location: index.php?task=ht&ct={$_GET['ct']}");
		}
	}

	public function hideh2($id)
	{
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
		$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Xóa trang chủ bài viết ID: $id" . "\n";
		if ($this->model->hideh2($id, $log)) {
			$this->saveLog($this->logFile, $log);
			header("location: index.php?task=qlhome2");
		}
	}
	public function phbv($id)
	{
		if (isset($_SESSION['ct']))
			$_GET['ct'] = $_SESSION['ct'];
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
		$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Phục hồi bài viết ID: $id" . "\n";
		if ($this->model->phbv($id)) {
			$this->saveLog($this->logFile, $log);
			header("location: index.php?task=ht&ct={$_GET['ct']}");
		}
	}
	public function hidelh($id)
	{
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
		$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Xóa liên hệ ID: $id" . "\n";
		if ($this->model->hidelh($id, $log)) {
			$this->saveLog($this->logFile, $log);
			header("location: index.php?task=qllh");
		}
	}
	public function deletebv($id)
	{
		if ($this->model->deletebv($id)) {
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$time = date("Y-m-d H:i:s");
			// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
			$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Xóa bài viết ID: $id" . "\n";
			$this->saveLog($this->logFile, $log);
			header("location: index.php?task=ht&ct={$_GET['ct']}");
		}
	}
	public function deletesp($id)
	{
		if ($this->model->deletesp($id)) {
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$time = date("Y-m-d H:i:s");
			// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
			$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Xóa vĩnh viễn sản phẩm ID: $id" . "\n";
			$this->saveLog($this->logFile, $log);
			header("location: index.php?task=qlsp");
		}
	}
	public function deleteasp()
	{
		if ($this->model->deleteasp()) {
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$time = date("Y-m-d H:i:s");
			// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
			$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Xóa thùng rác sản phẩm" . "\n";
			$this->saveLog($this->logFile, $log);
			header("location: index.php?task=qlsp");
		}
	}

	public function hidecbsp()
	{
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
		if (isset($_POST['idcb'])) {
			$idcb = $_POST['idcb'];
			$countid = count($idcb);
			if ($countid >= 1) {
				for ($id = 0; $id < $countid; $id++) {
					$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Xóa sản phẩm ID: $idcb[$id]" . "\n";
					$this->model->hidesp($idcb[$id], $log);
					$this->saveLog($this->logFile, $log);
				}
				header("location: index.php?task=qlsp");
			} else
				echo "<script>alert('Chưa có mục nào được chọn')</script>";
		}
	}
	public function hidesp($id)
	{
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
		$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Xóa sản phẩm ID: $id" . "\n";
		if ($this->model->hidesp($id, $log)) {
			$this->saveLog($this->logFile, $log);
			header("location: index.php?task=qlsp");
		}
	}
	public function phsp($id)
	{
		if ($this->model->phsp($id)) {
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$time = date("Y-m-d H:i:s");
			// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
			$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Phục hồi sản phẩm ID: $id" . "\n";
			$this->saveLog($this->logFile, $log);
			header("location: index.php?task=qlsp");
		}
	}
	public function phcttv($id)
	{
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
		$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Phục hồi công ty thành viên ID: $id" . "\n";
		if ($this->model->phcttv($id)) {
			$this->saveLog($this->logFile, $log);
			header("location: index.php?task=qlctytv");
		}
	}
	public function phh2($id)
	{
		if ($this->model->phh2($id)) {
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$time = date("Y-m-d H:i:s");
			// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
			$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Phục hồi trang chủ bài viết ID: $id" . "\n";
			$this->saveLog($this->logFile, $log);
			header("location: index.php?task=qlhome2");
		}
	}
	public function deletelh($id)
	{
		if (isset($_GET['kh']))
			$kh = $_GET['kh'];
		else
			$kh = "";
		if ($this->model->deletelh($id)) {
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$time = date("Y-m-d H:i:s");
			// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
			$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Xóa vĩnh viễn khóa học ID: $id" . "\n";
			$this->saveLog($this->logFile, $log);
			header("location: index.php?task=qlkh&kh=$kh");
		}
	}
	public function deleteakh()
	{
		if (isset($_GET['kh']))
			$kh = $_GET['kh'];
		else
			$kh = "";
		if ($this->model->deleteakh()) {
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$time = date("Y-m-d H:i:s");
			// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
			$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Xóa thùng rác khóa học" . "\n";
			$this->saveLog($this->logFile, $log);
			header("location: index.php?task=qlkh&kh=$kh");
		}
	}
	public function hidecbkh()
	{
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
		if (isset($_POST['idcbkh'])) {
			$idcb = $_POST['idcbkh'];
			$countid = count($idcb);
			if ($countid > 0) {
				for ($id = 0; $id < $countid; $id++) {
					$idcut = explode(",", $idcb[$id]);
					$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Xóa khóa học ID: $idcut[0]" . "\n";
					$getkh = $idcut[1];
					$this->model->hidekh($idcut[0], $log);
					$this->saveLog($this->logFile, $log);
				}
				header("location: index.php?task=qlkh&kh=$getkh");
			} else
				echo "<script>alert('Chưa có mục nào được chọn')</script>";

		}
	}
	public function hidecbh2()
	{
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
		if (isset($_POST['idcbh2'])) {
			$idcb = $_POST['idcbh2'];
			$countid = count($idcb);
			if ($countid > 0) {
				for ($id = 0; $id < $countid; $id++) {
					$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Xóa trang chủ bài viết ID: $idcb[$id]" . "\n";
					$this->model->hideh2($idcb[$id], $log);
					$this->saveLog($this->logFile, $log);
				}
				header("location: index.php?task=qlhome2");
			} else
				echo "<script>alert('Chưa có mục nào được chọn')</script>";

		}
	}
	public function deletecbh2()
	{
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
		if (isset($_POST['iddcbh2'])) {
			$idcb = $_POST['iddcbh2'];
			$countid = count($idcb);
			if ($countid > 0) {
				for ($id = 0; $id < $countid; $id++) {
					$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Xóa vĩnh viễn trang chủ bài viết ID: $idcb[$id]" . "\n";
					$this->model->deletehome2($idcb[$id]);
					$this->saveLog($this->logFile, $log);
				}
				header("location: index.php?task=qlhome2");
			} else
				echo "<script>alert('Chưa có mục nào được chọn')</script>";

		}
	}
	public function deletecbcttv()
	{
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
		if (isset($_POST['iddcbcttv'])) {
			$idcb = $_POST['iddcbcttv'];
			$countid = count($idcb);
			if ($countid > 0) {
				for ($id = 0; $id < $countid; $id++) {
					$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Xóa vĩnh viễn công ty thành viên ID: $idcb[$id]" . "\n";
					$this->model->deletecttv($idcb[$id]);
					$this->saveLog($this->logFile, $log);
				}
				header("location: index.php?task=qlctytv");
			} else
				echo "<script>alert('Chưa có mục nào được chọn')</script>";

		}
	}
	public function deletecbphkh()
	{
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
		if (isset($_POST['iddcbphkh'])) {
			$idcb = $_POST['iddcbphkh'];
			$countid = count($idcb);
			if ($countid > 0) {
				for ($id = 0; $id < $countid; $id++) {
					$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Xóa vĩnh viễn phản hồi khách hàng ID: $idcb[$id]" . "\n";
					$this->model->deleteph($idcb[$id]);
					$this->saveLog($this->logFile, $log);
				}
				header("location: index.php?task=qlphanhoi");
			} else
				echo "<script>alert('Chưa có mục nào được chọn')</script>";

		}
	}
	public function deletecbsp()
	{
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
		if (isset($_POST['iddcbsp'])) {
			$idcb = $_POST['iddcbsp'];
			$countid = count($idcb);
			if ($countid > 0) {
				for ($id = 0; $id < $countid; $id++) {
					$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Xóa vĩnh viễn sản phẩm ID: $idcb[$id]" . "\n";
					$this->model->deletesp($idcb[$id]);
					$this->saveLog($this->logFile, $log);
				}
				header("location: index.php?task=qlsp");
			} else
				echo "<script>alert('Chưa có mục nào được chọn')</script>";

		}
	}
	public function deletecblh()
	{
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
		if (isset($_POST['iddcblh'])) {
			$idcb = $_POST['iddcblh'];
			$countid = count($idcb);
			if ($countid > 0) {
				for ($id = 0; $id < $countid; $id++) {
					$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Xóa vĩnh viễn thông tin liên hệ ID: $idcb[$id]" . "\n";
					$this->model->deletettkh($idcb[$id]);
					$this->saveLog($this->logFile, $log);
				}
				header("location: index.php?task=qllh");
			} else
				echo "<script>alert('Chưa có mục nào được chọn')</script>";

		}
	}
	public function hidecbcttv()
	{
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
		if (isset($_POST['idcbcttv'])) {
			$idcb = $_POST['idcbcttv'];
			$countid = count($idcb);
			if ($countid > 0) {
				for ($id = 0; $id < $countid; $id++) {
					$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Xóa công ty thành viên ID: $idcb[$id]" . "\n";
					$this->model->hidecttv($idcb[$id], $log);
					$this->saveLog($this->logFile, $log);
				}
				header("location: index.php?task=qlctytv");
			} else
				echo "<script>alert('Chưa có mục nào được chọn')</script>";

		}
	}
	public function deletecbbv()
	{
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
		if (isset($_POST['iddcbbv'])) {
			$idcb = $_POST['iddcbbv'];
			$countid = count($idcb);
			if ($countid > 0) {
				for ($id = 0; $id < $countid; $id++) {
					$idcut = explode(",", $idcb[$id]);
					$getct = $idcut[1];
					$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Xóa vĩnh viễn bài viết ID: $idcut[0]" . "\n";
					$this->model->deletebv($idcut[0]);
					$this->saveLog($this->logFile, $log);
				}
				header("location: index.php?task=ht&ct=$getct");
			} else
				echo "<script>alert('Chưa có mục nào được chọn')</script>";

		}
	}
	public function deletecbkh()
	{
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
		if (isset($_POST['iddcbkh'])) {
			$idcb = $_POST['iddcbkh'];
			$countid = count($idcb);
			if ($countid > 0) {
				for ($id = 0; $id < $countid; $id++) {
					$idcut = explode(",", $idcb[$id]);
					$getct = $idcut[1];
					$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Xóa vĩnh viễn khóa học ID: $idcut[0]" . "\n";
					$this->model->deletelh($idcut[0]);
					$this->saveLog($this->logFile, $log);
				}
				header("location: index.php?task=qlkh&kh=$getct");
			} else
				echo "<script>alert('Chưa có mục nào được chọn')</script>";

		}
	}
	public function hidekh($id)
	{
		if (isset($_GET['kh']))
			$kh = $_GET['kh'];
		else
			$kh = "";
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
		$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Xóa khóa học ID: $id" . "\n";
		if ($this->model->hidekh($id, $log)) {
			$this->saveLog($this->logFile, $log);
			header("location: index.php?task=qlkh&kh=$kh");
		}
	}

	public function phkh($id)
	{
		if (isset($_GET['kh']))
			$kh = $_GET['kh'];
		else
			$kh = "";
		if ($this->model->phkh($id)) {
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$time = date("Y-m-d H:i:s");
			// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
			$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Phục hồi khóa học ID: $id" . "\n";
			$this->saveLog($this->logFile, $log);
			header("location: index.php?task=qlkh&kh=$kh");
		}
	}
	public function deleteu($id)
	{
		if ($this->model->deleteu($id)) {
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$time = date("Y-m-d H:i:s");
			// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
			$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Xóa use ID: $id" . "\n";
			$this->saveLog($this->logFile, $log);
			header("location: index.php?task=qlu");
		}
	}
	public function deleteabv()
	{
		if (isset($_SESSION['ct']))
			$_GET['ct'] = $_SESSION['ct'];
		if ($this->model->deleteabv()) {
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$time = date("Y-m-d H:i:s");
			// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
			$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Xóa thùng rác" . "\n";
			$this->saveLog($this->logFile, $log);
			header("location: index.php?task=ht&ct={$_GET['ct']}");
		}
	}

	
	public function hidecbu()
	{
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
		if (isset($_POST['idcbu'])) {
			$idcb = $_POST['idcbu'];
			$countid = count($idcb);
			if ($countid > 0) {
				for ($id = 0; $id < $countid; $id++) {
					$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Xóa use ID: $idcb[$id]" . "\n";
					$this->model->deleteu($idcb[$id]);
					$this->saveLog($this->logFile, $log);
				}
				header("location: index.php?task=qlu");
			} else
				echo "<script>alert('Chưa có mục nào được chọn')</script>";
		}
	}
	public function hidecbphkh()
	{
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
		if (isset($_POST['idcbphkh'])) {
			$idcb = $_POST['idcbphkh'];
			$countid = count($idcb);
			if ($countid > 0) {
				for ($id = 0; $id < $countid; $id++) {
					$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Xóa phản hồi khách hàng ID: $idcb[$id]" . "\n";
					$this->model->hidephkh($idcb[$id], $log);
					$this->saveLog($this->logFile, $log);
				}
				header("location: index.php?task=qlphanhoi");
			} else
				echo "<script>alert('Chưa có mục nào được chọn')</script>";
		}
	}
	public function hideu($id)
	{
		if ($this->model->hideu($id)) {
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$time = date("Y-m-d H:i:s");
			// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
			$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Xóa Use ID: $id" . "\n";
			$this->saveLog($this->logFile, $log);
			header("location: index.php?task=qlu");
		}
	}
	public function hidecttv($id)
	{
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		// $note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
		$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Xóa Công ty thành viên: $id" . "\n";
		if ($this->model->hidecttv($id, $log)) {
			$this->saveLog($this->logFile, $log);
			header("location: index.php?task=qlctytv");
		}
	}
	public function editsp()
	{
		$this->view->editsp();
	}

	public function editkh()
	{
		$this->view->editkh();
	}
	public function qlkh()
	{
		$this->view->qlkh();
	}
	public function tlh()
	{
		$this->view->tlh();
	}
	public function editcttv()
	{
		$this->view->editcttv();
	}

	public function suatrangchu1()
	{
		$getu = mysqli_fetch_assoc($this->model->getDatause($_SESSION['use']));
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		$note = "Người sửa: <strong>{$getu['use']}</strong> - Time: $time";
		if ($this->model->updatetrangchu1($_POST['porter'], $_POST['tieu_de'], $_POST['mo_ta'], $_POST['img2'], $_POST['nampt'], $_POST['sochinhanh'], $_POST['quocgiahiendien'], $_POST['nhanvien'], $note)) {
			header('location:index.php?task=qltrchu1');
		} else {
			echo "<script>alert('Sửa không thành công')</script>";
		}
	}

	//sửa phản hồi 
	public function suaphanhoi()
	{
		$getu = mysqli_fetch_assoc($this->model->getDatause($_SESSION['use']));
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		$note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";

		if ($this->model->updatephanhoi($_GET['id'], $_POST['img'], $_POST['tenkhachhang'], $_POST['nghenghiep'], $_POST['danhgia'], $_POST['noidung'], $note)) {
			header("Location: index.php?task=qlphanhoi");
			// echo "<script>alert('Sửa thành công')</script>";
		} else {
			echo "<script>alert('Sửa không thành công')</script>";
		}
		// $_SESSION['task'] = 'qlsp';
	}
	public function updatecttv1()
	{
		$getu = mysqli_fetch_assoc($this->model->getDatause($_SESSION['use']));
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		$note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
		if ($this->model->updatecttv($_GET['idscttv'], $_POST['img'], $_POST['ten'], $_POST['chucvu'], $_POST['chinhanh'], $_POST['mail'], $_POST['linkFB'], $_POST['linkZalo'], $note)) {
			header('location:index.php?task=qlctytv');
		} else {
			echo "<script>alert('Sửa không thành công')</script>";
		}
	}


	public function addcttv()
	{

		$getu = mysqli_fetch_assoc($this->model->getDatause($_SESSION['use']));
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		$note = "Người tạo: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";


		if ($this->model->addcttv($_POST['img'], $_POST['ten'], $_POST['chucvu'], $_POST['chinhanh'], $_POST['mail'], $_POST['linkFB'], $_POST['linkZalo'], $note)) {
			header("Location: index.php?task=qlctytv");
			// echo "<script>alert('Thêm dữ liệu thành công')</script>";
		} else {
			echo "<script>alert('Thêm không thành công')</script>";
		}

	}

	public function addu()
	{
		$result = $this->model->getDatausea();
		$use = empty($_POST['use']) ? 'true' : null;
		$pass = empty($_POST['pass']) ? 'true' : null;
		if ($use || $pass) {
			echo "<script>alert('Dữ liệu không được bỏ trống')</script>";
		} else {
			$kt = false;
			$idau = '';
			while ($row = mysqli_fetch_assoc($result)) {
				if ($_POST['use'] == $row['use'] ) {
					$kt = true;
					$idau = $row['id'];
				}
				$idthem = $row['id'];
			}
			// if($kt){
				date_default_timezone_set("Asia/Ho_Chi_Minh");
				$time = date("Y-m-d H:i:s");
				$pq = "";
				if (isset($_POST['qlw']) && $_POST['qlw'] == "true") {
					$pq .= "true|";
				}else $pq .= "false|";
				if (isset($_POST['qlbv']) && $_POST['qlbv'] == "true") {
					$pq .= "true|";
				}else $pq .= "false|";
				if (isset($_POST['qlsp']) && $_POST['qlsp'] == "true") {
					$pq .= "true|";
				}else $pq .= "false|";
				if (isset($_POST['qlkh']) && $_POST['qlkh'] == "true") {
					$pq .= "true|";
				}else $pq .= "false|";
				if (isset($_POST['qlft']) && $_POST['qlft'] == "true") {
					$pq .= "true|";
				}else $pq .= "false|";
				if (isset($_POST['qllh']) && $_POST['qllh'] == "true") {
					$pq .= "true|";
				}else $pq .= "false|";
				if (isset($_POST['qltrchu']) && $_POST['qltrchu'] == "true") {
					$pq .= "true|";
				}else $pq .= "false|";
				if (isset($_POST['qlbn']) && $_POST['qlbn'] == "true") {
					$pq .= "true|";
				}else $pq .= "false|";
				if (isset($_POST['qladmin']) && $_POST['qladmin'] == "true") {
					$pq .= "true";
				}else $pq .= "false";
				if (!isset($_GET['idsuau'])) {

					if ($this->model->addusel($_POST['use'], $_POST['pass'], $pq)) {
						$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Thêm use ID: " . $idthem + 1;
						$this->saveLog($this->logFile, $log);// echo "<script>alert('Thêm dữ liệu thành công')</script>";
					} else {
						echo "<script>alert('Thêm không thành công')</script>";
					}
				} else {
					$timestart = date("Y-m-d H:i:s");
					// $timeend = date("Y-m-d H:i:s", strtotime("+60 minutes"));
					if ($this->model->updateusele($_POST['use'], $_POST['pass'],$pq, $_GET['idsuau'])) {
						$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Sửa use ID: $idau" . "\n";
						$this->saveLog($this->logFile, $log);
					}
				}
				header('location:index.php?task=qlu');
			// } else
			// 	echo "<script>alert('Người dùng {$_POST['use']} đã tồn tại')</script>";

			// $_SESSION['task']='qlu';

		}


	}
	public function addlh()
	{
		$img = empty($_POST['img']) ? 'true' : null;
		$tenlop = empty($_POST['tenlop']) ? 'true' : null;
		$phanloai = empty($_POST['phanloai']) ? 'true' : null;
		$lichhoc = empty($_POST['lichhoc']) ? 'true' : null;
		$giohoc = empty($_POST['giohoc']) ? 'true' : null;
		$khuvuc = empty($_POST['khuvuc']) ? 'true' : null;
		$chinhanh = empty($_POST['chinhanh']) ? 'true' : null;
		$getu = mysqli_fetch_assoc($this->model->getDatause($_SESSION['use']));
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		$note = "Người tạo: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";

		// if ($td || $pl || $nd || $img) {
		//     echo "<script>alert('Dữ liệu thêm không được bỏ trống')</script>";
		// } else {

		$result = $this->model->getDatalienhe();
		while ($row = mysqli_fetch_assoc($result)) {
			$idthem = $row['id'];
		}

		if ($this->model->addlh($_POST['img'], $_POST['tenlop'], $_POST['lichhoc'], $_POST['giohoc'], $_POST['khuvuc'], $_POST['chinhanh'], $_POST['phanloai'], $note)) {
			$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Thêm liên hệ ID: " . ($idthem + 1) . "\n";
			$this->saveLog($this->logFile, $log);// echo "<script>alert('Thêm dữ liệu thành công')</script>";
			header('location:index.php?task=qlkh&kh=' . $_GET['kh']);
			// echo "<script>alert('Thêm dữ liệu thành công')</script>";
		} else {
			echo "<script>alert('Thêm không thành công')</script>";
		}
		// $_POST['img'] = "";
		// $_POST['tenlop'] = "";
		// $_POST['phanloai'] = "";
		// $_POST['lichhoc'] = "";
		// $_POST['giohoc'] = "";
		// $_POST['khuvuc'] = "";
		// $_POST['chinhanh'] = "";
		// $_SESSION['task']='qlkh';

	}
	public function anthongtin($id){
		$this->model->anthongtin($id);
	}
	public function hienthongtin($id){
		$this->model->hienthongtin($id);
	}

	public function addsp()
	{
		$img = empty($_POST['img']) ? 'true' : null;
		$tennuoc = empty($_POST['tennuoc']) ? 'true' : null;
		$mota = empty($_POST['mota']) ? 'true' : null;
		$ntv = empty($_POST['ntv']) ? 'true' : null;
		$sdt = empty($_POST['sdt']) ? 'true' : null;
		if (isset($_POST['dam']) && $_POST['dam'] === 'true') {
			$dam = "true";
		} else
			$dam = "false";
		if (isset($_POST['nghieng']) && $_POST['nghieng'] === 'true') {
			$nghieng = "true";
		} else
			$nghieng = "false";
		if (isset($_POST['gachc']) && $_POST['gachc'] === 'true') {
			$gachc = "true";
		} else
			$gachc = "false";

		if (isset($_POST['clep'])) {
			$cle = $_POST['clep'];
		} else
			$cle = "";

		if (isset($_POST['clei'])) {
			$clei = $_POST['clei'];
		} else
			$clei = "";

		$fonts = $dam . "|" . $nghieng . "|" . $gachc . "|" . $_POST['font-f'] . "|" . $cle . "|" . $_POST['font-size'] . "|" . $_POST['color'];
		// $getu = mysqli_fetch_assoc($this->model->getDatause($_SESSION['use']));
		$getu = mysqli_fetch_assoc($this->model->getDatause($_SESSION['use']));
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		$note = "Người tạo: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";

		$result = $this->model->getDatasp();
		while ($row = mysqli_fetch_assoc($result)) {
			$idthem = $row['id'];
		}
		$marginp = "{$_POST['letren']}px {$_POST['lephai']}px {$_POST['leduoi']}px {$_POST['letrai']}px";
		if ($tennuoc || $mota || $ntv || $img || $sdt) {
			echo "<script>alert('Dữ liệu thêm không được bỏ trống')</script>";
		} else {
			if ($this->model->addsp($_POST['img'], $_POST['tennuoc'], $_POST['mota'], $_POST['ntv'], $_POST['sdt'], $fonts, $note)) {
				$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Thêm liên hệ ID: " . ($idthem + 1) . "\n";
				$this->saveLog($this->logFile, $log);// echo "<script>alert('Thêm dữ liệu thành công')</script>";
				header("Location: index.php?task=qlsp");
				// echo "<script>alert('Thêm dữ liệu thành công')</script>";
			} else {
				echo "<script>alert('Thêm không thành công')</script>";
			}
		}
		// $_SESSION['task'] = 'qlsp';
	}

	public function suakh()
	{

		//     echo "<script>alert('Dữ liệu thêm không được bỏ trống')</script>";
		// } else {
		$getu = mysqli_fetch_assoc($this->model->getDatause($_SESSION['use']));
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		$note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
		// $result = $this->model->getDatakhoahoc();
		// while($row = mysqli_fetch_assoc($result)){
		// 	$idthem = $row['id'];
		// }
		if ($this->model->updatekh($_GET['idsuakh'], $_POST['img'], $_POST['tenlop'], $_POST['lichhoc'], $_POST['giohoc'], $_POST['khuvuc'], $_POST['chinhanh'], $_POST['phanloai'], $note)) {
			$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Sửa khóa học ID: {$_GET['idsuakh']}" . "\n";
			$this->saveLog($this->logFile, $log);
			header('location:index.php?task=qlkh&kh=' . $_GET['kh']);
			// echo "<script>alert('Sửa thành công')</script>";

		} else {
			echo "<script>alert('Sửa không thành công')</script>";
		}
		//$_SESSION['task'] = 'qlkh';

	}

	public function suasp()
	{

		$img = empty($_POST['img']) ? 'true' : null;
		$tennuoc = empty($_POST['tennuoc']) ? 'true' : null;
		$mota = empty($_POST['mota']) ? 'true' : null;
		$ntv = empty($_POST['ntv']) ? 'true' : null;
		$sdt = empty($_POST['SDT']) ? 'true' : null;
		//     echo "<script>alert('Dữ liệu thêm không được bỏ trống')</script>";
		// } else {
		if (isset($_POST['dam']) && $_POST['dam'] === 'true') {
			$dam = "true";
		} else
			$dam = "false";
		if (isset($_POST['nghieng']) && $_POST['nghieng'] === 'true') {
			$nghieng = "true";
		} else
			$nghieng = "false";
		if (isset($_POST['gachc']) && $_POST['gachc'] === 'true') {
			$gachc = "true";
		} else
			$gachc = "false";

		if (isset($_POST['clep'])) {
			$cle = $_POST['clep'];
		} else
			$cle = "";

		if (isset($_POST['clei'])) {
			$clei = $_POST['clei'];
		} else
			$clei = "";

		$fonts = $dam . "|" . $nghieng . "|" . $gachc . "|" . $_POST['font-f'] . "|" . $cle . "|" . $_POST['font-size'] . "|" . $_POST['color'];

		$getu = mysqli_fetch_assoc($this->model->getDatause($_SESSION['use']));
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		$note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
		if ($tennuoc || $mota || $ntv || $img || $sdt) {
			echo "<script>alert('Dữ liệu không được bỏ trống')</script>";
		} else {
			if ($this->model->updatespxkld($_GET['idssp'], $_POST['img'], $_POST['tennuoc'], $_POST['mota'], $_POST['ntv'], $_POST['SDT'], $note, $fonts)) {
				$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Sửa sản phẩm ID: {$_GET['id']}" . "\n";
				$this->saveLog($this->logFile, $log);
				header("Location: index.php?task=qlsp");
				// echo "<script>alert('Sửa thành công')</script>";
			} else {
				echo "<script>alert('Sửa không thành công')</script>";
			}
		}
		// $_SESSION['task'] = 'qlsp';
	}
	public function addbv()
	{
		$td = empty($_POST['td']) ? 'true' : null;
		$pl = empty($_POST['pl']) ? 'true' : null;
		$nd = empty($_POST['nd']) ? 'true' : null;
		$img = empty($_POST['img']) ? 'true' : null;

		if (isset($_POST['dam']) && $_POST['dam'] === 'true') {
			$dam = "true";
		} else
			$dam = "false";
		if (isset($_POST['nghieng']) && $_POST['nghieng'] === 'true') {
			$nghieng = "true";
		} else
			$nghieng = "false";
		if (isset($_POST['gachc']) && $_POST['gachc'] === 'true') {
			$gachc = "true";
		} else
			$gachc = "false";

		if (isset($_POST['clep'])) {
			$cle = $_POST['clep'];
		} else
			$cle = "";

		if (isset($_POST['damtd']) && $_POST['damtd'] === 'true') {
			$damtd = "true";
		} else
			$damtd = "false";
		if (isset($_POST['nghiengtd']) && $_POST['nghiengtd'] === 'true') {
			$nghiengtd = "true";
		} else
			$nghiengtd = "false";
		if (isset($_POST['gachctd']) && $_POST['gachctd'] === 'true') {
			$gachctd = "true";
		} else
			$gachctd = "false";

		if (isset($_POST['cletd'])) {
			$cletd = $_POST['cletd'];
		} else
			$cletd = "";

		if (isset($_POST['clei'])) {
			$clei = $_POST['clei'];
		} else
			$clei = "";


		$getu = mysqli_fetch_assoc($this->model->getDatause($_SESSION['use']));
		$fonts = $dam . "|" . $nghieng . "|" . $gachc . "|" . $_POST['font-f'] . "|" . $cle . "|" . $_POST['font-size'] . "|" . $_POST['color'];
		$fontstd = $damtd . "|" . $nghiengtd . "|" . $gachctd . "|" . $_POST['font-ftd'] . "|" . $cletd . "|" . $_POST['font-sizetd'] . "|" . $_POST['colortd'];

		$marginp = "{$_POST['letren']}px {$_POST['lephai']}px {$_POST['leduoi']}px {$_POST['letrai']}px";
		$margintd = "{$_POST['letrentd']}px {$_POST['lephaitd']}px {$_POST['leduoitd']}px {$_POST['letraitd']}px";
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		$note = "Người tạo: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";

		// if ($td || $pl || $nd || $img) {
		//     echo "<script>alert('Dữ liệu thêm không được bỏ trống')</script>";
		// } else {
		$result = $this->model->getDataF();
		while ($row = mysqli_fetch_assoc($result)) {
			$idthem = $row['id'];
		}
		if ($this->model->addF($_POST['img'], $_POST['nd'], $_POST['td'], $_POST['pl'], $fonts, $marginp, $_POST['sizei'], $clei, $note, $_POST['video'], $_POST['sizev'], $fontstd, $margintd)) {
			$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Thêm bài viết ID: " . ($idthem + 1) . "\n";
			$this->saveLog($this->logFile, $log);
			header('location:index.php?task=ht&ct=' . $_GET['ct']);

			// echo "<script>alert('thêm thành công')</script>";
		} else {
			echo "<script>alert('Thêm không thành công')</script>";

		}
		// $_SESSION['task'] = "ht";
	}

	public function updatebn($id)
	{
		$bn = empty($_POST['baner']) ? 'true' : null;
		$ten = empty($_POST['pl']) ? 'true' : null;
		$getu = mysqli_fetch_assoc($this->model->getDatause($_SESSION['use']));
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		$note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
		if ($bn || $ten) {
			echo "<script>alert('Dữ liệu không được bỏ trống')</script>";
		} else {
			if ($this->model->updatebanner($id, $_POST['baner'], $_POST['pl'], $note)) {
				$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Sửa banner ID: $id" . "\n";
				$this->saveLog($this->logFile, $log);
				header("Location: index.php?task=qlbaner");
				// echo "<script>alert('Sửa thành công')</script>";
			} else {
				echo "<script>alert('Sửa không thành công')</script>";
			}
		}
		// $_SESSION['task'] = "qlbaner";
		// }
		// require_once "index.php";
	}


	public function updatebv($id)
	{
		$td = empty($_POST['td']) ? 'true' : null;
		$pl = empty($_POST['pl']) ? 'true' : null;
		$nd = empty($_POST['nd']) ? 'true' : null;
		$img = empty($_POST['img']) ? 'true' : null;

		// echo "<script>alert('Sửa không thành công')</script>";

		if (isset($_POST['dam']) && $_POST['dam'] === 'true') {
			$dam = "true";
		} else
			$dam = "false";
		if (isset($_POST['nghieng']) && $_POST['nghieng'] === 'true') {
			$nghieng = "true";
		} else
			$nghieng = "false";
		if (isset($_POST['gachc']) && $_POST['gachc'] === 'true') {
			$gachc = "true";
		} else
			$gachc = "false";

		if (isset($_POST['clep'])) {
			$cle = $_POST['clep'];
		} else
			$cle = "";

		if (isset($_POST['damtd']) && $_POST['damtd'] === 'true') {
			$damtd = "true";
		} else
			$damtd = "false";
		if (isset($_POST['nghiengtd']) && $_POST['nghiengtd'] === 'true') {
			$nghiengtd = "true";
		} else
			$nghiengtd = "false";
		if (isset($_POST['gachctd']) && $_POST['gachctd'] === 'true') {
			$gachctd = "true";
		} else
			$gachctd = "false";

		if (isset($_POST['cletd'])) {
			$cletd = $_POST['cletd'];
		} else
			$cletd = "";


		if (isset($_POST['clei'])) {
			$clei = $_POST['clei'];
		} else
			$clei = "";

		if (isset($_POST['font-ftd'])) {
			$fftd = $_POST['font-ftd'];
		} else
			$fftd = "";

		if (isset($_POST['font-sizetd'])) {
			$fstd = $_POST['font-sizetd'];
		} else
			$fstd = "";

		if (isset($_POST['colortd'])) {
			$cltd = $_POST['colortd'];
		} else
			$cltd = "";

		if (isset($_POST['font-f'])) {
			$ff = $_POST['font-f'];
		} else
			$ff = "";

		if (isset($_POST['font-size'])) {
			$fs = $_POST['font-size'];
		} else
			$fs = "";

		if (isset($_POST['color'])) {
			$cl = $_POST['color'];
		} else
			$cl = "";

		$fontstd = $damtd . "|" . $nghiengtd . "|" . $gachctd . "|" . $fftd . "|" . $cletd . "|" . $fstd . "|" . $cltd;
		$fonts = $dam . "|" . $nghieng . "|" . $gachc . "|" . $ff . "|" . $cle . "|" . $fs . "|" . $cl;
		$getu = mysqli_fetch_assoc($this->model->getDatause($_SESSION['use']));

		$margintd = "{$_POST['letrentd']}px {$_POST['lephaitd']}px {$_POST['leduoitd']}px {$_POST['letraitd']}px";
		$marginp = "{$_POST['letren']}px {$_POST['lephai']}px {$_POST['leduoi']}px {$_POST['letrai']}px";
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		$note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";

		// if ($td || $pl || $nd || $img) {
		//     echo "<script>alert('Dữ liệu thêm không được bỏ trống')</script>";
		// } else {
		if ($this->model->update($id, $_POST['img'], $_POST['nd'], $_POST['td'], $_POST['pl'], $fonts, $marginp, $_POST['sizei'], $clei, $note, $_POST['video'], $_POST['sizev'], $fontstd, $margintd)) {
			$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Sửa bài viết ID: $id" . "\n";
			$this->saveLog($this->logFile, $log);// // header('Location: /index.php');

			// if (isset($_SERVER['HTTP_REFERER']))
			//     header('Location: ' . $_SERVER['HTTP_REFERER']);
		} else {
			echo "<script>alert('Sửa không thành công')</script>";
		}
		header('location:index.php?task=ht&ct=' . $_GET['ct']);
	}

	// public function getusel()
	// {
	// 	return mysqli_fetch_assoc($this->model->getDatause($_SESSION['use']));
	// }
// hien thi thong tin footer
	public function qlfooter()
	{
		$this->view->qlfooter();
	}

	public function qllh()
	{
		$this->view->qllh();
	}

	public function editlienhe()
	{
		$this->view->editlienhe();
	}

	public function updatelienhe1($id)
	{
		$img = empty($_POST['img']) ? 'true' : null;
		$add = empty($_POST['address']) ? 'true' : null;
		$email = empty($_POST['email']) ? 'true' : null;
		$tel1 = empty($_POST['telephone1']) ? 'true' : null;
		$tel2 = empty($_POST['telephone2']) ? 'true' : null;
		$map = empty($_POST['map']) ? 'true' : null;

		$getu = mysqli_fetch_assoc($this->model->getDatause($_SESSION['use']));
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		$note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
		if ($img || $add || $email || $tel1 || $tel2 || $map) {
			echo "<script>alert('Không được để trống thông tin')</script>";
		} else {

			if ($this->model->updatelienhe($_POST['img'], $_POST['address'], $_POST['email'], $_POST['telephone1'], $_POST['telephone2'], $note, $_POST['map'], $id)) {
				header('location:index.php?task=qllh');
			} else {
				echo "<script>alert('Sửa không thành công')</script>";
			}
		}
	}

	//sua thong tin footer
	public function editfooter()
	{
		$this->view->editfooter();
	}

	public function updatefooter1()
	{
		$stylei = "";
		if (isset($_POST['clei'])) {
			$stylei .= $_POST['clei']. "|";
		} else
			$stylei .= "|";
		if(isset($_POST['sizei'])){
			$stylei .= $_POST['sizei'];
		}else $stylei .= "";

		$getu = mysqli_fetch_assoc($this->model->getDatause($_SESSION['use']));
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		$note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
		if ($this->model->updatefooter($_POST['icon'], $_POST['mota1'], $_POST['mota2'], $_POST['FB'], $_POST['IN'], $_POST['YT'], $_POST['Zalo'], $_POST['diachi'], $_POST['mail'], $_POST['sdt1'], $_POST['img1'], $_POST['img2'], $_POST['img3'], $_POST['img4'], $_POST['img5'], $_POST['img6'], $_POST['map'], $_POST['td1'], $_POST['td2'], $note, $stylei)) {
			$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Sửa footer" . "\n";
			$this->saveLog($this->logFile, $log);
			header('location:index.php?task=qlfooter');
		} else {
			echo "<script>alert('Sửa không thành công')</script>";
		}
	}

	public function updatelink()
	{

		$getu = mysqli_fetch_assoc($this->model->getDatause($_SESSION['use']));
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		$note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";
		if ($this->model->updatelink($_POST['link'], $note)) {
			$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Sửa link" . "\n";
			$this->saveLog($this->logFile, $log);
			header('location:index.php?task=qlweb');
		} else {
			echo "<script>alert('Sửa không thành công')</script>";
		}
	}
	public function checklogin($user, $pass)
	{
		//setcookie('use', $user, time()+86400, "/");
		$use = $this->model->getDatausea();
		$kt = false;
		while ($row = mysqli_fetch_assoc($use)) {
			// echo "<script>console.log('{$row['use']}')</script>";
			if ($row['use'] == $user && $pass == $row['pass']) {
				$kt = true;
				//$level = $row['level'];
				break;
			}
		}

		if ($kt) {
			$row = mysqli_fetch_assoc($this->model->getDatause($user));
			if ($row['tthai'] == 'onl') {
				echo '<script>alert("Có người đang đăng nhập ở tài khoản này")</script>';
			} else {
				if(!empty($row['tenhh'])){
					$_SESSION['tenhh'] = $row['tenhh'];
				}else $_SESSION['tenhh'] = "unknown";
				$_SESSION['use'] = $user;
				$_SESSION['iduse'] = $row['id'];

				date_default_timezone_set("Asia/Ho_Chi_Minh");
				$timestart = date("Y-m-d H:i:s");
				// $timeend = date("Y-m-d H:i:s", strtotime("+60 minutes"));
				date_default_timezone_set("Asia/Ho_Chi_Minh");
				$time = date("Y-m-d H:i:s");
				$log = "$time - $this->directory1 - {$_SESSION['tenhh']} -  Đăng nhập" . "\n";
				$this->saveLog($this->logFile, $log);
				$this->model->updateusel($user, "onl", $timestart);
				// } else {
				// }
				//$result = mysqli_fetch_assoc($this->model->getDatause($_SESSION['use']));
				// header('location:index.php?task=pageHome');
				$_SESSION['task'] = "pageHome";
				header("location: index.php?task=pageHome");
			}

			// $_SESSION['level'] = $level;

		} else {
			//$_SESSION['task'] = 'login';
			echo '<script>alert("Sai tên đăng nhập hoặc mật khẩu!")</script>';
		}
		// require_once 'index.php';
	}
	// public function doLogin()
	// {
	// 	$tam = $this->model->doLogin();
	// 	isset($tam['name']) ? $_SESSION['name'] = $tam['name'] : $tam['name'] = null;
	// 	isset($tam['uesr']) ? $_SESSION['user'] = $tam['uesr'] : $tam['uesr'] = null;
	// 	isset($tam['password']) ? $_SESSION['pass'] = $tam['password'] : $tam['password'] = null;
	// 	//if(isset($tam['repassword'])) $_SESSION['repassword'] = $tam['repassword'];
	// 	if ($tam) {
	// 		$_SESSION['task'] = "pageHome";
	// 		echo '<script>alert("Chào ' . $_SESSION['name'] . '")</script>';
	// 	} else {
	// 		$_SESSION['task'] = 'login';
	// 		echo '<script>alert("Sai tên đăng nhập hoặc mật khẩu!")</script>';
	// 	}
	// 	require_once "index.php";
	// }

	public function Register()
	{
		$name = empty($_POST['ten']) ? 'true' : null;
		$pass = empty($_POST['pass']) ? 'true' : null;
		$repass = empty($_POST['repass']) ? 'true' : null;
		$email = empty($_POST['use']) ? 'true' : null;

		if ($name || $pass || $email || $repass) {
			echo '<script tpye=text/javascript>alert("Không được bỏ trống");</script>';

		} else {
			if ($_POST['pass'] != $_POST['repass']) {
				echo '<script tpye=text/javascript>alert("Nhập lại mật khẩu không đúng. nhập lại");</script>';

				//$_SESSION['task'] = "login";
			} else {
				if ($this->model->addUser($_POST)) {
					echo '<script tpye=text/javascript>alert("Đăng ký thành công! Đăng nhập để vào trang chủ");</script>';

				} else {
					echo '<script tpye=text/javascript>alert("Đăng ký không thành công");</script>';
				}
			}
		}
		$_SESSION['task'] = "login";
		require_once "index.php";
	}
	public function deletehome2($id)
	{

		$this->model->deletehome2($id);
	}
	public function addhome()
	{
		$this->view->addhome2();
	}
	public function edithome2()
	{
		$this->view->edithome2();
	}
	public function qlhome2()
	{
		$this->view->qlhome2();
	}
	public function addhome2()
	{
		$td = empty($_POST['td']) ? 'true' : null;

		$nd = empty($_POST['nd']) ? 'true' : null;
		$img = empty($_POST['img']) ? 'true' : null;

		if (isset($_POST['dam']) && $_POST['dam'] === 'true') {
			$dam = "true";
		} else
			$dam = "false";
		if (isset($_POST['nghieng']) && $_POST['nghieng'] === 'true') {
			$nghieng = "true";
		} else
			$nghieng = "false";
		if (isset($_POST['gachc']) && $_POST['gachc'] === 'true') {
			$gachc = "true";
		} else
			$gachc = "false";

		if (isset($_POST['clep'])) {
			$cle = $_POST['clep'];
		} else
			$cle = "";

		if (isset($_POST['clei'])) {
			$clei = $_POST['clei'];
		} else
			$clei = "";

		if (isset($_POST['damtd']) && $_POST['damtd'] === 'true') {
			$damtd = "true";
		} else
			$damtd = "false";
		if (isset($_POST['nghiengtd']) && $_POST['nghiengtd'] === 'true') {
			$nghiengtd = "true";
		} else
			$nghiengtd = "false";
		if (isset($_POST['gachctd']) && $_POST['gachctd'] === 'true') {
			$gachctd = "true";
		} else
			$gachctd = "false";

		if (isset($_POST['cletd'])) {
			$cletd = $_POST['cletd'];
		} else
			$cletd = "";

		if (isset($_POST['clei'])) {
			$clei = $_POST['clei'];
		} else
			$clei = "";


		$getu = mysqli_fetch_assoc($this->model->getDatause($_SESSION['use']));
		$fonts = $dam . "|" . $nghieng . "|" . $gachc . "|" . $_POST['font-f'] . "|" . $cle . "|" . $_POST['font-size'] . "|" . $_POST['color'];
		$fontstd = $damtd . "|" . $nghiengtd . "|" . $gachctd . "|" . $_POST['font-ftd'] . "|" . $cletd . "|" . $_POST['font-sizetd'] . "|" . $_POST['colortd'];
		$marginp = "{$_POST['letren']}px {$_POST['lephai']}px {$_POST['leduoi']}px {$_POST['letrai']}px";
		$margintd = "{$_POST['letrentd']}px {$_POST['lephaitd']}px {$_POST['leduoitd']}px {$_POST['letraitd']}px";
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		$note = "Người tạo: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";

		// if ($td || $pl || $nd || $img) {
		//     echo "<script>alert('Dữ liệu thêm không được bỏ trống')</script>";
		// } else {
		$result = $this->model->getqltrangchu2();
		while ($row = mysqli_fetch_assoc($result)) {
			$idthem = $row['id'];
		}
		if ($this->model->addhome2($_POST['td'], $_POST['nd'], $_POST['img'], $_POST['video'], $note, $fonts, $marginp, $_POST['sizei'], $clei, $_POST['sizev'], $fontstd, $margintd)) {
			$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Thêm thân trang chủ ID: " . ($idthem + 1) . "\n";
			$this->saveLog($this->logFile, $log);
			header('location:index.php?task=qlhome2');

			// echo "<script>alert('thêm thành công')</script>";
		} else {
			echo "<script>alert('Thêm không thành công')</script>";

		}
		// $_SESSION['task'] = "ht";
	}
	public function addph()
	{

		$getu = mysqli_fetch_assoc($this->model->getDatause($_SESSION['use']));
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		$note = "Người tạo: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";


		if ($this->model->addph($_POST['img'], $_POST['tenkhachhang'], $_POST['nghenghiep'], $_POST['danhgia'], $_POST['noidung'], $note)) {
			header("Location: index.php?task=qlphanhoi");
			// echo "<script>alert('Thêm dữ liệu thành công')</script>";
		} else {
			echo "<script>alert('Thêm không thành công')</script>";
		}

	}
	public function updatehome2($id)
	{
		$td = empty($_POST['td']) ? 'true' : null;
		$nd = empty($_POST['nd']) ? 'true' : null;
		$img = empty($_POST['img']) ? 'true' : null;

		// echo "<script>alert('Sửa không thành công')</script>";

		if (isset($_POST['dam']) && $_POST['dam'] === 'true') {
			$dam = "true";
		} else
			$dam = "false";
		if (isset($_POST['nghieng']) && $_POST['nghieng'] === 'true') {
			$nghieng = "true";
		} else
			$nghieng = "false";
		if (isset($_POST['gachc']) && $_POST['gachc'] === 'true') {
			$gachc = "true";
		} else
			$gachc = "false";

		if (isset($_POST['clep'])) {
			$cle = $_POST['clep'];
		} else
			$cle = "";
		// tiêu đề 
		if (isset($_POST['damtd']) && $_POST['damtd'] === 'true') {
			$damtd = "true";
		} else
			$damtd = "false";
		if (isset($_POST['nghiengtd']) && $_POST['nghiengtd'] === 'true') {
			$nghiengtd = "true";
		} else
			$nghiengtd = "false";
		if (isset($_POST['gachctd']) && $_POST['gachctd'] === 'true') {
			$gachctd = "true";
		} else
			$gachctd = "false";

		if (isset($_POST['cletd'])) {
			$cletd = $_POST['cletd'];
		} else
			$cletd = "";

		if (isset($_POST['clei'])) {
			$clei = $_POST['clei'];
		} else
			$clei = "";
		//tiêu đề 
		if (isset($_POST['font-ftd'])) {
			$fftd = $_POST['font-ftd'];
		} else
			$fftd = "";

		if (isset($_POST['font-sizetd'])) {
			$fstd = $_POST['font-sizetd'];
		} else
			$fstd = "";

		if (isset($_POST['colortd'])) {
			$cltd = $_POST['colortd'];
		} else
			$cltd = "";

		$fontstd = $damtd . "|" . $nghiengtd . "|" . $gachctd . "|" . $fftd . "|" . $cletd . "|" . $fstd . "|" . $cltd;
		$fonts = $dam . "|" . $nghieng . "|" . $gachc . "|" . $_POST['font-f'] . "|" . $cle . "|" . $_POST['font-size'] . "|" . $_POST['color'];
		$getu = mysqli_fetch_assoc($this->model->getDatause($_SESSION['use']));
		// tiêu đề 
		$margintd = "{$_POST['letrentd']}px {$_POST['lephaitd']}px {$_POST['leduoitd']}px {$_POST['letraitd']}px";
		$marginp = "{$_POST['letren']}px {$_POST['lephai']}px {$_POST['leduoi']}px {$_POST['letrai']}px";
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y-m-d H:i:s");
		$note = "Người sửa: <strong>{$_SESSION['tenhh']}</strong> - Time: $time";

		if ($this->model->updatehome2($id, $_POST['img'], $_POST['nd'], $_POST['td'], $fonts, $marginp, $_POST['sizei'], $clei, $note, $_POST['video'], $_POST['sizev'], $fontstd, $margintd)) {
			$log = "$time - $this->directory1 - {$_SESSION['tenhh']} - Sửa trang chủ bài viết ID: $id" . "\n";
			$this->saveLog($this->logFile, $log);
			header('location:index.php?task=qlhome2');

			// if (isset($_SERVER['HTTP_REFERER']))
			//     header('Location: ' . $_SERVER['HTTP_REFERER']);
		} else {
			echo "<script>alert('Sửa không thành công')</script>";
		}
		$_SESSION['task'] = "ht";
	}
	// Cập nhật thứ tự thông qua AJAX
	public function updateOrder()
	{
		if (isset($_POST['order'])) {
			$order = $_POST['order']; // Mảng ID theo thứ tự mới

			foreach ($order as $index => $id) {
				$position = $index + 1; // Bắt đầu từ 1
				$this->model->updateOrder($id, $position);
			}

			echo json_encode(['status' => 'success', 'message' => 'Thứ tự đã được cập nhật']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Không có dữ liệu']);
		}
	}
	public function updateOrderhome2()
	{
		if (isset($_POST['order'])) {
			$order = $_POST['order']; // Mảng ID theo thứ tự mới

			foreach ($order as $index => $id) {
				$position = $index + 1; // Bắt đầu từ 1
				$this->model->updateOrderhome2($id, $position);
			}

			echo json_encode(['status' => 'success', 'message' => 'Thứ tự đã được cập nhật']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Không có dữ liệu']);
		}
	}
}
ob_end_flush();
?>