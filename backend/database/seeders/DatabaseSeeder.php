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
        //*Users Migration
        $users = [
            [
                'name' => 'sebstian',
                'last_name' => 'barragan',
                'email' => 'sebstian@example.com',
                'identification' => 1098764232,
                'phone' => 3092832323,
                'role_id' => 1,
                'state' => true
            ]
        ];

        foreach ($users as $user) {
            \App\Models\User::factory()->create($user);
        }

        //*Courses Migration
        $courses = [
            [
                'name' => 'Java 1',
                'description' => 'Primeros pasos en Java',
                'start_date' => '2023-09-27',
                'enable_date'=> '2023-09-28',
                'end_date' => '2023-09-29',
                'user_id' => 1,
                'state' => false
            ],
            [
                'name' => 'Python',
                'description' => 'Primeros pasos en Python',
                'start_date' => '2023-10-05',
                'enable_date'=> '2023-11-20',
                'end_date' => '2023-12-08',
                'user_id' => 1,
                'state' => true
            ],
        ];

        foreach ($courses as $course) {
            \App\Models\Course::factory()->create($course);
        }

        //*Modules Migration 
        $modules = [
            [
                'name' => 'Principios',
                'description' => 'Aprendiendo lo Principal',
                'course_id' => 1,
            ],
            [
                'name' => 'Bases',
                'description' => 'Que siempre tener en cuenta',
                'course_id' => 1,
            ],
            [
                'name' => 'Principios',
                'description' => 'Primer proyecto',
                'course_id' => 2,
            ],
            [
                'name' => 'Intermedio',
                'description' => 'Formas de recorrer datos',
                'course_id' => 2,
            ],
        ];

        foreach ($modules as $module) {
            \App\Models\Module::factory()->create($module);
        }

        //*Assesment Migration 
        $assesments = [
            [
                'name' => 'Evaluacion Java 1',
                'start_date' => '2023-09-27',
                'description' => 1,
                'courses_id' => 1
            ],
            [
                'name' => 'Evaluacion principios python',
                'start_date' => '2024-11-14',
                'description' => 1,
                'courses_id' => 2
            ],

        ];

        foreach ($assesments as $assesment) {
            \App\Models\Assesment::factory()->create($assesment);
        }

        //*Grades Migration 
        $grades = [
            [
                'grade' => 100,
                'user_id' => 1,
                'assesments_id' => 1,
            ],
            [
                'grade' => 80,
                'user_id' => 1,
                'assesments_id' => 1,
            ],

        ];

        foreach ($grades as $grade) {
            \App\Models\Grade::factory()->create($grade);
        }

        //*Topics Migration 
        $topics = [
            [
                'name' => 'Bucles',
                'content' => 'C:\Users\word.pdf',
                'module_id' => 1,
            ],
            [
                'name' => 'Creacion de calculadora',
                'content' => 'C:\Users\audio.mp4',
                'module_id' => 2,
            ],

        ];

        foreach ($topics as $topics) {
            \App\Models\Topic::factory()->create($topics);
        }

        //*Certificates Migration 
        $certificates = [
            [
                'name' => 'Pricipios de Java 1',
                'issue_date' => '2024-09-23',
                'user_id' => 1,
                'courses_id' => 1,
                'assessment_id' => 1
            ],
            [
                'name' => 'Pricipios de Python',
                'issue_date' => '2024-05-10',
                'user_id' => 1,
                'courses_id' => 2,
                'assessment_id' => 2
            ],

        ];

        foreach ($certificates as $certificate) {
            \App\Models\Certificate::factory()->create($certificate);
        }
        // \App\Models\User::factory(10)->create();
    }
}