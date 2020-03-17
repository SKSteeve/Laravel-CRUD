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
            'egn' => 91812344,
            'email' => 'ivanov@gmail.com',
            'city' => 'Варна',
            'gender' => 'Мъж',
            'sport_preff' => '-',
            'subject' => 1,
            'description_text' => 'Плача докат уча',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => now(),
        ]);

        DB::table('students')->insert([
            'id' => 2,
            'name' => 'Стефан',
            'last_name' => 'Стефанов',
            'egn' => 9718213,
            'email' => 'stefan@gmail.com',
            'city' => 'София',
            'gender' => 'Мъж',
            'sport_preff' => '-',
            'subject' => 2,
            'description_text' => 'Плача док',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('students')->insert([
            'id' => 3,
            'name' => 'Мариела',
            'last_name' => 'Стефанова',
            'egn' => 2918343,
            'email' => 'mstefv@gmail.com',
            'city' => 'Казанлък',
            'gender' => 'Жена',
            'sport_preff' => '-',
            'subject' => 1,
            'description_text' => 'Плача докат уча',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('students')->insert([
            'id' => 4,
            'name' => 'Сулио',
            'last_name' => 'Сулев',
            'egn' => 98112774,
            'email' => 'sula@gmail.com',
            'city' => 'Пазарджик',
            'gender' => 'Мъж',
            'sport_preff' => '-',
            'subject' => 2,
            'description_text' => 'Пл уча',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('students')->insert([
            'id' => 5,
            'name' => 'Илян',
            'last_name' => 'Илиев',
            'egn' => 91812344,
            'email' => 'ilian@gmail.com',
            'city' => 'Бургас',
            'gender' => 'Мъж',
            'sport_preff' => '-',
            'subject' => 3,
            'description_text' => 'докат уча',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => now(),
        ]);
    }
}
