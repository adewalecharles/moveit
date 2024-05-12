<?php

namespace App\Enums;

enum ShipmentStatusEnum: string
{
    case PENDING = 'Pending';
    case REJECTED = 'Rejected';
    case DISPATCHED = 'Dispatched';
    case IN_DELIVERY = 'In_Delivery';
    case DELIVERED = 'Delivered';
    case COMPLETED = 'Completed';
}
