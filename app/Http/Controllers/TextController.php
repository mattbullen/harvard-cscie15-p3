<?php namespace App\Http\Controllers;

use Request;
use Response;
use Badcow\LoremIpsum\Generator as generator;

class TextController extends Controller {
    
    /*
    Sources:
       https://packagist.org/packages/badcow/lorem-ipsum
    */

    // Main function to generate lorem ipsum text.
    public function getText() {

        $generator = new generator();
        
        if (Request::has("quantity") && (int) Request::input("quantity")) {
            $number = (int) Request::input("quantity");
        } else {
            $number = 3;
        }
        
        $paragraphs = $generator->getParagraphs($number);

        return Response::json(array("text" => $paragraphs));
    }
}