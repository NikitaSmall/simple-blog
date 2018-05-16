<?php
$result = [];
foreach (range(0, 10, 1) as $value) {
  if ($value % 2 == 1) {
      $result[] = $value;
  }
}

var_dump($result);
