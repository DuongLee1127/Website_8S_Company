<?php
ini_set('session.cookie_path', '/');
session_start();
require_once('./controllers/controller.php');
$controller = new Controller();
$task = isset($_GET['task']) ? $_GET['task'] : 'pageHome';
// $_SESSION['tasku']=$task;

switch ($task) {
	case 'pageHome':
		$controller->getPageHome();
		break;
	case 'dhduc':
		$controller->dhduc();
		break;
	case 'dhdl':
		$controller->dhduc();
		break;
	case 'dhnb':
		$controller->dhduc();
		break;
	case 'dhuc':
		$controller->dhduc();
		break;
	case 'dhhq':
		$controller->dhduc();
		break;
	case 'xkldnhat':
		$controller->xkgt();
		break;
	case 'xksp':
		$controller->xksp();
		break;
	case 'lopduc':
		$controller->nnduc();
		break;
	case 'lophan':
		$controller->nnduc();
		break;
	case 'contact':
		$controller->contact();
		break;
	default:
		$controller->getPageHome();
		break;
}
