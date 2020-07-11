<?php

use Database\Migrations\Traits\CommonMigration;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyPuclicNoticeTendersTable extends Migration
{
    use CommonMigration;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_public_notice_tenders', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');

            $table->bigInteger('candidate_id')->unsigned();
            $table->foreign('candidate_id')->references('id')->on('candidates');

            $table->bigInteger('public_tender_notice_id')->unsigned()->nullable();
            $table->foreign('public_tender_notice_id')->references('id')->on('public_tender_notices');

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
        Schema::dropIfExists('my_public_notice_tenders');
    }
}
