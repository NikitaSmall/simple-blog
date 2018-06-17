<?php

class Utils
{
  public static function placeholder()
  {
    $size = 80 + rand(-2, 2);
    return "https://placekitten.com/$size/$size";
  }
}
