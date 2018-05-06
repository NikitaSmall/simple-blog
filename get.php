<?php

  function sumWithGet($a, $b, $c) {
    return $a + $b + $c;
  }

  echo sumWithGet(4, 8, $_GET['c']);
  # $_POST
