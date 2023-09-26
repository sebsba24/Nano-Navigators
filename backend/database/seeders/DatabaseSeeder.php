<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //*Roles Migration
        $roles = [
            [
                'name' => 'Administrador',
            ],
            [
                'name' => 'Profesor',
            ],
            [
                'name' => 'Estudiante',
            ],

        ];

        foreach ($roles as $role) {
            \App\Models\Role::factory()->create($role);
        }
        // //*Users Migration
        // $users = [
        //     [
        //         'name' => 'sebstian',
        //         'last_name' => 'barragan',
        //         'email' => 'sebstian@example.com',
        //         'identification' => 1098764232,
        //         'phone' => 3092832323,
        //         'role_id' => 1,
        //     ]
        // ];

        // foreach ($users as $user) {
        //     \App\Models\User::factory()->create($user);
        // }

        // //*Migration Courses
        // $courses = [
        //     [
        //         'name_course' => 'Java 1',
        //         'description' => 'Primeros pasos en Java',
        //         'start_date' => '2023 - 09 - 27',
        //         'end_date' => '2023 - 09 - 29',
        //         'user_id' => 1
        //     ],
        //     [
        //         'name_course' => 'Python',
        //         'description' => 'Primeros pasos en Python',
        //         'start_date' => '2023 - 10 - 05',
        //         'end_date' => '2023 - 11 - 08',
        //         'user_id' => 1
        //     ],
        // ];

        // foreach ($courses as $course) {
        //     \App\Models\Course::factory()->create($course);
        // }

        // //*Migration Modules
        // $modules = [
        //     [
        //         'name' => 'Principios',
        //         'description' => 'Aprendiendo lo Principal',
        //         'course_id' => 1,
        //     ],
        //     [
        //         'name' => 'Bases',
        //         'description' => 'Que siempre tener en cuenta',
        //         'course_id' => 1,
        //     ],
        //     [
        //         'name' => 'Hola mundo',
        //         'description' => 'Primer proyecto',
        //         'course_id' => 2,
        //     ],
        //     [
        //         'name' => 'Ciclos',
        //         'description' => 'Formas de recorrer datos',
        //         'course_id' => 2,
        //     ],
        // ];

        // foreach ($modules as $module) {
        //     \App\Models\Module::factory()->create($module);
        // }

        //*Migration 
        // \App\Models\User::factory(10)->create();
    }
}