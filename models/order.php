<?php

class Order
{
  const NEW_ORDER = 0;
  const PROCESSED = 1;
  const IN_DELIVERY = 2;
  const DONE = 3;

  public function status()
  {
    $status = '';

    switch ($this->status) {
      case self::NEW_ORDER:
        $status = 'new order';
        break;
      case self::PROCESSED:
        $status = 'processed';
        break;
      case self::IN_DELIVERY:
        $status = 'in delivery';
        break;
      case self::DONE:
        $status = 'completed';
        break;
      default:
        $status = 'unknown';
        break;
    }

    return $status;
  }
}
