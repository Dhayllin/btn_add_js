<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");
        DB::table('users')->insert([
            [
                'id'            =>1,
                'name'          => 'Teste 1',
                'email'         => 'teste1@gmail.com',      
                'password'      => bcrypt('123456789'),           
                'remember_token'=> str_random(10),              
                "created_at"    => $now,
                "updated_at"    => $now,
            ],
            [
                'id'            =>2,
                'name'          => 'Teste 2',
                'email'         => 'teste2@hotmail.com',
                'password'      => bcrypt('123456789'),                   
                'remember_token'=> str_random(10),
                "created_at"    => $now,
                "updated_at"    => $now,
            ],      
        ]);
    }
}
