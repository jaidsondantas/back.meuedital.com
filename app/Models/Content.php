<?php

namespace App\Models;

use Illuminate\Validation\Rule;

class Content extends BaseModel
{
    const ALIAS = ['Conteúdo', 'Conteúdos'];

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
            'name' => ['required', 'string'],
            'category_content_id' => ['required'],
        ];
    }
}
