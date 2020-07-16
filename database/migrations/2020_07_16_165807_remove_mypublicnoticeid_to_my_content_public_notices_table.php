<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveMypublicnoticeidToMyContentPublicNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('my_content_public_notices', function (Blueprint $table) {
            $table->dropForeign('my_content_public_notices_my_public_notice_tender_id_foreign');
            $table->dropColumn('my_public_notice_tender_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('my_content_public_notices', function (Blueprint $table) {
            $table->string('my_public_notice_tender_id');
        });
    }
}
