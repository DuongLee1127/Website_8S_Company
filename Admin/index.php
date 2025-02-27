<?php
session_start();
require_once('./controllers/controller.php');
require_once "./templates/checkupdates.php";
$controller = new Controller();


$task = isset($_GET['task']) ? $_GET['task'] : null;
if (isset($_GET['idxbv']))
    $controller->hidebv($_GET['idxbv']);
if (isset($_POST['edit']))
    $controller->updatebv($_GET['idsua']);
if (isset($_POST['add']))
    $controller->addbv();
if (isset($_POST['clogin'])) {
    $controller->checklogin($_POST['use'], $_POST['pass']);
}
if (isset($_POST['addsp']))
    $controller->addsp();
if (isset($_POST['editsp']))
    $controller->suasp();
if (isset($_POST['addlh']))
    $controller->addlh();
if (isset($_POST['editkh']))
    $controller->suakh();
if (isset($_POST['addu']))
    $controller->addu();
if (isset($_POST['register']))
    $controller->Register();
if (isset($_GET['idsp']))
    $controller->hidesp($_GET['idsp']);
if (isset($_POST['editbaner']))
    $controller->updatebn($_GET['idsua']);
if (isset($_GET['idttkh']))
    $controller->hidelh($_GET['idttkh']);
if (isset($_POST['editw']))
    $controller->editw($_POST['icon'], $_POST['ten'], $_GET['idsuaw']);
if (isset($_POST['editlienhe']))
    $controller->updatelienhe1(1);
if (isset($_GET['idxoau']))
    $controller->deleteu($_GET['idxoau']);
if (isset($_GET['idlh']))
    $controller->hidekh($_GET['idlh']);
if (isset($_GET['idphcttv']))
    $controller->phcttv($_GET['idphcttv']);
if (isset($_GET['idphbv']))
    $controller->phbv($_GET['idphbv']);
if (isset($_GET['idxvvbv']))
    $controller->deletebv($_GET['idxvvbv']);
if (isset($_GET['idphsp']))
    $controller->phsp($_GET['idphsp']);
if (isset($_GET['idxvvsp']))
    $controller->deletesp($_GET['idxvvsp']);
if (isset($_GET['idphkh']))
    $controller->phkh($_GET['idphkh']);
if (isset($_GET['idxvvkh']))
    $controller->deletelh($_GET['idxvvkh']);
if (isset($_POST['edithome2']))
    $controller->updatehome2($_GET['idhome']);
if (isset($_POST['addhome2']))
    $controller->addhome2();
if (isset($_GET['deletehome2']))
    $controller->deletehome2($_GET['deletehome2']);
if (isset($_GET['idh2']))
    $controller->hideh2($_GET['idh2']);
if (isset($_GET['idphh2']))
    $controller->phh2($_GET['idphh2']);
if (isset($_POST['addcttv']))
    $controller->addcttv();
if (isset($_POST['editcttv']))
    $controller->updatecttv1();
if (isset($_GET['idcttv']))
    $controller->hidecttv($_GET['idcttv']);
if (isset($_POST['addph']))
    $controller->addph();
if (isset($_GET['idph']))
    $controller->hideph($_GET['idph']);
if (isset($_POST['editphanhoi']))
    $controller->suaphanhoi();
if (isset($_GET['idttkh']))
    $controller->deletettkh($_GET['idttkh']);
if (isset($_POST['edittrangchu1']))
    $controller->suatrangchu1();
if (isset($_POST['editfooter']))
    $controller->updatefooter1();
if (isset($_POST['editlink']))
    $controller->updatelink();
if (isset($_GET['idlienhe']))
    $controller->hidelienhe($_GET['idlienhe']);
if (isset($_GET['idphlienhe']))
    $controller->phlienhe($_GET['idphlienhe']);
if (isset($_GET['idphph']))
    $controller->phphkh($_GET['idphph']);
if (isset($_GET['idttkh']))
    $controller->deletettkh($_GET['idttkh']);
if (isset($_POST['xnd']))
    $controller->hidecbsp();
if (isset($_POST['xndbv']))
    $controller->hidecbbv();
if (isset($_POST['xndkh']))
    $controller->hidecbkh();
if (isset($_POST['xndlh']))
    $controller->hidecblh();
if (isset($_POST['xndu']))
    $controller->hidecbu();
if (isset($_POST['xndh2']))
    $controller->hidecbh2();
if (isset($_POST['xndphkh']))
    $controller->hidecbphkh();
if (isset($_POST['xvvndh2']))
    $controller->deletecbh2();
if (isset($_POST['xvvndcttv']))
    $controller->deletecbcttv();
if (isset($_POST['xvvndphkh']))
    $controller->deletecbphkh();
if (isset($_POST['xndcttv']))
    $controller->hidecbcttv();
