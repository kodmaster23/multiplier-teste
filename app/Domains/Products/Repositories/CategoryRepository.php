<?php


namespace App\Domains\Products\Repositories;


use App\Domains\Products\Models\Category;
use Freelabois\LaravelQuickstart\Extendables\Repository;

class CategoryRepository extends Repository
{

    protected $model = Category::class;
}
