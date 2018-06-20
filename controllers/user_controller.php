<?php

class UserController extends BaseController
{
  public static function loginForm()
  {
    require_once './templates/users/login.php';
  }

  public static function registerForm()
  {
    require_once './templates/users/register.php';
  }

  public static function login()
  {
    $user = UserRepo::checkUser($_POST['email'], $_POST['password']);

    if ($user) {
      $_SESSION[self::$userSessionField] = $user;

      self::redirect('/');
    } else {
      self::redirect('/users/login');
    }
  }

  public static function register()
  {
    UserRepo::create($_POST['email'], $_POST['password']);
    self::redirect('/users/login');
  }

  public static function logout()
  {
    unset($_SESSION[self::$userSessionField]);
    self::redirect('/');
  }
}
