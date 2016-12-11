<?php

use Illuminate\Database\Seeder;

class EntertainmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Users:
        $entertainment = array(
            "Entertainment_1" => array(
                'entertainment' => array(
                    'id'          => 10, 
                    'activity_fk' => 2, 
                    'theme_fk' => 2,
                    'duration'       => '00:30',
                    'price'       => 5,
                    'body'        => ' Naujųjų metų žaidimų vakaras skirtas tiems, kas naujus metus nori pastikti turiningai, aktyviai ir smagiai. Ypač tinka šeimoms. Užimtumas garantuotas. Kiekvienas gali laimėti smagių ir praktiškų prizų, tereikia nebijoti iššukių ir būti aktyviam:).',
                ),
            ),


              "Entertainment_2" => array(
                'entertainment' => array(
                    'id'          => 11, 
                    'activity_fk' => 1, 
                    'theme_fk' => 1,
                    'duration'       => '00:20',
                    'price'       => 10,
                    'body'        => 'Tai komedijos žanro muzikinis spektaklis skirtas mažiems ir dideliems ieškantiems Kalėdinio stebuklo ir pasakos. Spektaklyje pamatysite Išsiblaškėlį Kalėdų Senį ir jo ištikimą draugą Besmegenį. Šventės dalyvius nudžiuginsime sceniniais fejerverkais, balionais ir konfeti sniegu bei kitomis staigmenomis.',
                ),
            ),

               "Entertainment_3" => array(
                'entertainment' => array(
                    'id'          => 12, 
                    'activity_fk' => 0, 
                    'theme_fk' => 0,
                    'duration'       => '00:30',
                    'price'       => 10,
                    'body'        => 'Valanda geriausios raganų ir velnių puotos muzikos. Techno, „trance“, hausas bei kiti muzikiniai stiliai. Savo pasirodymais stebins profesonalūs atlikėjai. Į pragariškąjį karnavalą bus įtrauktas kiekvienas.',
                ),
            ),

              "Entertainment_4" => array(
                'entertainment' => array(
                    'id'          => 13, 
                    'activity_fk' => 2, 
                    'theme_fk' => 3,
                    'duration'       => '00:40',
                    'price'       => 5,
                    'body'        => 'Tegul švenčiančiojo gimtadienis būna įsimintinas ir aktyvus internetinėje erdvėje. LAN gimtadienio vakarėlis patiks visiems, kas megaujasi žaisdami populiariausius ir naujausius komandinius žaidimus pagal tam tikras taisykles. Kiekvienas laimėtojas bus dosnoiai apdovanotas.',
                ),
            ),
        );

        foreach ($entertainment as $usr) {
            //Registration:
            DB::table('entertainment')->insert([
                'id'             => $usr['entertainment']['id'],
                'activity_fk'          => $usr['entertainment']['activity_fk'],
                'theme_fk'    => $usr['entertainment']['theme_fk'],
                'duration'          => $usr['entertainment']['duration'],
                'price'           => $usr['entertainment']['price'],
                'body'           => $usr['entertainment']['body'],
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
        }
    }
}
