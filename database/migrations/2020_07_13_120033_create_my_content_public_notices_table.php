<?php

use Database\Migrations\Traits\CommonMigration;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyContentPublicNoticesTable extends Migration
{
    use CommonMigration;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_content_public_notices', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->integer('status')->default(0);

            $table->bigInteger('candidate_id')->unsigned();
            $table->foreign('candidate_id')->references('id')->on('candidates');

            $table->bigInteger('content_id')->unsigned()->nullable();
            $table->foreign('content_id')->references('id')->on('contents');

            $table->bigInteger('office_id')->unsigned()->nullable();
            $table->foreign('office_id')->references('id')->on('offices');

            $table->bigInteger('category_content_id')->unsigned();
            $table->foreign('category_content_id')->references('id')->on('category_contents');

            $table->bigInteger('type_knowledge_id')->unsigned();
            $table->foreign('type_knowledge_id')->references('id')->on('type_knowledge');

            $table->bigInteger('public_tender_notice_id')->unsigned()->nullable();
            $table->foreign('public_tender_notice_id')->references('id')->on('public_tender_notices');

            $table->bigInteger('my_public_notice_tender_id')->unsigned();
            $table->foreign('my_public_notice_tender_id')->references('id')->on('my_public_notice_tenders');

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
        Schema::dropIfExists('my_content_public_notices');
    }
}
