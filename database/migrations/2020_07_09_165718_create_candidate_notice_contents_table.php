<?php

use Database\Migrations\Traits\CommonMigration;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateNoticeContentsTable extends Migration
{
    use CommonMigration;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_notice_contents', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');

            $table->bigInteger('candidate_id')->unsigned()->nullable();
            $table->foreign('candidate_id')->references('id')->on('candidates');

            $table->bigInteger('office_id')->unsigned()->nullable();
            $table->foreign('office_id')->references('id')->on('offices');

            $table->bigInteger('notice_content_office_id')->unsigned()->nullable();
            $table->foreign('notice_content_office_id')->references('id')->on('notice_content_offices');

            $table->integer('status')->nullable()->default(0);

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
        Schema::dropIfExists('candidate_notice_contents');
    }
}
