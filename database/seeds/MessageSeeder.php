<?php

use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
     /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $message = array(
            "Message_1" => array(
                'message' => array(
                    'id'          => 10,
                    'email'       => 'sandra.klezyte4@gmail.com', 
                    'subject' => 'Kviečiame į Naujųjų metų šventės atidarymo vakarėlį',
                    'bodyMessage'        => ' Gruodžio 31 d. 21:00 val. kviečiame visus, kurie mėgsta gerą muziką - legendinė Lietuvos roko grupė „Rebel Heart“ pasitiks Jus ne tik su visiems žinomais geriausiais visų laikų superhitais, bet ir niekam iki šiol negirdėtomis naujomis dainomis.',

                ),

            ),
            
              "message_2" => array(
                'message' => array(
                    'id'          => 20, 
                    'email'       => 'ruta.puta@gmail.com', 
                    'subject' => 'Helovino vakarėlis Wolverhamptone',
                    'bodyMessage'        => 'Vartai, skiriantys šį ir anapusinį pasaulius, su trenksmu atsivers Wolverhamptone, spalio 31 dieną, didžiausiame lietuviams skirtam renginyje West Midland "GRAND HALLOWEEN CARNIVAL", priversiančiame kukliai gūžtis net ir mirusiųjų pasaulio galinguosius.',
                    'photo_fk'     =>'database/message/keturi.jpg',

                ),
            ), 

        );

        foreach ($message as $usr) {
            DB::table('message')->insert([
                'id'             => $usr['message']['id'],
                'email'          => $usr['message']['email'],
                'subject'    => $usr['message']['subject'],
                'bodyMessage'          => $usr['message']['bodyMessage'],
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
        }
	}
}
