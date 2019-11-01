<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('logo')->nullable();
            $table->string('simple_description')->nullable();
            $table->string('delai')->nullable();
            $table->date('start_date');
            $table->string('name');
            $table->text('resume')->nullable();
            $table->string('resume_path')->nullable();
            $table->smallInteger('state');
            $table->float('price');
            $table->timestamps();
        });
        Schema::table('devis', function (Blueprint $table) {
            $table->integer('projet_id')->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devis');
    }
}
