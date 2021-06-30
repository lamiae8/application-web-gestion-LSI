<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Prof;
use App\Models\Semester;
use App\Models\Module;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
{

    DB::table('semesters')->insert([

        [

            'name' => 'S1',



        ],

        [

            'name' => 'S2',

                    ],

        [

            'name' => 'S3',

             ],

        [

            'name' => 'S4',

         ] ,

        [

            'name' => 'S5',

            ],
            [

                'name' => 'S6',

                ],
            ]);
//********* inserer user*** */
DB::table('users')->insert([
    [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '123456789',

            'role' => 'admin',



        ],
    [
        'name' => 'aachak lotfi',
        'email' => 'aachak@gmail.com',
        'password' => '123456789',

        'role' => 'prof',



    ],

    [
        'name' => 'fennan',
        'email' => 'fennan@gmail.com',
        'password' => '123456789',

        'role' => 'prof',



    ],
    [
        'name' => 'naimi',
        'email' => 'naimi@gmail.com',
        'password' => '123456789',

        'role' => 'prof',



    ],
]);
//**********insere prof */
DB::table('profs')->insert([

    [


        'cni' => 'la12345',

        'user_id' => '1',



    ],
    [


        'cni' => 'fe12345',

        'user_id' => '2',



    ],
    [


        'cni' => 'na12345',

        'user_id' => '3',



    ],
]);
            //***** inserer modules */

            DB::table('modules')->insert([

                [

                    'name' => 'C++',
                    'nbr_heure' => '20',
                    'semester_id' => '1',
                    'prof_id' => '3',



                ],

                [

                    'name' => 'java',
                    'nbr_heure' => '15',
                    'semester_id' => '2',
                    'prof_id' => '2',



                ],

                [

                    'name' => 'frameworks',
                    'nbr_heure' => '19',
                    'semester_id' => '2',
                    'prof_id' => '1',



                ],
            ]);



}
}
