<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('animals', function (Blueprint $table) {
        $table->increments('id', true);
        $table->string('pname', 60);
        $table->string('dname', 60);
        $table->string('address', 120);
        $table->integer('location_id');
        $table->integer('nacin_id');
        $table->integer('reason_id');
        $table->char('chip', 20);
        $table->integer('age');
        $table->date('date');
        $table->text('text');
        $table->string('picture', 60);
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
        Schema::dropIfExists('animals');
    }
}
