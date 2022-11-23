<?php

namespace App\Models\ProductSetup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function subCategories(){
        return $this->hasMany(Subcategory::class);
    }

    public function product(){
        return $this->hasMany(Product::class);
    }
}
