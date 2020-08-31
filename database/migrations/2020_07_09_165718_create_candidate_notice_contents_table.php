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

            $table->bigInteger('candidate')->unsigned()->nullable();
            $table->foreign('candidate')->references('id')->on('candidates');

            $table->bigInteger('office')->unsigned()->nullable();
            $table->foreign('office')->references('id')->on('offices');

            $table->bigInteger('noticeContentOffice')->unsigned()->nullable();
            $table->foreign('noticeContentOffice')->references('id')->on('notice_content_offices');

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
