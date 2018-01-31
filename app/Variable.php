<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variable extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'variables';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['bank_start', 'bank_length', 'date_start', 'date_length', 'amount_start', 'amount_length', 'payment_start', 'payment_length', 'cycle_start', 'cycle_length', 'bank_id'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function bank()
    {
        return $this->belongsTo('App\Bank');
    }

}
