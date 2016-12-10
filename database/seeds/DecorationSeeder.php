<?php

use Illuminate\Database\Seeder;

class DecorationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     //Users:
        $decoration = array(
            "Decoration_1" => array(
                'decoration' => array(
                    'id'          => 10, 
                    'color_fk' => 2, 
                    'theme_fk' => 2,
                    'music_fk'  => 3,
                    'design_fk' => 2,
                    'price'       => 5,
                    'body'        => 'Kambario dizainas mėgstantiems iššūkius ir išskirtinumą, rafinuotą prabangą ir gerą muziką.',
                ),
            ),


              "Decoration_2" => array(
                'decoration' => array(
                    'id'          => 11, 
                    'color_fk' => 1, 
                    'theme_fk' => 1,
                    'music_fk'  => 2,
                    'design_fk' => 0,
                    'price'       => 10,
                    'body'        => 'Šis kambario dizainas išsiskiria jaukumu, puiki šiolaikiška muzika sukuria laisvės atmosferą.',
                ),
            ),

               "Decoration_3" => array(
                'decoration' => array(
                    'id'          => 12, 
                    'color_fk' => 0, 
                    'theme_fk' => 0,
                    'music_fk'       => 1,
                    'design_fk' => 1,
                    'price'       => 10,
                    'body'        => 'Mėgsti chaosą? Šis kambario dizainas kaip tik tau! Išraiškingos spalvos detalės, papildytos gera fonine muzika ir įmantriu dizainu bei tematika.',
                ),
            ),

              "Decoration_4" => array(
                'decoration' => array(
                    'id'          => 13, 
                    'color_fk' => 3, 
                    'theme_fk' => 3,
                    'music_fk'  => 0,
                    'design_fk' => 3,
                    'price'       => 5,
                    'body'        => 'Šventinę nuotaiką atspindintis kambarys leis Naujuosius metus pasitikti kaip niekad stilingai ir jaukiai!',
                ),
            ),
        );

        foreach ($decoration as $usr) {
            //Registration:
            DB::table('decoration')->insert([
                'id'             => $usr['decoration']['id'],
                'color_fk'          => $usr['decoration']['color_fk'],
                'theme_fk'    => $usr['decoration']['theme_fk'],
                'design_fk'    => $usr['decoration']['design_fk'],
                'music_fk'          => $usr['decoration']['music_fk'],
                'price'           => $usr['decoration']['price'],
                'body'           => $usr['decoration']['body'],
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
        }
    }
}
