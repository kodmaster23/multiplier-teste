<?php


namespace App\Domains\Orders\Repositories;


use App\Domains\Orders\Models\Order;
use App\Domains\Orders\Models\OrderItem;
use Freelabois\LaravelQuickstart\Extendables\Repository;

class OrderItemRepository extends Repository
{

    protected $model= OrderItem::class;

}
