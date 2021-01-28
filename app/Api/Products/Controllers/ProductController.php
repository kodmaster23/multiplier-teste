<?php


namespace App\Api\Products\Controllers;


use App\Domains\Products\Managers\CategoryManager;
use App\Domains\Products\Managers\ProductManager;
use App\Domains\Products\Repositories\CategoryRepository;
use App\Domains\Products\Repositories\ProductRepository;
use Freelabois\LaravelQuickstart\Traits\Crudable;

class ProductController
{
    use Crudable;

    public function __construct(ProductManager $manager, ProductRepository $repository)
    {
        $this->setup($manager, $repository);
    }


}
