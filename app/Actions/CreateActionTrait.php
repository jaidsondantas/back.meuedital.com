<?php

namespace App\Actions;


use App\Actions\Models\ResponseValidate;
use App\Models\OthersModels\AliasModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

trait CreateActionTrait
{
    public function create(Model $model, $request, AliasModel $alias, $bodyRequest = null)
    {
        $bodyRequest = $bodyRequest == null ? $request : $bodyRequest;

        $validator = Validator::make($bodyRequest->all(), $model->getRules(), $this->getArrayMessagesValidate());
        if ($validator->fails()) {
            return response()->json(new ResponseValidate($validator->getMessageBag()), 400);
        }

        try {
            $entity = new $model();
            foreach ($bodyRequest->all() as $key => $r) {
                if ($key != 'populate') {
                    $entity->$key = $r;
                }
            }

            $entity->created_by = auth()->user()->id;
            $entity->save();

        }catch (\Exception $e){
            return $e->getMessage();
        }

        return $this->findId($entity->id, new $model(), $request, $alias);
    }
}
