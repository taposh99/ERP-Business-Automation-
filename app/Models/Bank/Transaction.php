<?php

namespace App\Models\Bank;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'tran_no',
        'date',
        'total_amount',
        'note',
        'source',
        'payto',
        'amount',
        'cheque_no',
        'cq_date',
        'refference',
    ];

    public function bank_account(){
        return $this->belongsTo(BankAccounts::class);
    }
}
