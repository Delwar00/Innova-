<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->increments('id');
             $table->string('about_title')->default('about');
             $table->longText('about_details')->nullable();
             $table->string('about_point')->default('why??');
             $table->integer('about_status')->default(1)->comment('1=deactive,2=active');
             $table->string('about_image')->default('about_photos/defaltaboutimage.jpg');
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
        Schema::dropIfExists('abouts');
    }
}
