<?php

namespace App\Models\ProductSetup;

use App\Models\Inventory\Branch;
use App\Models\Inventory\Warehouse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function subCategory(){
        return $this->belongsTo(Subcategory::class);
    }
    public function stock(){
        return $this ->hasOne(Stock::class);
    }

    public function branch(){
        return $this ->belongsTo(Branch::class);
    }

    public function warehouse(){
        return $this ->belongsTo(Warehouse::class);
    }

}
