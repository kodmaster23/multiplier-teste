<?php


namespace App\Domains\Orders\Models;


use App\Domains\Users\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    use HasUser;

    protected $fillable =
        [
            'finished_at'
        ];

    public function items(){
        return $this->hasMany(OrderItem::class);
    }

}
