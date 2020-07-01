<?php

namespace App\Models;

use Illuminate\Validation\Rule;

class PublicTenderNotice extends BaseModel
{
    const ALIAS = ['Estado', 'Estados'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setPopulate(['organ', 'examinationBoard', 'statusPublicTenderNotice', 'educationLevel', 'states']);
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
            'description' => ['required', 'string', 'max:255'],
            'year' => ['required', 'max:4'],
            'organ_id' => ['required'],
            'examination_board_id' => ['required'],
            'status_public_tender_notice_id' => ['required'],
        ];
    }

    public function organ()
    {
        return $this->belongsTo(Organ::class);
    }

    public function examinationBoard()
    {
        return $this->belongsTo(ExaminationBoard::class);
    }

    public function statusPublicTenderNotice()
    {
        return $this->belongsTo(StatusPublicTenderNotice::class);
    }

    public function educationLevel()
    {
        return $this->belongsToMany(EducationLevel::class, 'public_tender_notice_x_education_levels', 'education_level_id', 'public_tender_notice_id');
    }

    public function states()
    {
        return $this->belongsToMany(State::class, 'public_tender_notice_x_states', 'state_id', 'public_tender_notice_id');
    }


}
