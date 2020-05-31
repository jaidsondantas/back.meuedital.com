<?php


namespace App\Actions;


use App\Actions\Traits\ParameterTrait;
use App\Services\DataProcessingService;

trait FindIdActionTrait
{

    public function findId($id, $model, $request, $aliasEntity)
    {
        $parameters = $this->getParameters($request, $model);

        $data =  $model::where('id', $id)
            ->with($parameters->populate)
            ->get();

        if (count($data) > 0) {
            return response()->json($data->first(), 200);
        } else {
            return response()->json([$aliasEntity . ' Não encontrada'], 404);
        }
    }
}
