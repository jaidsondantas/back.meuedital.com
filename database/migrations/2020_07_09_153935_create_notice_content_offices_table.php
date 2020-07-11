<?php

use Database\Migrations\Traits\CommonMigration;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticeContentOfficesTable extends Migration
{
    use CommonMigration;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notice_content_offices', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');

            $table->bigInteger('notice_content_id')->unsigned();
            $table->foreign('notice_content_id')->references('id')->on('notice_contents');

            $table->bigInteger('office_id')->unsigned();
            $table->foreign('office_id')->references('office_id')->on('public_tender_notice_x_offices');

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
        Schema::dropIfExists('notice_content_offices');
    }
}
