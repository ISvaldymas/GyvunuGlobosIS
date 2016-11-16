<?php

use Illuminate\Database\Seeder;

class MusicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $music = ['classic', 'metal', 'pop', 'rock', 'country'];
        foreach ($music as $mus) {
            DB::table('music')->insert([
                'name' => $mus,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
        }
    }
}
