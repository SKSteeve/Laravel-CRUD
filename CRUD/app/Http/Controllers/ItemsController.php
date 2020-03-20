<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ItemsServices;

class ItemsController extends Controller
{
    
    public function Item(Request $request, $id = 0)
    {
        $studentData = $request->input('formdata');

        $ItemsServices = new ItemsServices($studentData);

        if($id > 0) {                       // edit student
            $studentData = $ItemsServices->getDetails($id);
        }

        $save = $request->input('save');
        $message = '';
        $errors = [];
        if(isset($save)) {
            $save = $ItemsServices->save();

            if($save['status'] > 0) {
                $message = $save['message'];
                $studentData = $request->input('formdata');
                $studentData['id'] = $save['id'];
            } else {
                $errors = $save['errors'];
            }
        }

        $variables = [

            'student' => $studentData,

            'message' => $message,
            'errors' => $errors,

            'subject' => [0 => '-', 1 => 'Биоинформатика', 2 => 'Биохимия', 3 => 'Екология', 4 => 'Биоинженерство'],
            'searchGroup' => [0 => 'Покажи Всички', 1 => 'Неизтрити', 2 => 'Изтрити'],
        ];

        return view('item', $variables);
    }

/********************************************************************************************************** */

    public function Items(Request $request, $id = 0)
    {
        $params = $request->input('formdata');

        $ItemsServices = new ItemsServices;

        $students = $ItemsServices->getRecords($params);

        $variables = [

            'student' => $params,
            'students' => $students,

            'subject' => [0 => '-', 1 => 'Биоинформатика', 2 => 'Биохимия', 3 => 'Екология', 4 => 'Биоинженерство'],
            'searchGroup' => [0 => 'Покажи Всички', 1 => 'Неизтрити', 2 => 'Изтрити'],
        ];

        return view('items', $variables);
    }

    /***************************************************************************************************** */

    function delete($id)
    {
        $ItemsServices = new ItemsServices;

        if($id > 0) {
            $delete = $ItemsServices->delete($id);
            
            $message = "Успешно изтрит студент с ID - $id";
            $messageStatus = "success";
            return redirect('items')->with(['message' => $message, 'messageStatus' => $messageStatus]);
        }

        return abort(404);
    }
}