<?php


namespace App\Domains\Products\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'price',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
