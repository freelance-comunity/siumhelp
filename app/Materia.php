<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    /**
     * The database connection used by the model.
     *
     * @var string
     */
     protected $connection = 'sium';

     /**
     * The database table used by the model.
     *
     * @var string
     */
     protected $table = 'sium.vw_carga_docente';
}
