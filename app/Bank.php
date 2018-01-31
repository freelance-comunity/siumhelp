<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'banks';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'company_number', 'payment_form_id', 'payment_form', 'base_year', 'campus_id'];

    public function variable()
    {
        return $this->hasOne('App\Variable');
    }



}
