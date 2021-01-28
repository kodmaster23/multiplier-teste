<?php


namespace App\Api\Orders\Controllers;


use App\Domains\Orders\Managers\OrderManager;
use App\Domains\Orders\Repositories\OrderRepository;
use Freelabois\LaravelQuickstart\Traits\Crudable;

class OrderController
{

    use Crudable;

    public function __construct(OrderManager $manager, OrderRepository $repository)
    {
        $this->setup($manager, $repository);
    }


}
