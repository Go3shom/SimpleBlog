<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // DB::insert('insert into users (id, name) values (?, ?)', [1, 'Dayle'])


        DB::insert(
            'insert into categories(id, name, slug) values (?, ?, ?)',
            [1, 'Uncategorized', 'uncategorized']
        );


        User::factory()->create([
            'name' => 'Dude',
            'username' => 'Dude',
            'email' => 'dude@dude.com',
            'password' => 'password@123'
        ]);
    }
}
