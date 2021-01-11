<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['title','slug','summary','description','price','discount','status','image'];

    public function Category()
    {
        return $this->belongsTo(Category::class);
        //note:one to many in two model category & product
    }
    public function Discounts()
    {
        return $this->morphToMany(Discount::class)->using(Discountable::class);
    }


}
