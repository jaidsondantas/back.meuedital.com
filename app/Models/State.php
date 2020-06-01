<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class State extends BaseModel
{
    const ALIAS = ['Estado', 'Estados'];

  public function __construct(array $attributes = [])
  {
      parent::__construct($attributes);

      $this->setPopulate(['country']);
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
        return $this->belongsTo(Country::class);
    }
}
