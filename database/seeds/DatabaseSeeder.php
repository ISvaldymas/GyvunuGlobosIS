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
        $this->call(ActivitySeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(DesignSeeder::class);
        $this->call(MusicSeeder::class);
        $this->call(ThemeSeeder::class);
        $this->call(AmenitiesTableSeeder::class);
        $this->call(MessageSeeder::class);
        $this->call(EntertainmentSeeder::class);
        $this->call(DecorationSeeder::class);
        $this->call(AmenityRoomsSeeder::class);
    }
}
