<?php

class Utils
{
  const CHARS = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

  public static function placeholder()
  {
    $size = 80 + rand(-2, 2);
    return "https://placekitten.com/$size/$size";
  }

  public static function generateSalt()
  {
    $randstring = '';
    for ($i = 0; $i < 10; $i++) {
        $randstring .= self::CHARS[rand(0, strlen(self::CHARS))];
    }
    return $randstring;
  }
}
