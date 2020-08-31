<?php

namespace App\Models;

use Illuminate\Validation\Rule;

class Office extends BaseModel
{
    const ALIAS = ['Cargo', 'Cargos'];

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
            'name' => ['required', 'string', Rule::unique('examination_boards')->ignore($id)],
        ];
    }

    public function publicNoticePositions()
    {

    }
}
