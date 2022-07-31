<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                "name"     => "Administrador",
                "email"    => "adm@email.com",
                "password" => bcrypt("123456")
            ],
        ])->each(function ($usuario) {
            User::create($usuario);
        });
    }
}
