<?php
require_once "models/model.php";
require_once "views/view.php";
class Controller
{
  var $model, $view;
  function __construct()
  {
    $this->model = new Model();
    $this->view = new View();
  }

  public function getPageHome()
  {
    $this->view->getPageHome();
  }

  public function dhduc()
  {
    $this->view->dhduc();
  }
  public function dhnb()
  {
    $this->view->dhnb();
  }
  public function dhdl()
  {
    $this->view->dhdl();
  }
  public function dhuc()
  {
    $this->view->dhuc();
  }
  public function dhhq()
  {
    $this->view->dhhq();
  }
  public function xkgt()
  {
    $this->view->xkgt();
  }
  public function xksp()
  {
    $this->view->xksp();
  }
  public function nnduc()
  {
    $this->view->nnduc();
  }
  public function nnhq()
  {
    $this->view->nnhq();
  }
  public function contact()
  {
    $this->view->contact();
  }



}

?>