<?php

class OptionController extends BaseController
{
  public static function createForm()
  {
    $products = ProductRepo::getBaseProductsInfo();
    require_once './templates/admin/option_form.php';
  }

  public static function create()
  {
    OptionRepo::create($_POST['product_id'], $_POST['price'],
                       $_POST['amount'],  $_POST['title'],
                       $_POST['desc']);

    self::redirect('/');
  }
}
