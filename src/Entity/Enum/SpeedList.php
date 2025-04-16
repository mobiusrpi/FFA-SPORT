<?php
# ..src\Entity\Enum\SpeedList.php

declare(strict_types=1);

namespace App\Entity\Enum;

enum SpeedList: string {
    case S60 = '60'; 
    case S65 = '65'; 
    case S70 = '70';
    case S75 = '75'; 
    case S80 = '80'; 
    case S85 = '85'; 
    case S90 = '90';
};