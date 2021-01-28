<?php


namespace App\Domains\Orders\Managers;


use App\Domains\Orders\Repositories\OrderItemRepository;
use App\Domains\Orders\Repositories\OrderRepository;
use App\Domains\Products\Repositories\ProductRepository;
use Freelabois\LaravelQuickstart\Extendables\ManipulationManager;

class OrderItemManager extends ManipulationManager
{
    /**
     * @var ProductRepository
     */
    private $product_repository;
    /**
     * @var OrderRepository
     */
    private $order_repository;

    public function __construct(
        OrderItemRepository $repository,
        ProductRepository $product_repository,
        OrderRepository $order_repository
    )
    {
        parent::__construct($repository);
        $this->product_repository = $product_repository;
        $this->order_repository = $order_repository;
    }

    public function storeOrUpdate($values, int $id = null, array $relations = [])
    {
        $product = null;
        $order = null;

        if (!$id) {
            $product = $this->product_repository->find($values['product']);
            $order = $this->order_repository->find($values['order']);

            $relations = [
                [
                    'name' => 'order',
                    'model' => $order
                ]
                , [
                    'name' => 'product',
                    'model' => $product
                ]
            ];

        }
        if($id && $values['quantity'] > 0){

            $current_item = $this->repository->find($id, ['product', 'order']);
            $order = $current_item->order;
            $product = $current_item->product;
        }else{
            return $this->destroy($id);
        }


        $values['current_price'] = $product->price;

        parent::storeOrUpdate($values, $id, $relations);

        $refreshed_order = $order->fresh(['items']);

        return $refreshed_order->items;
    }

    public function destroy(int $id)
    {
        $order = $this->repository->find($id, ['order']);
        parent::destroy($id);
        $refreshed_order = $order->fresh(['items']);

        return $refreshed_order->items;

    }


}
