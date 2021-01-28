<?php


namespace App\Domains\Orders\Repositories;


use App\Domains\Orders\Models\Order;
use Freelabois\LaravelQuickstart\Extendables\Repository;

class OrderRepository extends Repository
{

    protected $model= Order::class;

}
