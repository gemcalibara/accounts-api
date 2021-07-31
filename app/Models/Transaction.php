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
     * @return App\Models
     */
    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

}