<?php

use Database\Migrations\Traits\CommonMigration;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicTenderNoticeXOfficesTable extends Migration
{
    use CommonMigration;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_tender_notice_x_offices', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigInteger('public_tender_notice_id')->unsigned();
            $table->foreign('public_tender_notice_id')->references('id')->on('public_tender_notices');

            $table->bigInteger('office_id')->unsigned();
            $table->foreign('office_id')->references('id')->on('offices');

            $table->float('average_salary')->nullable();
            $table->integer('amount')->nullable();

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
        Schema::dropIfExists('public_tender_notice_x_offices');
    }
}
