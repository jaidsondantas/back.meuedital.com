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
        $table->bigInteger('createdBy')->unsigned();
        $table->foreign('createdBy')->references('id')->on('users');
        $table->bigInteger('updatedBy')->unsigned()->nullable();
        $table->foreign('updatedBy')->references('id')->on('users');
        $table->bigInteger('deletedBy')->unsigned()->nullable();
        $table->foreign('deletedBy')->references('id')->on('users');
    }

    public function timestampsSoftDeletes($table)
    {
        $table->timestamp('createdAt')->nullable();
        $table->timestamp('updatedAt')->nullable();
        $table->softDeletes('deletedAt');
    }
}
