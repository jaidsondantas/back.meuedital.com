<?php

use Database\Migrations\Traits\CommonMigration;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicTenderNoticeXStatesTable extends Migration
{
    use CommonMigration;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_tender_notice_x_states', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigInteger('state')->unsigned();
            $table->foreign('state')->references('id')->on('states');

            $table->bigInteger('publicTenderNotice')->unsigned();
            $table->foreign('publicTenderNotice')->references('id')->on('public_tender_notices');

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
        Schema::dropIfExists('public_tender_notice_x_states');
    }
}
