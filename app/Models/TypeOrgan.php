<?php

namespace App\Models;

use Illuminate\Validation\Rule;

class TypeOrgan extends BaseModel
{
    const ALIAS = ['Tipo de Orgão', 'Tipos de Orgãos'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setPopulate(['organ']);
    }

    /**
     * @return array
     */
    public function getFillable(): array
    {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }

    public function getRules($id = 0)
    {
        return [
            'name' => ['required', 'string', Rule::unique('examination_boards')->ignore($id)],
        ];
    }

    public function organ()
    {
        return  $this->hasMany(Organ::class);
    }
}
