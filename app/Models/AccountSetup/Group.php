<?php

namespace App\Models\AccountSetup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function allClass(){
        return $this->belongsTo(AllClass::class);
    }
    
    public function subGroup(){
        return $this->hasMany(SubGroup::class);
    }
}
