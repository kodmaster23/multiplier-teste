<?php


namespace App\Domains\Orders\Managers;


use App\Domains\Orders\Events\FinishedOrder;
use App\Domains\Orders\Repositories\OrderRepository;
use Freelabois\LaravelQuickstart\Extendables\ManipulationManager;

class OrderManager extends ManipulationManager
{

    public function __construct(
        OrderRepository $repository
    )
    {
        parent::__construct($repository);
    }

    public function finishOrder($order)
    {
        $finished_order = $this->storeOrUpdate(['finished_at' => now()], $order);

        FinishedOrder::dispatch($finished_order);

        return $finished_order;
    }

    public function storeOrUpdate($values, int $id = null, array $relations = [])
    {
        $relations[] = [
            'name' => 'user',
            'model' => auth()->user()
        ];

        return parent::storeOrUpdate($values, $id, $relations);
    }


}
