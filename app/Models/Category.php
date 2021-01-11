<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=['title','slug','summary','image','status'];

    public function Products()
    {
        return $this->hasMany(Product::class,'category_id','id');
        //note:one to many in two model category & product
    }
}
