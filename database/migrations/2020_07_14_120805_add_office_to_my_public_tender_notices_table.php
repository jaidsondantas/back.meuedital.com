<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOfficeToMyPublicTenderNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('my_public_notice_tenders', function (Blueprint $table) {
            $table->bigInteger('office')->unsigned()->nullable();
            $table->foreign('office')->references('id')->on('offices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('my_public_notice_tenders', function (Blueprint $table) {
            $table->dropColumn('office');
        });
    }
}
