<?php
# ..src\Entity\Enum\CRAList.php

declare(strict_types=1);

namespace App\Entity\Enum;

enum Gender: string 
{
    case Masculin = 'Masculin'; 
    case Feminin = 'Féminin'; 
};