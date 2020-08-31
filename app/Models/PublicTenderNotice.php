<?php

namespace App\Models;

use Illuminate\Validation\Rule;

class PublicTenderNotice extends BaseModel
{
    const ALIAS = ['Edital', 'Editais'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $organ = new Organ();
        $examinationBoard = new ExaminationBoard();
        $statusPublicTenderNotice = new StatusPublicTenderNotice();
        $educationLevel = new EducationLevel();
        $states = new State();
        $offices = new Office();

        $this->setPopulate(
            [
                'organ' => function ($query) use ($organ) {
                    $query->with($organ->getPopulate());
                },
                'examinationBoard' => function ($query) {
                    $query->with($this::POPULATE_DEFAULT);
                },
                'statusPublicTenderNotice' => function ($query) {
                    $query->with($this::POPULATE_DEFAULT);
                },
                'educationLevels' => function ($query) {
                    $query->with($this::POPULATE_DEFAULT);
                },
                'states' => function ($query) {
                    $query->with(array_merge($this::POPULATE_DEFAULT, ['country' => function ($query) {
                        $query->with($this::POPULATE_DEFAULT);
                    }]));
                },
                'offices' => function ($query) use ($offices){
                    $query->with($offices->getPopulate());
                }]);
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
            'description' => ['required', 'string', 'max:1500'],
            'year' => ['required', 'max:4'],
            'organ' => ['required'],
            'examinationBoard' => ['required'],
            'statusPublicTenderNotice' => ['required'],
        ];
    }

    public function organ()
    {

        return $this->belongsTo(Organ::class, 'organ');
    }

    public function examinationBoard()
    {
        return $this->belongsTo(ExaminationBoard::class, 'examinationBoard');
    }

    public function statusPublicTenderNotice()
    {
        return $this->belongsTo(StatusPublicTenderNotice::class, 'statusPublicTenderNotice');
    }

    public function educationLevels()
    {
        return $this->belongsToMany(EducationLevel::class, 'public_tender_notice_x_education_levels', 'publicTenderNotice', 'educationLevel');
    }

    public function states()
    {
        return $this->belongsToMany(State::class, 'public_tender_notice_x_states',
            'publicTenderNotice', 'state');
    }

    public function offices()
    {
        return $this->belongsToMany(Office::class, 'public_tender_notice_x_offices',
            'publicTenderNotice', 'office');
    }


}
