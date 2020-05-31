<?php


namespace App\Services\Models;


use Illuminate\Database\Eloquent\Model;

class QueryServiceModel
{
    const OPERATORS = [
        "eq" => "=",
        "neq" => "!=",
        "like" => "like",
        "notLike" => "not like",
        "gt" => ">",
        "gte" => ">=",
        "lt" => "<",
        "lte" => "<=",
        "in" => "in",
        "notIn" => "not in",
        "isNull" => "isNull",
        "isNotNull" => "isNotNull",
    ];

    public static function ifExistsData(Model $model)
    {
        if ($model::all()->count() >= 1) {
            return true;
        }
        return false;
    }
}
