<?php

namespace App\Enum;

enum OrderStatus: string
{
    case PAID = 'paid';

    case UNPAID = 'unpaid';

    case PENDING = 'pending';
}
