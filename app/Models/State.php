<?php

namespace App\Models;

use Illuminate\Validation\Rule;

class State extends BaseModel
{
    const ALIAS = ['Estado', 'Estados'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setPopulate(['country', 'publicTenderNotices']);
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
            'name' => ['required', 'string', Rule::unique('states')->ignore($id)],
            'initials' => ['required', 'string', Rule::unique('states')->ignore($id), 'max:5'],
            'country_id' => ['required', Rule::exists('countries', 'id')]
        ];
    }

    public function country()
    {
        return $this->belongsTo(Country::class,'country');
    }

    public function publicTenderNotices(){
        return $this->belongsToMany(PublicTenderNotice::class, 'public_tender_notice_x_states', 'publicTenderNotice', 'state');
    }
}
