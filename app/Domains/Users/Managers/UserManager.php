<?php


namespace App\Domains\Users\Managers;


use App\Domains\Users\Repositories\UserRepository;
use Freelabois\LaravelQuickstart\Extendables\ManipulationManager;
use Illuminate\Support\Facades\Hash;


class UserManager extends ManipulationManager
{

    public function __construct(UserRepository $repository)
    {
        parent::__construct($repository);
    }

    public function storeOrUpdate($values, int $id = null, array $relations = [])
    {
        if ($values['password'] ?? null) {
            $values['password'] = Hash::make($values['password']);
        }
        return parent::storeOrUpdate($values, $id, $relations);
    }


}
