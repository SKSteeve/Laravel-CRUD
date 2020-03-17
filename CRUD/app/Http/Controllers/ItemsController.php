<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemsController extends Controller
{
    
    public function Item($id = 0)
    {
        echo "u are in Item $id";

        return view('item');
    }

    public function Items($id = 0)
    {
        echo "u are in Itemsss $id";
        return view('items');
    }
}