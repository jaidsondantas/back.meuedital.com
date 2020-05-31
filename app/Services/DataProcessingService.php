<?php

namespace App\Services;


class DataProcessingService
{
    public static function responseFindAll($data)
    {
        $response = [];
        $response['entities'] = [
            $data->first()->getTable() => $data->items()
        ];
        $response['current_page'] = $data->currentPage();
        $response['per_page'] = $data->perPage();
        $response['total'] = $data->total();

        return $response;
    }
}
