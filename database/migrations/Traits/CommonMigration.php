<?php

namespace Database\Migrations\Traits;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

trait CommonMigration
{
    /**
     * @param $table // Table dentro do schema de criação
     */
    public function setUsersBy($table)
    {
        $table->bigInteger('created_by')->unsigned();
        $table->foreign('created_by')->references('id')->on('users');
        $table->bigInteger('updated_by')->unsigned()->nullable();
        $table->foreign('updated_by')->references('id')->on('users');
        $table->bigInteger('deleted_by')->unsigned()->nullable();
        $table->foreign('deleted_by')->references('id')->on('users');
    }

    public function timestampsSoftDeletes($table)
    {
        $table->timestamps();
        $table->softDeletes();
    }
}
