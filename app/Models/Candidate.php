<?php

namespace App\Models;

use Illuminate\Validation\Rule;

class Candidate extends BaseModel
{
    const ALIAS = ['Candidato', 'Candidatos'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setPopulate(['user', 'state', 'country', 'publicTenderNotices']);
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
            'name' => ['required', 'string', Rule::unique('candidates')->ignore($id)],
            'photo' => [],
            'date_of_birth' => [],
            'genre' => [],
            'user_id' => ['required'],
            'state_id' => [],
            'country_id' => []
        ];
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function publicTenderNotices(){
        return $this->belongsToMany(PublicTenderNotice::class, 'my_public_notice_tenders')
            ->withPivot('public_tender_notice_id')
            ->where('my_public_notice_tenders.deleted_at', '=', null);
    }

}
