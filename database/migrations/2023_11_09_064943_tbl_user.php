<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tbl_user',function(Blueprint $table){
            $table->integer('id_user',true,false)->nullable(false);
            $table->string('username',200)->unique('idXUser')->nullable(false);
            $table->text('password')->nullable(false);
            $table->enum('role',['admin','operator'])->nullable(false)->default('operator');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('tbl_user');
    }
}