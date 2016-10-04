<?php

use Illuminate\Database\Seeder;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
          $groups = ['vienvietis', 'dvivietis', 'trivietis', 'keturvietis'];
        foreach ($groups as $group) {
            DB::table('room_types')->insert([
                'name' => $group,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
        }
    }
}
