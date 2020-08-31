<?php

use Database\Migrations\Traits\CommonMigration;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicTenderNoticesTable extends Migration
{
    use CommonMigration;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_tender_notices', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description', 1500);
            $table->string('year');

            $table->bigInteger('organ')->unsigned();
            $table->foreign('organ')->references('id')->on('organs');

            $table->bigInteger('examinationBoard')->unsigned();
            $table->foreign('examinationBoard')->references('id')->on('examination_boards');

            $table->bigInteger('statusPublicTenderNotice')->unsigned();
            $table->foreign('statusPublicTenderNotice')->references('id')->on('status_public_tender_notices');

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
        Schema::dropIfExists('public_tender_notices');
    }
}
