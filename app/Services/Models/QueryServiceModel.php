<?php


namespace App\Services\Models;


class QueryServiceModel
{
    const OPERATORS = [
        "eq"        => "=",
        "neq"       => "!=",
        "like"      => "like",
        "notLike"   => "not like",
        "gt"        => ">",
        "gte"       => ">=",
        "lt"        => "<",
        "lte"       => "<=",
        "in"        => "in",
        "notIn"     => "not in",
        "isNull"    => "isNull",
        "isNotNull" => "isNotNull",
    ];
}
