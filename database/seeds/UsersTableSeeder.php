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
        factory(App\User::class)->create();
        factory(App\User::class)->create([
            'name' => 'Conta',
            'email' => 'contador',
            'level' => '2',
            'password' => Hash::make('contados'),
            'pass' => 'contados',
        ]);
    }
}
