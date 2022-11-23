<?php

namespace App\Models\AccountSetup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllClass extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function group(){
        return $this->hasMany(Group::class);
    }
}
