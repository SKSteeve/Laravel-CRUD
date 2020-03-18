<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class StudentsModel extends Model
{
    protected $table = 'students';
    use SoftDeletes;
    public function printSmt()
    {
        echo "da";
    }
}