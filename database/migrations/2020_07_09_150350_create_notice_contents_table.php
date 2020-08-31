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

            $table->bigInteger('publicTenderNotice')->unsigned();
            $table->foreign('publicTenderNotice')->references('id')->on('public_tender_notices');

            $table->bigInteger('content')->unsigned();
            $table->foreign('content')->references('id')->on('contents');

            $table->bigInteger('typeKnowledge')->unsigned();
            $table->foreign('typeKnowledge')->references('id')->on('type_knowledge');

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
