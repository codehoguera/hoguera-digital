<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            RegionalSeeder::class,
            RoleAndPermissionSeeder::class,
            EntitySeeder::class,
        ]);
        
        $admin = \App\Models\User::create([
            'email' => 'admin@digital.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'enable' => true,
            'remember_token' => Str::random(10),
        ]);

        $admin->userDate()->create([
            'regional_id' => 2,
            'name' => 'G. Leonel',
            'first_lastname' => 'Miranda',
            'second_lastname' => 'Aviza',
            'nro_ci' => '8912146',
            'issued' => 'SCZ',
            'nit' => '0',
            'birthday_date' => date_create_from_format('Y-m-d', "1990-12-25"),
            'city' => 'SANTA CRUZ',
            'addres' => 'Av. Mutualista C/ Dr. Andrés Muñoz #3735',
            'cell_personal' => '70911555',
            'cell_work' => '10815305',
            'email_personal' => 'gmiranda@lahoguera.com',
            'code_teacher' => Str::random(10),
            'change_password' => true,
            'verify_data' => true,
        ]);

        $admin->assignRole('admin');
 
        $users = \App\Models\User::factory(110)
                ->has(\App\Models\UserDate::factory()->count(1))
                ->create();
                
                $users = \App\Models\User::where('id', '>', 1)->get();
                $i = 1;

                foreach ($users as $aux) {
                    if ($i <= 10) {
                        $aux->assignRole('admin');
                    }
        
                    if ($i > 10 && $i <= 20) {
                        $aux->assignRole('supervisor');
                    }
        
                    if ($i > 20 && $i <= 30) {
                        $aux->assignRole('curator');
                    }
        
                    if ($i > 30 && $i <= 40) {
                        $aux->assignRole('seller');
                    }
        
                    if ($i > 40 && $i <= 50) {
                        $aux->assignRole('school-principal');
                    }
        
                    if ($i > 50 && $i <= 60) {
                        $aux->assignRole('teacher');
                    }
        
                    if ($i > 60 && $i <= 70) {
                        $aux->assignRole('student');
                    }
        
                    if ($i > 70 && $i <= 80) {
                        $aux->assignRole('admregional');
                    }
        
                    if ($i > 80 && $i <= 90) {
                        $aux->assignRole('corrector');
                    }
        
                    if ($i > 90 && $i <= 100) {
                        $aux->assignRole('cdm');
                    }
        
                    if ($i > 100) {
                        $aux->assignRole('executive-alpema');
                    }
        
                    $i++;
                }

        \App\Models\UserDate::each(function($user){
            $user->entities()->saveMany(\App\Models\Entity::factory()->count(1)->make());
        });
        
    }
}