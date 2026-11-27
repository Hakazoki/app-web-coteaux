<?php

namespace App\Enum;

enum Status: string
{
    case DISPO = 'disponible';
    case NODISPO = 'out of stock';
}