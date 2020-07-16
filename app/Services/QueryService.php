<?php


namespace App\Services;


use Illuminate\Database\Eloquent\Model;

class QueryService
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

    public static function myArrayUnique($array, $keep_key_assoc = false){
        $duplicate_keys = array();
        $tmp = array();

        foreach ($array as $key => $val){
            // convert objects to arrays, in_array() does not support objects
            if (is_object($val))
                $val = (array)$val;

            if (!in_array($val, $tmp))
                $tmp[] = $val;
            else
                $duplicate_keys[] = $key;
        }

        foreach ($duplicate_keys as $key)
            unset($array[$key]);

        return $keep_key_assoc ? $array : array_values($array);
    }
}
