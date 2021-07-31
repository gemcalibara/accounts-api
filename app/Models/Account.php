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
     * @return App\Models
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

}