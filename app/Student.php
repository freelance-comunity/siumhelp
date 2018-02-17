<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{   
     /**
     * The database table used by the model.
     *
     * @var string
     */
     protected $table = 'students';

     var invocation = new XMLHttpRequest();
     var url = 'http://bar.other/resources/public-data/';
   
     function callOtherDomain() {
      if(invocation) {    
      invocation.open('GET', url, true);
      invocation.onreadystatechange = handler;
      invocation.send(); 
      invocation.load();
     }
    }
}
