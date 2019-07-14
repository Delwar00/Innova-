<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConstructionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('constructions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('construct_title');
             $table->longText('construct_details')->nullable();
             $table->string('construct_button');
             $table->integer('construct_status')->default(1)->comment('1=deactive,2=active');
             $table->string('construct_image')->default('construction_photos/defaltconstimage.jpg');
             $table->string('construct_renovation');
             $table->string('construct_started');
             $table->string('construct_free_estimate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('constructions');
    }
}
