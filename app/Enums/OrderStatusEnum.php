<?php

namespace App\Enums;

enum OrderStatusEnum: string
{
    case PENDING = 'Pending';
    case REJECTED = 'Rejected';
    case IN_WAREHOUSE = 'In_Warehouse';
    case DISPATCHED = 'Dispatched';
    case IN_DELIVERY = 'In_Delivery';
    case DELIVERED = 'Delivered';
    case COMPLETED = 'Completed';

}
