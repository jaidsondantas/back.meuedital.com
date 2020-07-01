<?php

namespace App\Models;

use Illuminate\Validation\Rule;

class Organ extends BaseModel
{
    const ALIAS = ['Orgão', 'Orgãos'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setPopulate(['typeOrgan', 'organScope']);
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

    public function typeOrgan()
    {
        return $this->belongsTo(TypeOrgan::class);
    }

    public function organScope()
    {
        return $this->belongsTo(OrganScope::class);
    }
}
