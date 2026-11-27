<?php

namespace App\Enum;

enum Activity: string
{
    case CHEESE = 'fromager';
    case WINE = 'vigneron';
    case CHICKEN = 'éleveur de poulet';
    case JUICE = 'producteur de jus de pomme';
    case HONEY = 'apiculteur';
    case BREAD = 'boulanger';
    case VEGETABLE = 'maraicher';
    case HERB = "cueilleur d'herbe médicinales";
}