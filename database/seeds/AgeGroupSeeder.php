<?php

use Illuminate\Database\Seeder;

class AgeGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = ['18-24', '25-34', '35-44', '45-54', '55-64', '65 ir daugiau'];
        foreach ($groups as $group) {
            DB::table('age_groups')->insert([
                'name' => $group,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
        }
    }
}
