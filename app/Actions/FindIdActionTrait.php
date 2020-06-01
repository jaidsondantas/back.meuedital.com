<?php


namespace App\Actions;


use App\Actions\Traits\ParameterTrait;
use App\Models\BaseModel;
use App\Services\Traits\DataProcessingTrait;

trait FindIdActionTrait
{
    use DataProcessingTrait;

    public function findId($id, BaseModel $model, $request, $alias)
    {
        $parameters = $this->getParameters($request, $model);

        $data =  $model::where('id', $id)
            ->with($parameters->populate)
            ->get();

        if (count($data) > 0) {
            return $this->responseFindId($data);
        } else {
            return $this->responseNotFoundId($alias, 400 );
        }
    }
}
