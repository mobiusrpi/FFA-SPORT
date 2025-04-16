<?php
# ..src\Entity\Enum\CRAList.php

declare(strict_types=1);

namespace App\Entity\Enum;

enum Polosize: string 
{
    case S = 'S'; 
    case M = 'M'; 
    case L = 'L'; 
    case XL = 'XL'; 
    case XXL = '2XL'; 
    case XXXL = '3XL'; 
    case XXXXL = '4XL'; 
    case XXXXXL = '5XL'; 
};