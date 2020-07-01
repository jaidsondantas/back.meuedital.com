<?php

namespace App\Models;

class PublicTenderNoticeXState extends BaseModel
{
    const ALIAS = ['Estado', 'Estados'];

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

    public function getRules()
    {
        return [
            'public_tender_notice_id' => ['required'],
            'education_level_id' => ['required'],
        ];
    }
}
