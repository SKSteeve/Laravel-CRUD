<?php
namespace App\Services\ItemsServices;

use App\Models\StudentsModel;

class ItemsServices
{

    private $vars;

    public function __construct($vars = [])
    {
        $this->setVars($vars);
    }

    private function setVars($vars = [])
    {
        $this->vars = $vars;
    }

    public function save()
    {

    }

    private function setValues($fields)
    {

        return $fields;
    }

    private function validate($fields)
    {

        return $response = [

        ];
    }

    private function store()
    {
        return $response = [

        ];
    }

    public function getRecords()
    {

    }

    public function getDetails()
    {

    }

    public function delete()
    {

    }
}