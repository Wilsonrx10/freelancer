<?php

namespace Database\Seeders;

use App\Constants;
use App\User;
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
        //if ($this->command->confirm('Criar banco ?')) {
        $this->command->call('db:create');
        //}

        // Ask for db migration refresh, default is no
        if ($this->command->confirm('Limpar todos registros do banco ?')) {
            // disable fk constrain check
            // \DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            // Call the php artisan migrate:refresh
            $this->command->call('migrate:refresh');
            $this->command->warn("Limpando banco.");
        }
        User::create([
            'name' => 'Admin',
            'id_tipo_usuario' => Constants::tipoUsuarioAdmin,
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'status' => Constants::ativo
        ]);

        User::create([
            'name' => 'usuario',
            'id_tipo_usuario' => Constants::tipoUsuarioCliente,
            'email' => 'usuario@usuario.com',
            'password' => bcrypt('123456'),
            'status' => Constants::ativo
        ]);

        User::create([
            'name' => 'usuario',
            'id_tipo_usuario' => Constants::tipoUsuarioProfissional,
            'email' => 'profissional@profissional.com',
            'password' => bcrypt('123456'),
            'status' => Constants::ativo
        ]);

    }
}
