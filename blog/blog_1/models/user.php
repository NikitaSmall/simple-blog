<?php

function checkUser($login, $password)
{
  if ($login == 'admin' && $password == 'admin') {
    return true;
  }

  return false;
}
