<?php

namespace App\Models;

use Illuminate\Validation\Rule;

class CategoryContent extends BaseModel
{
    const ALIAS = ['Categoria do Conteúdo', 'Categorias de Conteúdos'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setPopulate(['contents']);
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

    public function contents()
    {
        return $this->hasMany(Content::class, 'categoryContent');
    }

}
