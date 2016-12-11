<?php

use Illuminate\Database\Seeder;

class AmenityRoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $amenity_room = array(
            "Message_1" => array(
                'amenity_room' => array(
                    'id'          => 1,
                    'room_id'     => 1, 
                    'amenity_id'  => 3,    

                ),
            ),
            
            "message_2" => array(
                'amenity_room' => array(
                    'id'          => 2,
                    'room_id'     => 2, 
                    'amenity_id'  => 6,   
                ),
            ), 
            "message_5" => array(
                'amenity_room' => array(
                    'id'          => 5,
                    'room_id'     => 2, 
                    'amenity_id'  => 4,   
                ),
            ), 
            "message_3" => array(
                'amenity_room' => array(
                    'id'          => 3,
                    'room_id'     => 3, 
                    'amenity_id'  => 7,   
                ),
            ), 
             "message_8" => array(
                'amenity_room' => array(
                    'id'          => 6,
                    'room_id'     => 3, 
                    'amenity_id'  => 4,   
                ),
            ), 
            "message_7" => array(
                'amenity_room' => array(
                    'id'          => 7,
                    'room_id'     => 3, 
                    'amenity_id'  => 1,   
                ),
            ), 
            "message_4" => array(
                'amenity_room' => array(
                    'id'          => 4,
                    'room_id'     => 4, 
                    'amenity_id'  => 8,   
                ),
            ), 


        );

        foreach ($amenity_room as $ameni) {
            DB::table('amenity_rooms')->insert([
                'id'             => $ameni['amenity_room']['id'],
                'room_id'          => $ameni['amenity_room']['room_id'],
                'amenity_id'    => $ameni['amenity_room']['amenity_id'],
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
        }
    }
}
