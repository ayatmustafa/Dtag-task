<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=["name",'image','purchase_price','sale_price','stock'];

    public function getNameAttribute($value)
    {
        return ucfirst($value);

    }//end of get  name
    public function users()
    {
        return $this->belongsToMany(User::class,'product_user');

    }//end fo products
}
