<?php
# ..src\Entity\Enum\SpeedList.php

declare(strict_types=1);
namespace App\Entity\Enum;

enum SpeedList: string 
{
    case S60 = '60';
    case S65 = '65';
    case S70 = '70';
    case S75 = '75';
    case S80 = '80';
    case S85 = '85';
    case S90 = '90';
    case S95 = '95';


    public function label(): string {
        return match ($this) {
            self::S60  => '60 kt',
            self::S65  => '65 kt',
            self::S70  => '70 kt',
            self::S75  => '75 kt',
            self::S80  => '80 kt',
            self::S85  => '85 kt',
            self::S90  => '90 kt',
            self::S95  => '95 KT',
      };
    }
}