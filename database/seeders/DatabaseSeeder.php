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
        DB::insert(
            'insert into categories(id, name, slug, created_at,
            updated_at) values (?, ?, ?, ?, ?)',
            [1, 'Uncategorized', 'uncategorized', now(), now()]
        );


        User::factory()->create([
            'is_admin' => true,
            'name' => 'Admin',
            'username' => 'Admin',
            'email' => 'admin@simple.blog.com',
            'password' => 'password@123'
        ]);
    }
}
