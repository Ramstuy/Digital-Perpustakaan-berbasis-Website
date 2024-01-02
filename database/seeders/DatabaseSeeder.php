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
           'password'=>bcrypt('123123')
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
            'slug'=>'History'
            ]);       

        // Book::factory(2)->create();
        
        // Book::create([
        //     'user_id'=>2,
        //     'category_id'=>1,
        //     'title'=>'The Outsider',
        //     'slug'=>'the-outsider',
        //     'quantity'=>4,
        //     'description'=>'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto cumque, illo illum fugit, saepe molestiae mollitia maiores reiciendis quisquam veniam ullam impedit ipsam in? Enim esse error amet ipsam. <p>Minus eligendi placeat ex similique odio delectus repellendus maiores accusamus odit excepturi quo dignissimos possimus, consequatur a aperiam vero porro magnam quis eum qui totam deserunt enim fugit.</p> Et voluptate saepe earum sunt adipisci mollitia iure voluptatibus, natus, consectetur dolorem laborum impedit libero explicabo veniam tenetur expedita aperiam praesentium quis, sapiente quibusdam assumenda? Facere, nemo recusandae? Ducimus exercitationem, illum quod odit molestiae harum quaerat ipsum incidunt, id ipsam dolores officia blanditiis!',
        //     'file'=>'anufile',
        //     'cover'=>'anucover'
        // ]);
    }
}
