<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StatesSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(AgeGroupSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RoomTypeSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(StarsValueSeeder::class);
        $this->call(CommentSeeder::class);
    }
}
