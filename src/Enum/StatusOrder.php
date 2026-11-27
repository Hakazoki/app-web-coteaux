<?php

namespace App\Enum;

enum StatusOrder: string
{
    case PENDING = 'en attente';
    case PREPARE = 'en préparation';
    case READY = 'prêt';
    case FINISHED = 'retiré';
    case CANCELED = 'annulé';
}