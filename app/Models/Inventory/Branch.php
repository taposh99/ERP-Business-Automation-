<?php

namespace App\Models\Inventory;

use App\Models\ProductSetup\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function warehouse(){
        return $this->hasMany(Warehouse::class);
    }

    public function product(){
        return $this->hasMany(Product::class);
    }
}
