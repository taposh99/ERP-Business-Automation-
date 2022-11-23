<?php

namespace App\Models\Inventory;

use App\Models\ProductSetup\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function branch(){
        return $this->belongsTo(Branch::class);
    }

    public function product(){
        return $this->hasMany(Product::class);
    }
}
