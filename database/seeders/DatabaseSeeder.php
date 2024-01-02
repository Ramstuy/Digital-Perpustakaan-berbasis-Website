<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Book;
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
        // User::factory(3)->create();

        User::create([
           'name'=>'Aldous Tiktok',
           'username'=>'average',
           'email'=>'ooomaga@gmail.com',
           'password'=>bcrypt('123123'),
           'is_admin'=>0
        ]);

        User::create([
           'name'=>'Ikram Hidayat',
           'username'=>'ramstuy',
           'email'=>'ikrhidayat@gmail.com',
           'password'=>bcrypt('121311'),
           'is_admin'=>1
        ]);

        Category::create([
            'name'=>'Novel',
            'slug'=>'novel'
            ]);
        
        Category::create([
            'name'=>'Scientific',
            'slug'=>'scientific'
            ]);

        Category::create([
            'name'=>'History',
            'slug'=>'history'
            ]);       

        // Book::factory(2)->create();

    }
}
