<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('logo')->nullable();
            $table->string('simple_description')->nullable();
            $table->string('work_book')->nullable();
            $table->date('start_date');
            $table->string('name');
            $table->text('resume')->nullable();
            $table->string('resume_path')->nullable();
            $table->smallInteger('state');
            $table->float('price');
            $table->timestamps();
        });

        Schema::table('projets', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->index();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projets');
    }
}
