<?php

class ProductController extends BaseController
{
  public static function createForm()
  {
    require_once './templates/admin/product_form.php';
  }

  public static function create()
  {
    ProductRepo::create($_POST['title'], $_POST['desc']);
    self::redirect('/');
  }
}
