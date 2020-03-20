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
        //if subject isset && subject > 0 -> fields['subj'] = subj

        // TODO ->
        // $arrDB = implode(',', $searchParams['sport_preff']);
        //echo $arrDB;
        //var_dump($searchParams['sport_preff']);
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

            if(isset($searchParams['sport_preff'])) {
                if(isset($searchParams['sport_preff']['football'])) {
                    $StudentsModel = $StudentsModel->where('sport_preff', 'LIKE', '%' . $searchParams['sport_preff']['football'] . '%');
                }
                if(isset($searchParams['sport_preff']['voleyball'])) {
                    $StudentsModel = $StudentsModel->where('sport_preff', 'LIKE', '%' . $searchParams['sport_preff']['voleyball'] . '%');
                }
                if(isset($searchParams['sport_preff']['swiming'])) {
                    $StudentsModel = $StudentsModel->where('sport_preff', 'LIKE', '%' . $searchParams['sport_preff']['swiming'] . '%');
                }
            }

            if(isset($searchParams['subject']) && $searchParams['subject'] > 0) {
                $StudentsModel = $StudentsModel->where('subject', $searchParams['subject']);
            }
            
            if(isset($searchParams['description_text'])) {
                $StudentsModel = $StudentsModel->where('description_text', 'LIKE', '%' . $searchParams['description_text'] . '%');
            }
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

    public function getDetails($id)
    {
        $StudentsModel = new StudentsModel;

        $student = $StudentsModel::find($id);

        return $student;
    }

    public function delete($id)
    {
        $StudentsModel = new StudentsModel;

        $forceDelete = $StudentsModel->where('id', $id)->whereNotNull('deleted_at')->forceDelete();
        $softDelete = $StudentsModel->where('id', $id)->whereNull('deleted_at')->delete();
    }
}