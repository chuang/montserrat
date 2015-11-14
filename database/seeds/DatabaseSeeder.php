<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use \App\Innkeeper;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
          Innkeeper::create([
			'title' => 'Fr.',
                        'firstname' => 'Ron',
                        'lastname' => 'Boudreaux',
                        'suffix' => 'S.J.',
                        'address1' => 'Montserrat Retreat House',
                        'address2' => '600 N. Shady Shores Road',
                        'city' => 'Lake Dallas',
                        'state' => 'TX',
                        'zip' => '75065',
                        'country' => 'USA',
                        'homephone' => '940-321-6020 x237',
                        'workphone' => '940-321-6020 x237',
                        'mobilephone' => '940-395-7447',
                        'gender' => 'Male',
                        'languages' => 'English, Spanish',
			'email' => 'ron.boudreaux@montserratretreat.org',
			'password' => bcrypt('admin')
		]);
        
         Innkeeper::create([
			'title' => 'Fr.',
                        'firstname' => 'Anthony',
                        'lastname' => 'Borrow',
                        'suffix' => 'S.J.',
                        'address1' => 'Montserrat Retreat House',
                        'address2' => '600 N. Shady Shores Road',
                        'city' => 'Lake Dallas',
                        'state' => 'TX',
                        'zip' => '75065',
                        'country' => 'USA',
                        'homephone' => '940-321-6020 x233',
                        'workphone' => '940-321-6020 x233',
                        'mobilephone' => '504-383-5852',
                        'url' => 'https://arborrow.org',
                        'gender' => 'Male',
                        'languages' => 'English/Spanish',
			'email' => 'anthony.borrow@montserratretreat.org',
			'password' => bcrypt('admin')
		]);
         
            Innkeeper::create([
			'title' => 'Fr.',
                        'firstname' => 'John',
                        'lastname' => 'Payne',
                        'suffix' => 'S.J.',
                        'address1' => 'Montserrat Retreat House',
                        'address2' => '600 N. Shady Shores Road',
                        'city' => 'Lake Dallas',
                        'state' => 'TX',
                        'zip' => '75065',
                        'country' => 'USA',
                        'homephone' => '940-321-6020 x229',
                        'workphone' => '940-321-6020 x229',
                        'mobilephone' => '512-289-3370',
                        'gender' => 'Male',
                        'languages' => 'English',
			'email' => 'john.payne@montserratretreat.org',
			'password' => bcrypt('admin')
		]);

        Model::reguard();
    }
}
