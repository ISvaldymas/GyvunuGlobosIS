<?php

use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Rooms:
        $rooms = array(
            "Room_1" => array(

                'room' => array(
                    'id'          => 1, 
                    'number'       => 101, 
                    'room_type_fk' => 0,
                    'price'       => 28,
                    'body'        => ' kambario plotas, palyginus su standartiniu kambariu – didesnis. Kambarys padalintas į dvi zonas: miegamąją ir svetainės. Kartais jos yra atskiriamos dekoratyvine užuolaida, o kartais – tik grindų lygiu. Baldai čia geresni nei standartiniuose kambariuose, aptarnavimas – taip pat. Jie dažniausiai būna 5*, rečiau 4* viešbučiuose ir kainuoja apie 30 proc. brangiau negu standartiniai kambariai.',
                    'photo_fk'     =>'database/rooms/vienas.jpg',

                ),

                'photos' => array(
                    'url'       => 'database/rooms/vienas.jpg',
                    'ext'       => 'jpg',
                    'size'      => 16117,
                    'cover'     => 1,
                ),
            ),
            //Sekantys kambariai:
              "Room_2" => array(

                'room' => array(
                    'id'          => 2, 
                    'number'       => 102, 
                    'room_type_fk' => 1,
                    'price'       => 50,
                    'body'        => 'Dviejų kambarių numeris su prieškambariu. Sieninė spinta, šaldytuvas, odiniai baldai, kabelinė televizija, du televizoriai, oro kondicionierius, plati dvigulė lova, elektriniai šildytuvai, vonios kambarys, plaukų džiovintuvas, interneto ryšys ',
                    'photo_fk'     =>'database/rooms/du.jpg',

                ),

                'photos' => array(
                    'url'       => 'database/rooms/du.jpg',
                    'ext'       => 'jpg',
                    'size'      => 18883,
                    'cover'     => 1,
                ),
            ),
               "Room_3" => array(

                'room' => array(
                    'id'          => 3, 
                    'number'       => 103, 
                    'room_type_fk' => 2,
                    'price'       => 68,
                    'body'        => 'du gretimi kambariai (pagal dydį – pusantro), skirti šeimai. Kiekviename iš jų įprastai stovi dvi lovos (vaikų kambaryje lovelė gali būti dviejų aukštų). Prieš rezervuojant šios kategorijos kambarį, vertėtų pasitikslinti, ar tarp kambarių yra durys (kartais tarp jų būna tiesiog palikta didelė ertmė). Dažniausiai jis kainuoja apie 30 proc. brangiau nei standartinis kambarys, kuriame pastatomos dvi papildomos lovelės.',
                    'photo_fk'     =>'database/rooms/trys.jpg',

                ),

                'photos' => array(
                    'url'       => 'database/rooms/trys.jpg',
                    'ext'       => 'jpg',
                    'size'      => 19604,
                    'cover'     => 1,
                ),
            ), 
              "Room_4" => array(

                'room' => array(
                    'id'          => 4, 
                    'number'       => 104, 
                    'room_type_fk' => 3,
                    'price'       => 20,
                    'body'        => 'du gretimi kambariai (pagal dydį – pusantro), skirti šeimai. Kiekviename iš jų įprastai stovi dvi lovos (vaikų kambaryje lovelė gali būti dviejų aukštų). Prieš rezervuojant šios kategorijos kambarį, vertėtų pasitikslinti, ar tarp kambarių yra durys (kartais tarp jų būna tiesiog palikta didelė ertmė). Dažniausiai jis kainuoja apie 30 proc. brangiau nei standartinis kambarys, kuriame pastatomos dvi papildomos lovelės.',
                    'photo_fk'     =>'database/rooms/keturi.jpg',

                ),

                'photos' => array(
                    'url'       => 'database/rooms/keturi.jpg',
                    'ext'       => 'jpg',
                    'size'      => 20569,
                    'cover'     => 1,
                ),
            ), 

        );

        foreach ($rooms as $usr) {
            //Registration:
            DB::table('rooms')->insert([
                'id'             => $usr['room']['id'],
                'number'          => $usr['room']['number'],
                'room_type_fk'    => $usr['room']['room_type_fk'],
                'price'          => $usr['room']['price'],
                'body'           => $usr['room']['body'],
                'photo_fk'           => $usr['room']['photo_fk'],
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);

            //Photo
            DB::table('photos')->insert([
                'url'       => $usr['photos']['url'],
                'ext'       => $usr['photos']['ext'],
                'size'      => $usr['photos']['size'],
                'cover'     => $usr['photos']['cover'],
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
        }
    }
}
