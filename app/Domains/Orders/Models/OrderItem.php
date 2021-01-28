<?php


namespace App\Domains\Orders\Models;


use App\Domains\Products\Models\Product;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{

    protected $fillable =
        [
            'quantity',
            'current_price'
        ];

    public function getTotalAttribute()
    {

        return $this->quantity * $this->current_price;

    }


    public function product()
    {
        return $this->hasOne(Product::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
