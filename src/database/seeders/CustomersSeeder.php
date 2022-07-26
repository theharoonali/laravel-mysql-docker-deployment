<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Company;
use App\Models\User;
use Faker\Factory as Faker;
use Hash;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
    {
      for($i=0;$i<5;$i++){
        $faker2 = Faker::create();
        $company = new Company;
        $company->companyname = $faker2->name;
        $company->email = $faker2->email;
        $company->save();}

       for($i=0;$i<20;$i++){
       $faker = Faker::create();
       $customer = new Customer;
       $customer->firstname = $faker->firstname;
       $customer->lastname = $faker->lastname;
       $customer->email = $faker->email;
       $customer->phoneno = 3138167990;
       $customer->comments = "No Comment";
       $customer->gender = "Male" ;
       $customer->company_id = random_int(1,5) ;
       $customer->save();}

       $user = new User;
       $user->name = "Admin";
       $user->email = "admin@admin.com";
       $user->password = Hash::make(112233);
       $user->save();




    }


}
