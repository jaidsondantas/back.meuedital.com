<?php

use Database\Migrations\Traits\CommonMigration;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticeContentsTable extends Migration
{
    use CommonMigration;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notice_contents', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');

            $table->bigInteger('public_tender_notice_id')->unsigned();
            $table->foreign('public_tender_notice_id')->references('id')->on('public_tender_notices');

            $table->bigInteger('content_id')->unsigned();
            $table->foreign('content_id')->references('id')->on('contents');

            $table->bigInteger('type_knowledge_id')->unsigned();
            $table->foreign('type_knowledge_id')->references('id')->on('type_knowledge');

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
        Schema::dropIfExists('notice_contents');
    }
}
