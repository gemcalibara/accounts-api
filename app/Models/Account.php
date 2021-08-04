<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model 
{

    protected $table = 'accounts';

    protected $guarded = [];

    public $timestamps = false;
    
    /**
     * An account has multiple transactions
     *
     * @return App\Models\Transaction
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    
    /**
     * scopeGetTotalAmountOfTransactions
     *
     * @param  mixed $query
     * @return Illuminate\Database\Eloquent\Model
     */
    public function scopeGetTotalAmountOfTransactions($query)
    {
        return $query->select('id', 'account_name')
                        ->withSum('transactions', 'amount');
    }

}