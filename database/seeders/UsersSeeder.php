<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use phpDocumentor\Reflection\Types\Boolean;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(User::query()->where('email', 'admin@admin.com')->count() == 0)
        {
            User::query()
                ->create([
                    'name'              => 'Admin',
                    'email'             => 'admin@admin.com',
                    'email_verified_at' => now(),
                    'password'          => bcrypt('123123'),
                ]);
        }

        if(User::query()->where('email', 'editor@editor.com')->count() == 0)
        {
            User::query()
                ->create([
                    'name'              => 'Editor Test',
                    'email'             => 'editor@editor.com',
                    'email_verified_at' => now(),
                    'password'          => bcrypt('secret'),
                ]);
        }
    }
}
