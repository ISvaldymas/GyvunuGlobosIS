<?php

use Illuminate\Database\Seeder;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = ['Confirmed', 'Waiting', 'Denied', 'changed'];
        foreach ($states as $stat) {
            DB::table('states')->insert([
                'name' => $stat,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
        }
    }
}
