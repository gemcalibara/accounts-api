<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model 
{

    protected $table = 'transactions';
    
    protected $guarded = [];

    public $timestamps = false;
    
    /**
     * A transaction belongs to a specific account
     *
     * @return App\Models\Account
     */
    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    /**
     * Get the amount to double value.
     *
     * @param  string  $value
     * @return void
     */
    public function getAmountAttribute($value)
    {
        return doubleval($value);
    }

}