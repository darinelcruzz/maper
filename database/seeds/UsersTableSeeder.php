<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    function run()
    {
        factory(App\User::class)->create();
        factory(App\User::class)->create([
            'name' => 'Conta',
            'email' => 'conta',
            'level' => '2',
            'password' => Hash::make('conta'),
            'pass' => 'conta',
        ]);
        factory(App\User::class)->create([
            'name' => 'Secretaria',
            'email' => 'secretaria',
            'level' => '3',
            'password' => Hash::make('secretaria'),
            'pass' => 'secretaria',
        ]);
    }
}
