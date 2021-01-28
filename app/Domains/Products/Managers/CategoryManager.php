<?php


namespace App\Domains\Products\Managers;


use App\Domains\Products\Repositories\CategoryRepository;
use Freelabois\LaravelQuickstart\Extendables\ManipulationManager;

class CategoryManager extends ManipulationManager
{

    public function __construct(CategoryRepository $repository)
    {
        parent::__construct($repository);
    }

}
