<?php

use App\User;
use App\Seeker;
use App\UserPermission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::transaction(function () {
 
            $users = DB::table('unregistered_users')
			->whereBetween('id',[15001, 20000])
			->select('email')->get();     


        	$password = User::generateRandomString(10);

        	// $users = array_values( array_unique( $users, SORT_REGULAR ) );

            /**
             * Loop through the .json object and get each key value pair.
             */

            foreach($users as $user)
            {  
            	if(User::where('email', $user->email)->get()->isNotEmpty())
            		continue;

                $name = substr($user->email, 0, strrpos($user->email, '@'));
            	$user = User::create([
	                'name' => $name,
	                'username' => $name.rand(1000,30000),
	                'email' => $user->email,
	                'email_verification' => User::generateRandomString(10),
	                'password' => Hash::make($password)
	            ]);
	    
	            // Create user seeker record
	            $user = Seeker::create([
	                'user_id' => $user->id,
	                'public_name' => $name,
	                'phone_number' => null,
	                'industry_id' =>32,
	                'country_id' => 1,
	                'featured' => 0              
	            ]);

	              // Create user permission record
	            $user = UserPermission::create([
		            'user_id' => $user->id, 
		            'permission_id' => 4           
	            ]);
            }
        });
    }
}
