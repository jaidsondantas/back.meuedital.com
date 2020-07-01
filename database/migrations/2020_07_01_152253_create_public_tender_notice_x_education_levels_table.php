<?php

use Database\Migrations\Traits\CommonMigration;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicTenderNoticeXEducationLevelsTable extends Migration
{
    use CommonMigration;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_tender_notice_x_education_levels', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigInteger('education_level_id')->unsigned();
            $table->foreign('education_level_id', 'education_id_foreign')->references('id')->on('education_levels');

            $table->bigInteger('public_tender_notice_id')->unsigned();
            $table->foreign('public_tender_notice_id', 'public_id_foreign')->references('id')->on('public_tender_notices');

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
        Schema::dropIfExists('public_tender_notice_x_education_levels');
    }
}
