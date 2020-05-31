<?php


namespace App\Services;

use Illuminate\Http\Request;

class RequestService
{
    public static function setTratamentRequest($model, $request)
    {
        $arraysDenied = array_diff(array_keys($request->all()), $model->getFillable());
        $body = array_diff_key($request->all(), array_flip($arraysDenied));
        return collect($body);
    }
}
