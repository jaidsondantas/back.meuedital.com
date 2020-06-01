<?php


namespace App\Actions\Models;


class ResponseValidate {
    public $error;

    /**
     * ResponseValidate constructor.
     * @param $error
     */
    public function __construct($error)
    {
        $this->error = [
            "message" => $error
        ];
    }


    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }
}
