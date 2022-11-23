<?php

namespace App\Models\Payroll;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function leave_application(){
        return $this->hasMany(LeaveApplication::class);
    } 
}
