<?php

namespace App;

enum OrderStatusEnum: int
{
    case  PENDIND = 1;
    case  SUCCESSFULL = 2;
    case CANCELED = 3;
    // case  ACCEPTED = 4;
    // case REJECTED = 5;
    // case TRANFERED = 6;
    // case NOT_PICKED = 7;


    public static function getName(int $status): string
    {
        return match ($status) {
            self::PENDIND->value => 'Pending',
            self::SUCCESSFULL->value => 'Successfull',
            self::CANCELED->value => 'Canceled',
            // self::ACCEPTED->value => 'Accepted',
            // self::REJECTED->value => 'Rejected',
            // self::TRANFERED->value => 'Transfered',
            // self::NOT_PICKED->value => 'Not picked',
        };
    }
}
