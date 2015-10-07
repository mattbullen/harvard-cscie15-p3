<?php namespace App\Http\Controllers;

use Request;
use Response;
use Faker\Factory as randomUserFactory;

class UsersController extends Controller {
    
    /*
    Sources:
       https://github.com/fzaninotto/Faker
    */

    // Main function to generate lorem ipsum text.
    public function getUsers() {
        
        // Instantiate a random user generator object.
        $factory = randomUserFactory::create();
        
        // Instantiate a results array.
        $list = array();

        // Find the number of users to generate; if there is a problem with the request, it defaults to 1 user.
        if (Request::has("quantity-users") && (int)Request::input("quantity-users") > 0) {
            $length = (int)Request::input("quantity-users");
        } else {
            $length = 1;
        }
        
        // Loop to generate users.
        for ($i = 0; $i < $length; $i++) {
            
            // Instantiate a temp variable to hold the details of each random user.
            $details = (object)array();
            
            // Set a random name and gender.
            if (Request::has("include-name") && Request::input("include-name") === "true") {
                $type = rand(0, 1);
                if ($type === 0) {
                    $details->name = $factory->name($gender = "male");
                    $details->gender = "Male";
                } else {
                    $details->name = $factory->name($gender = "female");
                    $details->gender = "Female";
                }
            }
            
            // Set the remaining user details.
            if (Request::has("include-address") && Request::input("include-address") === "true") { $details->address = $factory->address; }
            if (Request::has("include-email") && Request::input("include-email") === "true") { $details->email = $factory->email; }
            if (Request::has("include-phone") && Request::input("include-phone") === "true") { $details->phone = $factory->phoneNumber; }
            if (Request::has("include-company") && Request::input("include-company") === "true") { $details->company = $factory->company; }
            if (Request::has("include-catchphrase") && Request::input("include-catchphrase") === "true") { $details->catchphrase = $factory->catchPhrase; }
            if (Request::has("include-birthday") && Request::input("include-birthday") === "true") { $details->birthday = $factory->dateTimeThisCentury->format("F j, Y"); }
            
            // Push the new user to the results list.
            $list[] = $details;
        }
        
        // Return the results list as a JSON object.
        return Response::json($list);
    }
}