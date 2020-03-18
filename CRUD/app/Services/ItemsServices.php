<?php
namespace App\Services;

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

    public function getRecords($searchParams = [])
    {
        $StudentsModel = new StudentsModel;

        if(isset($searchParams['id']) && $searchParams['id'] > 0) {
            $StudentsModel = $StudentsModel->where('id', $searchParams['id']);
        } else {
            if(isset($searchParams['name'])) {
                $StudentsModel = $StudentsModel->where('name', 'LIKE', '%' . $searchParams['name'] . '%');
            }

            if(isset($searchParams['last_name'])) {
                $StudentsModel = $StudentsModel->where('last_name', 'LIKE', '%' . $searchParams['last_name'] . '%');
            }

            if(isset($searchParams['egn'])) {
                $StudentsModel = $StudentsModel->where('egn', 'LIKE', '%' . $searchParams['egn'] . '%');
            }

            if(isset($searchParams['email'])) {
                $StudentsModel = $StudentsModel->where('email', 'LIKE', '%' . $searchParams['email'] . '%');
            }

            if(isset($searchParams['city'])) {
                $StudentsModel = $StudentsModel->where('city', $searchParams['city']);
            }

            if(isset($searchParams['gender'])) {
                $StudentsModel = $StudentsModel->where('gender', $searchParams['gender']);
            }

            //TODO sport_preff , subject & description text
        }

        if(isset($searchParams['searchGroup']) && $searchParams['searchGroup'] == 2) {  //show trashed
            $StudentsModel = $StudentsModel->onlyTrashed();
        } else if(isset($searchParams['searchGroup']) && $searchParams['searchGroup'] == 1) { //show notTrashed
            $StudentsModel = $StudentsModel;
        } else {
            $StudentsModel = $StudentsModel->withTrashed();             //show all
        }

        return $StudentsModel->get();
    }

    public function getDetails()
    {

    }

    public function delete()
    {

    }
}