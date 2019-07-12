<?php

use Illuminate\Database\Seeder;
use App\Category;//忘れない
use App\User;
use App\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        // $this->call(UsersTableSeeder::class);
        factory('App\User',20)->create();
        factory('App\Company',20)->create();
        factory('App\Job',20)->create();
        $categories = [//カテゴリー名を付ける
            'Technology',
            'Engineering',
            'Goverment',
            'Medical',
            'Construction',
            'Software'
        ];
        foreach($categories as $category){
            Category::create(['name'=>$category]);
        }

        Role::truncate();
        $adminRole = Role::create(['name'=>'admin']);
        $admin = User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('password123'),
            'email_verified_at'=>NOW()
        ]);

        $admin->roles()->attach($adminRole);

    }
}
