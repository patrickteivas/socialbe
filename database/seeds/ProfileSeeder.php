<?php

use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::all()->each(function ($user) {
            factory(\App\Profile::class)->create(['user_id' => $user->id]);
        });
    }
}
