<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVariablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('variables', function(Blueprint $table) {
                $table->increments('id');
                $table->integer('bank_start');
			    $table->integer('bank_length');
			    $table->integer('date_start');
			    $table->integer('date_length');
			    $table->integer('amount_start');
                $table->integer('amount_length');
                $table->integer('payment_start');
                $table->integer('payment_length');
                $table->integer('cycle_start');
                $table->integer('cycle_length');
			    $table->integer('bank_id')->unsigned();
		        $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade');

                $table->timestamps();
                $table->softDeletes();
            });
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('variables');
    }

}