<?php

namespace App\Actions;


use Illuminate\Database\Eloquent\Model;

trait DeleteActionTrait
{
    public function delete($id, Model $model, $alias, $request)
    {
        $updateEntityDelete = $model::find($id);
        if ($updateEntityDelete) {
            $updateEntityDelete->deleted_by = auth()->user()->id;
            $updateEntityDelete->save();

            $response = $this->findId($id, new $model(), $request, $alias);
            try {
                $model::destroy($id);
            } catch (\Exception $e) {
                return $response;
            }
            return $this->responseDelete($response, $alias);
        }
        return $this->findId($id, new $model(), $request, $alias);
    }
}
