<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Users:
    	$users = array(
    		"User_1" => array(

                'user' => array(
                    'email'          => 'admin@gmail.com', //password: admin123
                    'password'       => '$2y$10$wo4A2XCauEheDI8nja64IeosUotkh9dScd0jILW4V6jcMQrNkVnhe', 
                    'information_fk' => 1,
                    'state_fk'       => 1,
                    'role_fk'        => 1,
                ),

    			'user_information' => array(
    				'name' 			=> 'Admin',
    				'lastname' 		=> 'Administrator',
    				'age_group_fk' 	=> 1,
    				'phone' 		=> '+37060000000',
    				'adress' 		=> 'Laisvės g. 24, Tauragė, Lietuva',
    				'newsletter_fk' => 0,
    				'photo_fk' 		=> 1,
    			),

    			'email_confirms' => array(
    				'email' 	=> 'admin@gmail.com',
    				'token' 	=> hash_hmac('sha256', uniqid(), Str::random(40)),
    				'state_fk' 	=> 1,
                    'user_fk'   => 1,
    			),

                'photos' => array(
                    'url'       => 'database/users/1/avatar.jpeg',
                    'ext'       => 'jpeg',
                    'size'      => 192,
                    'cover'     => 1,
                ),
    		),
    		//Sekantys useriai:
    	);

        foreach ($users as $usr) {
        	//Registration:
            DB::table('users')->insert([
    			'email'    			=> $usr['user']['email'],
    			'password' 			=> $usr['user']['password'],
    			'information_fk' 	=> $usr['user']['information_fk'],
    			'state_fk' 			=> $usr['user']['state_fk'],
    			'role_fk' 			=> $usr['user']['role_fk'],
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
        	//Information:
            DB::table('user_informations')->insert([
				'name' 			=> $usr['user_information']['name'],
				'lastname' 		=> $usr['user_information']['lastname'],
				'age_group_fk' 	=> $usr['user_information']['age_group_fk'],
				'phone' 		=> $usr['user_information']['phone'],
				'adress' 		=> $usr['user_information']['adress'],
				'newsletter_fk' => $usr['user_information']['newsletter_fk'],
				'photo_fk' 		=> $usr['user_information']['photo_fk'],
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
        	//Email confirm:
            DB::table('email_confirms')->insert([
				'email' 	=> $usr['email_confirms']['email'],
				'token' 	=> $usr['email_confirms']['token'],
				'state_fk' 	=> $usr['email_confirms']['state_fk'],
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
