<?php

namespace App\Models;

use Illuminate\Validation\Rule;

class Country extends BaseModel
{
    const ALIAS = ['País', 'Países'];


    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setPopulate([]);
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
            'name' => ['required', 'string', Rule::unique('countries')->ignore($id)],
            'initials' => ['required', 'string', Rule::unique('countries')->ignore($id), 'max:2']
        ];
    }

    public function state()
    {
        return $this->hasMany(State::class);
    }


}
