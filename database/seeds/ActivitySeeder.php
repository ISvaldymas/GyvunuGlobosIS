<?php

use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $activities = ['šokis', 'spektaklis', 'žaidimai'];
        foreach ($activities as $activity) {
            DB::table('activity')->insert([
                'name' => $activity,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
        }
    }
}
