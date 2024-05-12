<?php

namespace App\Enums;

enum PaymentStatusEnum: string
{
    case PENDING = 'Pending';
    case FAILED = 'Failed';
    case PROCESSED = 'Processed';

}
