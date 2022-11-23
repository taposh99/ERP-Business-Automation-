<?php

namespace App\Models\Bank;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccounts extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_no',
        'title',
        'bank_id',
        'account_type',
        'branch',
        'branch_code',
        'location',
        'debit',
        'credit',
        'balance',
    ];

    public function bank(){
        return $this->belongsTo(Bank::class);
    }

    public function transaction(){
        return $this->hasMany(Transaction::class);
    }
}
