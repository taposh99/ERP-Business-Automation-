<?php

namespace App\Models\AccountSetup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubGroup extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function group(){
        return $this->belongsTo(Group::class);
    }
    public function ledger(){
        return $this ->hasMany(Ledger::class);
    }
}
