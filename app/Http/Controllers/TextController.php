<?php namespace App\Http\Controllers;

use Request;
use Response;
use File;

class TextController extends Controller {
    
    /*
    Sources:
       
    */

    // Main function to generate lorem ipsum text.
    public function getText() {
        //$list = self::getBaseWords();
        //$list = self::setWordCase($list);
        //if (Request::has("include-numbers") && Request::input("include-numbers") === "true") { $list = self::addNumbers($list); }
        //if (Request::has("include-special") && Request::input("include-special") === "true") { $list = self::addSpecial($list); }
        return Response::json(array("text" => "lorem ipsum"));
    }
}