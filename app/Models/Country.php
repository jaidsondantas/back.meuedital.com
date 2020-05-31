<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;

class Country extends BaseModel
{
    const ALIAS_ENTITY = 'Paíz';

    const ALIAS_ENTITY_PLURAL = 'Paises';

    public static function getRules($id = 0)
    {
        return [
            'name' => ['required', 'string', Rule::unique('countries')->ignore($id)],
            'initials' => ['required', 'string', Rule::unique('countries')->ignore($id), 'max:2']
        ];
    }

    public function getStatusAttribute($value)
    {
        return $value == 1;
    }

    /**
     * @return array
     */
    public function getFillable(): array
    {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}
