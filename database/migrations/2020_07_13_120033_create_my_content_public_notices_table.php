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

            $table->bigInteger('candidate')->unsigned();
            $table->foreign('candidate')->references('id')->on('candidates');

            $table->bigInteger('content')->unsigned()->nullable();
            $table->foreign('content')->references('id')->on('contents');

            $table->bigInteger('office')->unsigned()->nullable();
            $table->foreign('office')->references('id')->on('offices');

            $table->bigInteger('categoryContent')->unsigned();
            $table->foreign('categoryContent')->references('id')->on('category_contents');

            $table->bigInteger('typeKnowledge')->unsigned();
            $table->foreign('typeKnowledge')->references('id')->on('type_knowledge');

            $table->bigInteger('publicTenderNotice')->unsigned()->nullable();
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
        Schema::dropIfExists('my_content_public_notices');
    }
}
