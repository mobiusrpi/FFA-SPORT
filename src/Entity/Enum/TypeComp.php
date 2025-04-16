<?php
# ..src\Entity\Enum\CRAList.php

declare(strict_types=1);

namespace App\Entity\Enum;

enum TypeComp: string 
{
    case Rallye = '1'; 
    case Pilotage_précision = '2'; 
    case ANR = '3'; 
};