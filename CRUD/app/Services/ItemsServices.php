<?php
namespace App\Services;

use App\Models\StudentsModel;
use Illuminate\Support\Facades\Validator;

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
        $fields = $this->setValues($this->vars);
        $validateResponse = $this->validate($fields);

        if($validateResponse['status'] > 0) {
            $storeResponse = $this->store($fields);
            return $storeResponse;
        }

        return $validateResponse;
    }

    private function setValues($vars = [])
    {
        if(isset($vars['id']) && $vars['id'] > 0) {
            $fields['id'] = $vars['id'];
        } else {
            $fields['id'] = -1;
        }

        if(isset($vars['name'])) {
            $fields['name'] = $vars['name'];
        } else {
            $fields['name'] = '';
        }

        if(isset($vars['last_name'])) {
            $fields['last_name'] = $vars['last_name'];
        } else {
            $fields['last_name'] = '';
        }

        if(isset($vars['egn'])) {
            $fields['egn'] = $vars['egn'];
        } else {
            $fields['egn'] = '';
        }

        if(isset($vars['email'])) {
            $fields['email'] = $vars['email'];
        } else {
            $fields['email'] = '';
        }

        if(isset($vars['city'])) {
            $fields['city'] = $vars['city'];
        } else {
            $fields['city'] = '';
        }

        if(isset($vars['gender'])) {
            $fields['gender'] = $vars['gender'];
        } else {
            $fields['gender'] = '';
        }
        
        if(isset($vars['sport_preff'])) {
            if(is_array($vars['sport_preff'])) {
                $string = implode(',', $vars['sport_preff']);
                $fields['sport_preff'] = $string;
            } else {
                $fields['sport_preff'] = $vars['sport_preff'];
            }
        } else {
            $fields['sport_preff'] = null;
        }

        if(isset($vars['subject']) && $vars['subject'] > 0) {
            $fields['subject'] = $vars['subject'];
        } else {
            $fields['subject'] = null;
        }

        if(isset($vars['description_text'])) {
            $fields['description_text'] = $vars['description_text'];
        } else {
            $fields['description_text'] = null;
        }
        
        return $fields;
    }

    private function validate($fields)
    {
        $StudentsModel = new StudentsModel;

        if($fields['id'] > 0) {         // edit student, need to ignore his id for unique columns
            $validator = Validator::make($fields, $StudentsModel::rules($fields['id']), $StudentsModel::$messages);
        } else {
            $validator = Validator::make($fields, $StudentsModel::rules(), $StudentsModel::$messages);
        }

        if($validator->fails()) {
            $status = -1;
            $errors = $validator->errors();
        } else {
            $status = 1;
            $errors = [];
        }

        return $response = [
            'status' => $status,
            'errors' => $errors,
        ];
    }

    private function store($fields)
    {
        $StudentsModel = new StudentsModel;
        $id = $fields['id'];

        if($id > 0) {
            $edit = $StudentsModel::where('id', $id)->update($fields); 
            $mode = 'Редактиран';
        } else {
            unset($fields['id']);
            $saved = $StudentsModel::create($fields);
            
            $id = $saved->id;
            $mode = 'Регистриран';
        }

        return $response = [
            'status' => 1,
            'id' => $id,
            'message' => "Успешно $mode студент с ID - $id",
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

        if(!$student) {
            $student = $StudentsModel::withTrashed()->find($id)->restore();
            return $response = ['restore_msg' => "Успешно възстановен студент с ID - $id"];
        }

        return $student;
    }

    public function delete($id)
    {
        $StudentsModel = new StudentsModel;

        $forceDelete = $StudentsModel->where('id', $id)->whereNotNull('deleted_at')->forceDelete();
        $softDelete = $StudentsModel->where('id', $id)->whereNull('deleted_at')->delete();
        
        if(!empty($forceDelete)) {
            $hardOrSoft = 'hard';
        } else {            
            $hardOrSoft = 'soft';
        }

        return $response = [ 'hardOrSoft' => $hardOrSoft];
    }
}