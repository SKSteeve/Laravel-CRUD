<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ItemsServices;

class ItemsController extends Controller
{
    
    public function Item(Request $request, $id = 0)
    {
        $student = $request->input('formdata');

        $variables = [

            'student' => $student,

            'subject' => [0 => 'Биоинженерство (по подразбиране)', 1 => 'Биоинформатика', 2 => 'Биохимия', 3 => 'Екология'],
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

            'subject' => [0 => 'Биоинженерство (по подразбиране)', 1 => 'Биоинформатика', 2 => 'Биохимия', 3 => 'Екология'],
            'searchGroup' => [0 => 'Покажи Всички', 1 => 'Неизтрити', 2 => 'Изтрити'],
        ];

        return view('items', $variables);
    }
}