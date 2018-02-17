<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'study_plan_id', 'subject_id', 'grade', 'group_id', 'teacher_id'
    ];

     /**
     * The database table used by the model.
     *
     * @var string
     */
     protected $table = 'teacher_group_class';

     public $timestamps = false;
}
