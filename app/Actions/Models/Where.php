<?php


namespace App\Actions\Models;


class Where
{
    public $and;

    public $or;

    public function __construct($and, $or)
    {
        $this->and = $and;
        $this->or = $or;
    }
}
