<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('name', 50)->after('id');
            $table->string('last_name', 50)->after('name');
            $table->integer('egn')->after('last_name');
            $table->string('email')->after('egn');
            $table->string('city', 20)->after('email');
            $table->string('gender')->after('city');
            $table->string('sport_preff')->nullable()->after('gender');
            $table->integer('subject')->nullable()->after('sport_preff');
            $table->string('description_text')->nullable()->after('subject');

            $table->softDeletes()->after('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn(['name', 'lastName', 'EGN', 'email', 'city', 'gender', 'sport_preff', 'subject', 'descriptionText', 'deleted_at']);
        });
    }
}
