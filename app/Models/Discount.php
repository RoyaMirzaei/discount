<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $fillable=['title','code','type_discount','type_value','value_fixed','value_percent','max_discount','count_user','count_discount','start_date','expiry_date','status'];

    public function Users()
    {
        return $this->morphedByMany(User::class)->using(Discountable::class);
    }

    public function Products()
    {
        return $this->morphedByMany(Product::class)->using(Discountable::class);
    }
}
