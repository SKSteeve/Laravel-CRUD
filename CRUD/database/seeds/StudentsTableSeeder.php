<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'id' => 1,
            'name' => 'Иван',
            'last_name' => 'Георгиев',
            'egn' => 9181234467,
            'email' => 'ivanov@gmail.com',
            'city' => 'Варна',
            'gender' => 'Мъж',
            'sport_preff' => 'football,voleyball',
            'subject' => 3,
            'description_text' => 'Играч..;)',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('students')->insert([
            'id' => 2,
            'name' => 'Стефан',
            'last_name' => 'Стефанов',
            'egn' => 9718213886,
            'email' => 'stefan@gmail.com',
            'city' => 'София',
            'gender' => 'Мъж',
            'sport_preff' => NULL,
            'subject' => 2,
            'description_text' => 'Страдам от шизофрения.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('students')->insert([
            'id' => 3,
            'name' => 'Мариела',
            'last_name' => 'Стефанова',
            'egn' => 2918343697,
            'email' => 'mstefv@gmail.com',
            'city' => 'Казанлък',
            'gender' => 'Жена',
            'sport_preff' => 'swiming',
            'subject' => 1,
            'description_text' => 'Уча много.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('students')->insert([
            'id' => 4,
            'name' => 'Сулио',
            'last_name' => 'Сулев',
            'egn' => 9811277433,
            'email' => 'sula@gmail.com',
            'city' => 'Пазарджик',
            'gender' => 'Мъж',
            'sport_preff' => 'football,swiming',
            'subject' => NULL,
            'description_text' => NULL,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('students')->insert([
            'id' => 5,
            'name' => 'Илян',
            'last_name' => 'Илиев',
            'egn' => 9181234432,
            'email' => 'ilian@gmail.com',
            'city' => 'Бургас',
            'gender' => 'Мъж',
            'sport_preff' => 'voleyball,swiming',
            'subject' => 4,
            'description_text' => 'Харесва ми да чета за космоса.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
