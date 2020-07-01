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
            $table->string('description');
            $table->string('year');

            $table->bigInteger('organ_id')->unsigned();
            $table->foreign('organ_id')->references('id')->on('organs');

            $table->bigInteger('examination_board_id')->unsigned();
            $table->foreign('examination_board_id')->references('id')->on('examination_boards');

            $table->bigInteger('status_public_tender_notice_id')->unsigned();
            $table->foreign('status_public_tender_notice_id')->references('id')->on('status_public_tender_notices');

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
