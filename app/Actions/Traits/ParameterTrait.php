<?php


namespace App\Actions\Traits;


use App\Actions\Models\Parameter;
use App\Models\BaseModel;

trait ParameterTrait
{

    public function getParameters($request, BaseModel $model){

        $limit = $request->query('limit');
        $per_page = (int)$request->query('per_page');
        $order = json_decode($request->query('order'), true);
        $where = json_decode($request->query('where'), true);

        $populate = json_decode($request->query('populate'), true);

        if(in_array('populateAll', $populate)){
            $populate = $model->getPopulate();
        }

        return new Parameter($limit, $where, $populate, $per_page, $order);

    }
}
