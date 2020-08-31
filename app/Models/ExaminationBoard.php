<?php

namespace App\Models;

use Illuminate\Validation\Rule;

class ExaminationBoard extends BaseModel
{
    const ALIAS = ['Banca', 'Bancas'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setPopulate(['publicTenderNotices']);
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

    public function publicTenderNotices()
    {
        return $this->hasMany(PublicTenderNotice::class, 'id');
    }

}
