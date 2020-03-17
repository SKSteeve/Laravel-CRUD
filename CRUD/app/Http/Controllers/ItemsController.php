<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function Items(Request $request, $id = 0)
    {
        $student = $request->input('formdata');

        $variables = [

            'student' => $student,

            'subject' => [0 => 'Биоинженерство (по подразбиране)', 1 => 'Биоинформатика', 2 => 'Биохимия', 3 => 'Екология'],
            'searchGroup' => [0 => 'Покажи Всички', 1 => 'Неизтрити', 2 => 'Изтрити'],
        ];

        return view('items', $variables);
    }
}