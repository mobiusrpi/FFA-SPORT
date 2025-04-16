<?php
# ..src\Entity\Enum\CRAList.php

declare(strict_types=1);

namespace App\Entity\Enum;

enum CRAList: string 
{
    case CRA1 = '1 - Auvergne-Rhône-Alpe'; 
    case CRA2 = '2 - Bourgogne-Franche-Comté'; 
    case CRA3 = '3 - Bretagne'; 
    case CRA4 = '4 - Centre'; 
};

