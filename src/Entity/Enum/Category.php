<?php
# ..src\Entity\Enum\CRAList.php

declare(strict_types=1);

namespace App\Entity\Enum;

enum Category: string 
{
    case Elite = 'Elite'; 
    case Honneur = 'Honneur'; 
    case Découverte = 'Découverte'; 
};