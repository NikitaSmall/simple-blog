<?php

class MainController extends BaseController
{
  public static function index()
  {
    $products = ProductRepo::getAll();
    require_once Config::TEMPLATE_PATH . 'index.php';
  }
}
