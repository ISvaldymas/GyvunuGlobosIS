<?php

use Illuminate\Database\Seeder;

class AmenitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
    
        //
          $groups = ['Wi-fi', 'Televizija', 'Telefonas','Vonios kambarys', 'Mini virtuvė', 'Šaldytuvas','Seifas', 'Kavos aparatas' ];
        foreach ($groups as $group) {
            DB::table('amenities')->insert([
                'name' => $group,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
        }
    
    }
}
