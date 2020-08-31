<?php

use Database\Migrations\Traits\CommonMigration;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    use CommonMigration;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->string('name');
            $table->string('photo')->nullable();
            $table->string('dateBirth')->nullable();
            $table->string('genre')->nullable();

            $table->bigInteger('user')->unsigned()->nullable();
            $table->foreign('user')->references('id')->on('users');

            $table->bigInteger('state')->unsigned()->nullable();
            $table->foreign('state')->references('id')->on('states');

            $table->bigInteger('country')->unsigned()->nullable();
            $table->foreign('country')->references('id')->on('countries');

            $this->setUsersBy($table);
            $this->timestampsSoftDeletes($table);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidates');
    }
}
