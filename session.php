<?php

session_start();

if (isset($_SESSION['a'])) {
    $_SESSION['a'] += 1;
} else {
  $_SESSION['a'] = 0;
}

echo $_SESSION['a'];
