<?php


namespace App\Actions\Models;


class Parameter
{
    public $limit;

    public $where;

    public $populate;

    public $per_page;

    public $order;

    /**
     * Parameter constructor.
     * @param $limit
     * @param $where
     * @param $populate
     * @param $per_page
     * @param $order
     */
    public function __construct($limit, $where, $populate, $per_page, $order){
        $this->limit = $limit;
        $this->where = $where;
        $this->populate = $populate;
        $this->per_page = $per_page;
        $this->order = $order;
    }


}
