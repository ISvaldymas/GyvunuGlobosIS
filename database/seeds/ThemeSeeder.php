<?php

use Illuminate\Database\Seeder;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $themes = ['halloween', 'kalėdos', 'nauji metai', 'gimtadienis'];
        foreach ($themes as $theme) {
            DB::table('theme')->insert([
                'name' => $theme,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
        }
    }
}
