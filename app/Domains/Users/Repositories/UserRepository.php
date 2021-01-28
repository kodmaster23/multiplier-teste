<?php


namespace App\Domains\Users\Repositories;


use App\Domains\Users\Models\User;
use Freelabois\LaravelQuickstart\Extendables\Repository;

class UserRepository extends Repository
{
    protected $model = User::class;

}
