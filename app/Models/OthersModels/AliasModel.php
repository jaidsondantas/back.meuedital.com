<?php


namespace App\Models\OthersModels;


class AliasModel
{
    public $name;
    public $article;

    /**
     * AliasModel constructor.
     * @param $name
     * @param $article
     */
    public function __construct($name, $article)
    {
        $this->name = new SingularOrPlural($name[0], $name[1]);
        $this->article = $article;
    }
}

class SingularOrPlural
{
    public $singular;
    public $plural;

    /**
     * SingularOrPlural constructor.
     * @param $singular
     * @param $plural
     */
    public function __construct($singular, $plural)
    {
        $this->singular = $singular;
        $this->plural = $plural;
    }

}
