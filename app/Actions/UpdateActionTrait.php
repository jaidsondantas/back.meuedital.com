<?php

namespace App\Actions;


use App\Actions\Models\ResponseValidate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

trait UpdateActionTrait
{
    public function update($id, Model $model, $request, $alias, $bodyRequest = null)
    {
        $bodyRequest = $bodyRequest == null ? $request : $bodyRequest;

        $entity = $model::find($id);

        if (isset($entity)) {
            foreach ($bodyRequest->all() as $key => $r) {
                if ($key != 'populate') {
                    $entity->$key = $r;
                }
            }
        }

        $validator = Validator::make($entity->getAttributes(), $model->getRules($id), $this->getArrayMessagesValidate());
        if ($validator->fails()) {
            return response()->json(new ResponseValidate($validator->getMessageBag()), 400);
        }
        $entity->updated_by = $request->user()->id;

        try {
            $entity->save();
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $this->findId($entity->id, new $model(), $request, $alias);
    }
}
