<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use App\Models\User;
use GuzzleHttp\Promise\Create;
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
        // \App\Models\User::factory(10)->create();
        Jabatan::Create([
            'nama_jabatan' => 'CEO'
        ]);
        User::Create([
            'name' => 'admin',
            'jabatan_id' => 1,
            'NIP' => 1914311005,
            'no_telp' => 85257232024,
            'email' => 'admin@admin.com',
            'is_admin' => true,
            'gambar' => '90x90.jpg',
            'password' => bcrypt('password'),
        ]);
    }
}
