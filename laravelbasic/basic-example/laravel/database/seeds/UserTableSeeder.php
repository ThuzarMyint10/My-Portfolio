<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usercount = max((int)$this->command->ask('How many users would you like?', 20), 1);
        factory(App\User::class)->states('thu-zar')->create();
        factory(App\User::class, 20)->create();
    }
}
