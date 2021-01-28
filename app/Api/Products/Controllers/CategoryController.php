<?php


namespace App\Api\Products\Controllers;


use App\Domains\Products\Managers\CategoryManager;
use App\Domains\Products\Repositories\CategoryRepository;
use Freelabois\LaravelQuickstart\Traits\Crudable;

class CategoryController
{
    use Crudable;

    public function __construct(CategoryManager $manager, CategoryRepository $repository)
    {
        $this->setup($manager, $repository);
    }


}
