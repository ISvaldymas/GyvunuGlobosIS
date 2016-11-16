<?php

use Illuminate\Database\Seeder;

class StarsValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = ['1', '2', '3', '4','5'];
        foreach ($groups as $group) {
            DB::table('stars_values')->insert([
                'value' => $group,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
        }
    }
}
