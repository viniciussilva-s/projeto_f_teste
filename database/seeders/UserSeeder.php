<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nome' => 'Maria Aparecida',
            'email' => Str::random(10).'@example.com',
            'cpf'   => '000.000.000-00',
            'datanascimento'   => '1990-10-02',
            'celular' => '(00) 00000-0000',
            'image' => '',
        ]);
        User::create([
            'nome' => 'Carlos Monteiro',
            'email' => Str::random(10).'@example.com',
            'cpf'   => '111.111.111-11',
            'datanascimento'   => '1990-10-02',
            'celular' => '(11) 11111-1111',
            'image' => '',
        ]);
        User::create([
            'nome' => 'Gabriela Santos',
            'email' => Str::random(10).'@example.com',
            'cpf'   => '222.222.222-22',
            'datanascimento'   => '1990-10-02',
            'celular' => '(22) 22222-2222',
            'image' => '',
        ]);
    }
}

