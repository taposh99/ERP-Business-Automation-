<?php

namespace App\Models\ProductSetup;

use App\Models\Inventory\Branch;
use App\Models\Inventory\Warehouse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function product(){
        return $this->hasOne(Product::class,'id');
    }
}
