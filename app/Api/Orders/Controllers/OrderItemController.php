<?php


namespace App\Api\Orders\Controllers;


use App\Domains\Orders\Managers\OrderItemManager;
use Freelabois\LaravelQuickstart\Traits\DoDestroy;
use Freelabois\LaravelQuickstart\Traits\DoStore;
use Illuminate\Http\Request;

class OrderItemController
{
    use DoStore, DoDestroy;
    /**
     * @var OrderItemManager
     */
    private $order_item_manager;

    public function __construct(OrderItemManager  $order_item_manager)
    {
        $this->order_item_manager = $order_item_manager;
    }

    public function store(Request $request){
        $sanitized_input = $request->all();
        return $this->order_item_manager->storeOrUpdate($sanitized_input);
    }

    public function destroy(Request $request)
    {
        $sanitized_input = $request->all();
        return $this->order_item_manager->destroy($sanitized_input['item']);
    }


}
