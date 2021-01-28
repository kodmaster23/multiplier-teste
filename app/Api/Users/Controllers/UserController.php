<?php


namespace App\Api\Users\Controllers;


use App\Domains\Users\Managers\UserManager;
use App\Domains\Users\Repositories\UserRepository;
use Freelabois\LaravelQuickstart\Traits\Crudable;

class UserController
{
    use Crudable;

    public function setup(UserManager $manager, UserRepository $repository)
    {
        $this->setup($manager, $repository);
    }


}
