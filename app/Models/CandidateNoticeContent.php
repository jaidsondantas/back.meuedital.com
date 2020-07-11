<?php

namespace App\Models;

class CandidateNoticeContent extends BaseModel
{
    const ALIAS = ['Item do Edital', 'Itens do Edital'];

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
        ];
    }
}
