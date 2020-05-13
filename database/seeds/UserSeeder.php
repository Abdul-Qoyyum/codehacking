<?php

use Illuminate\Database\Seeder;

use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
  DB::statement('SET FOREIGN_KEY_CHECKS=0');
  DB::table('users')->truncate();
  DB::table('posts')->truncate();
  DB::table('roles')->truncate();
  DB::table('categories')->truncate();
  DB::table('photos')->truncate();
  DB::table('comments')->truncate();
  DB::table('comment_replies')->truncate();

factory(User::class,10)->create()->each(function($user){

$user->posts()->save(factory(App\Post::class)->make());

   });

factory(App\Role::class, 3)->create();

factory(App\Photo::class,10)->create();

factory(App\Category::class,1)->create();

factory(App\Comment::class,10)->create()->each(function($c){
   $c->replies()->save(factory(App\CommentReply::class)->make());
});



//     factory(User::class, 10)->create();

/*
        DB::table('users')->insert([
        'name'=> str_random(10),
        'role_id'=>1,
        'is_active'=>1,
        'email'=> str_random(10).'@gmail.com',
        'password'=>bcrypt('secret')
         ]);
*/

    }
}
