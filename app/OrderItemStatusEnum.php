<?php

namespace App;

enum OrderItemStatusEnum: int
{
    case  PENDING = 1;
    case  BOUGHT = 2;
    // case NOT_READY = 3;
    case  NOT_AVAILABLE = 4;

     public static function getName(int $status): string
    {
        return match ($status) {
            self::PENDING->value => 'Pending',
            self::BOUGHT->value => 'Bought',
            // self::NOT_READY->value => 'Not Ready',
            self::NOT_AVAILABLE->value => 'Not Available',
        };
    }
}
