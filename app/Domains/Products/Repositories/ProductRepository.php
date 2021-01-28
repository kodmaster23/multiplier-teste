<?php


namespace App\Domains\Products\Repositories;


use App\Domains\Products\Models\Product;
use Freelabois\LaravelQuickstart\Extendables\Repository;

class ProductRepository extends Repository
{

    public $model = Product::class;

}
