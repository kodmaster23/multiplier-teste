<?php


namespace App\Domains\Users\Traits;


use App\Domains\Users\Models\User;

trait HasUser
{

    public function user(){
        return $this->belongsTo(User::class);
    }

}
