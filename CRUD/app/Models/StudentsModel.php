<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class StudentsModel extends Model
{
    protected $table = 'students';
    protected $fillable = ['name', 'last_name', 'egn', 'email', 'city', 'gender', 'sport_preff', 'subject', 'description_text'];
    use SoftDeletes;

    public static function rules($id = 0) {
        return $rules = [
            'name' => 'required|alpha|min:3',
            'last_name' => 'required|alpha|min:3',
            'egn' => 'required|digits:10|unique:students,egn,' . $id,
            'email' => 'required|unique:students,email,' . $id,
            'city' => 'required|alpha|min:3|max:15',
            'gender' => 'required',
        ];
    }

    static $messages = [
        'name.required' => 'Името е задължително!',
        'name.alpha' => 'Името трябва да съдържа само букви!',
        'name.min' => 'Името трябва да е поне 3 символа!',

        'last_name.required' => 'Фамилията е задължителна!',
        'last_name.alpha' => 'Фамилията трябва да съдържа само букви!',
        'last_name.min' => 'Фамилията трябва да е поне 3 символа!',

        'egn.required' => 'ЕГН е задължиелно!',
        'egn.digits' => 'ЕГН трябва да е точно 10 цифри!',
        'egn.unique' => 'Вече има друг потребител с това ЕГН!',

        'email.required' => 'Имейла е задължителен!',
        'email.unique' => 'Вече има друг потребител с този Имейл!',

        'city.required' => 'Града е задължителен!',
        'city.alpha' => 'Града трябва да съдържа само букви!',
        'city.min' => 'Града трябва да е поне 3 символа!',
        'city.max' => 'Града трябва да е по-малко от 15 символа!',

        'gender.required' => 'Пола е задължителен!',
    ];
}