if (isset($_POST['xvvndbv']))
    $controller->deletecbbv();
if (isset($_POST['xvvnd']))
    $controller->deletecbsp();
if (isset($_POST['xvvndbva']))
    $controller->deleteabv();
if (isset($_POST['xvvnda']))
    $controller->deleteasp();
if (isset($_POST['xvvndkha']))
    $controller->deleteakh();
if (isset($_POST['xvvndlha']))
    $controller->deletealh();
if (isset($_POST['xvvndh2a']))
    $controller->deleteah2();
if (isset($_POST['xvvndcttva']))
    $controller->deleteacttv();
if (isset($_POST['xvvndphkha']))
    $controller->deleteaphkh();
if (isset($_POST['xvvndkh']))
    $controller->deletecbkh();
if (isset($_POST['xvvndlh']))
    $controller->deletecblh();
if (isset($_POST['editprofile']))
    $controller->updateprof();
if (isset($_GET['idan']))
    $controller->anthongtin($_GET['idan']);
if (isset($_GET['idhien']))
    $controller->hienthongtin($_GET['idhien']);


// if (isset($_GET['idsuakh']))
//     $controller->update($_GET['idsuakh']);

// isset($_SESSION['use']) ? $usename = $_SESSION['use'] : null;
// isset($_SESSION['level']) ? $level = $_SESSION['level'] : null;
date_default_timezone_set("Asia/Ho_Chi_Minh");
$time = date("Y-m-d H:i:s");
isset($_SESSION['task']) ? $task = $_SESSION['task'] : null;//
isset($_SESSION['ct']) ? $ct = $_SESSION['ct'] : null;
if (isset($_SESSION['iduse'])) {
    $getu = mysqli_fetch_array($controller->getusel($_SESSION['iduse']));
    if ($getu['tthai'] == 'off' && $getu['level'] != 1) {
        $task = 'login';
    }
} else {
    $task = 'login';
}


// $durationInSeconds = $end - $start;
// $durationInMinutes = $durationInSeconds / 60;



// if($controller->getusel()['tgdn']<$durationInMinutes) $task = 'login';

// if(!isset($_COOKIE['user'])) $task = 'login';

//echo "<script>console.log('{$_COOKIE['use']}')</script>";

switch ($task) {
    case 'pageHome':
        $controller->getPageHome();
        break;
    case 'editfooter':
        $controller->editfooter();
        break;
    case 'qlfooter':
        $controller->qlfooter();
        break;
    case 'ht':
        $controller->ht();
        break;
    case 'ttkh':
        $controller->ttkh();
        break;
    case 'them':
        $controller->them();
        break;
    case 'themu':
        $controller->themu();
        break;
    case 'edit':
        $controller->edit();
        break;
    case 'qlu':
        $controller->qlu();
        break;
    case 'qlsp':
        $controller->qlsp();
        break;
    case 'tsp':
        $controller->themsp();
        break;
    case 'login':
        $controller->login();
        break;
    case 'qlbaner':
        $controller->baner();
        break;
    case 'suabaner':
        $controller->suabaner();
        break;
    case 'qlkh':
        $controller->qlkh();
        break;
    case 'tlh':
        $controller->tlh();
        break;
    case 'editsp':
        $controller->editsp();
        break;
    case 'qlweb':
        $controller->qlwebsite();
        break;
    case 'suaw':
        $controller->suawebsite();
        break;
    case 'editkh':
        $controller->editkh();
        break;
    case 'qllh':
        $controller->qllh();
        break;
    case 'editlienhe':
        $controller->editlienhe();
        break;
    case 'qlvet':
        $controller->qlvet();
        break;
    case 'edithome2':
        $controller->edithome2();
        break;
    case 'addhome2':
        $controller->addhome();
        break;
    case 'qlhome2':
        $controller->qlhome2();
        break;
    case 'qlctytv':
        $controller->qlctytv();
        break;
    case 'tcttv':
        $controller->tcttv();
        break;
    case 'editcttv':
        $controller->editcttv();
        break;
    case 'qlphanhoi':
        $controller->qlphanhoi();
        break;
    case 'themph':
        $controller->themph();
        break;
    case 'editphanhoi':
        $controller->editphanhoi();
        break;
    case 'qltrchu1':
        $controller->qltrchu1();
        break;
    case 'edittrangchu1':
        $controller->edittrangchu1();
        break;
    case 'sualink':
        $controller->sualink();
        break;
    case 'updateOrder':
        $controller->updateOrder();
        break;
    case 'updateOrderhome2':
        $controller->updateOrderhome2();
        break;
    case 'profile':
        $controller->profile();
        break;
    default:
        $controller->getPageHome();
        break;

}
if (isset($_SESSION['task']))
    unset($_SESSION['task']);

if (isset($_SESSION['ct']))
    unset($_SESSION['ct']);
?>