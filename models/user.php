<?php

class User
{
  const MANUAL = 0;
  const ORDER = 1;

  public function registrationType()
  {
    $type = '';

    switch ($this->registration_type) {
      case self::MANUAL:
        $type = 'manual';
        break;
      case self::ORDER:
        $type = 'after order';
        break;

      default:
        $type = 'unknown';
        break;
    }

    return $type;
  }

  public function isAdmin()
  {
    # return strpos($this->username, 'admin') !== false;
    return $this->admin;
  }
}
