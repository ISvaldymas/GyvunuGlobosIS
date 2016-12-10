<?php

use Illuminate\Database\Seeder;

class DesignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $designs = ['tradicinis', 'minimalizmas', 'kaimiškas', 'gotikinis'];
        foreach ($designs as $design) {
            DB::table('design')->insert([
                'name' => $design,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
    }
}
}
