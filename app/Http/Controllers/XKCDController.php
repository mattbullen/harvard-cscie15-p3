<?php namespace App\Http\Controllers;

use Request;
use Response;
use File;

class XKCDController extends Controller {
    
    /*
    Sources:
        https://secure.php.net/manual/en/reference.pcre.pattern.syntax.php
        https://stackoverflow.com/questions/8251426/insert-string-at-specified-position
        https://stackoverflow.com/questions/6159683/read-each-line-of-txt-file-to-new-array-element
        https://stackoverflow.com/questions/151969/when-to-use-self-vs-this
        
    "words.txt" file from:
        http://www.mieliestronk.com/corncob_lowercase.txt
    */

    // Randomly select between scraping a word list from http://www.paulnoll.com or using the word list file from http://www.mieliestronk.com
    private function getWordList() {
        $type = rand(0, 2);
        if ($type === 1) {
            $regex = "/<li>(.*?)<\/li>/s";
            $result = array();
            for ($i = 1; $i < 30; $i = $i + 2) {
                if ($i < 9) {
                    $scrape = file_get_contents("http://www.paulnoll.com/Books/Clear-English/words-" . "0" . $i . "-" . "0" . ($i + 1) . "-hundred.html");
                } elseif ($i === 9) {
                    $scrape = file_get_contents("http://www.paulnoll.com/Books/Clear-English/words-09-10-hundred.html");
                } else {
                    $scrape = file_get_contents("http://www.paulnoll.com/Books/Clear-English/words-" . $i . "-" . ($i + 1) . "-hundred.html");
                }
                preg_match_all($regex, $scrape, $list);
                for ($j = 0; $j < count($list[1]); $j++) {
                    $item = str_replace(array('"', "'", "."), "", $list[1][$j]);
                    $result[] = $item = preg_replace("/\s+/", "", $item);
                }
            }
            return $result; 
        } else {
            return explode("\n", File::get(storage_path() . "/static/words.txt"));
        }
    }

    // Assemble the base array of words to use.
    private function getBaseWords() {
        $base = self::getWordList();
        $base_length = count($base) - 1;
        $list = array();
        for ($i = 0; $i < (int) Request::input("quantity-words"); $i++) {
            $list[] = str_replace(array("\n", "\r"), "", $base[rand(0, $base_length)]);
        }
        return $list;
    }

    // Set the case of the words to all uppercase, all lowercase, or first letter capitalized.
    private function setWordCase($list) {
        for ($i = 0; $i < (int) Request::input("quantity-words"); $i++) {
            $item = $list[$i];
            if (Request::has("include-lowercase") && Request::input("include-lowercase") === "true") { $item = strtolower($item); }
            if (Request::has("include-uppercase") && Request::input("include-uppercase") === "true") { $item = strtoupper($item); }
            if (Request::has("include-capitalized") && Request::input("include-capitalized") === "true") { $item = ucfirst($item); }
            $list[$i] = $item;
        }
        return $list;
    }

    // Set the word spacer to hypens, underscores, or blank spaces.
    private function getWordSpacer() {
        if (Request::has("include-hyphens") && Request::input("include-hyphens") === "true") { return "-"; }
        if (Request::has("include-underscores") && Request::input("include-underscores") === "true") { return "_"; }
        if (Request::has("include-spaces") && Request::input("include-spaces") === "true") { return " "; }
        return "-";
    }

    // Helper function to insert a number or special character before, after or inside a word.
    private function insertIntoString($item, $insert) {
        $position = rand(0, 2);
        if ($position === 2) {
            $item = substr_replace($item, $insert, rand(0, strlen($item) - 1), 0);
        } elseif ($position === 1) {
            $item = $item . $insert;
        } else {
            $item = $insert . $item;
        }
        return $item;
    }

    // Add numbers to the password.
    private function addNumbers($list) {
        for ($i = 0; $i < (int) Request::input("quantity-numbers"); $i++) {
            $random_word = rand(0, Request::input("quantity-words") - 1);
            $item = $list[$random_word];
            $item = self::insertIntoString($item, rand(0, 9));
            $list[$random_word] = $item;
        }
        return $list;
    }

    // Add special characters to the password.
    private function addSpecial($list) {
        $specials = array(",", ".", "!", "@", "#", "$", "%", "~", "&", "(", ")", "?", "+", "=", "[", "]");
        for ($i = 0; $i < (int) Request::input("quantity-special"); $i++) {
            $random_word = rand(0, Request::input("quantity-words") - 1);
            $item = $list[$random_word];
            $item = self::insertIntoString($item, $specials[rand(0, 15)]);
            $list[$random_word] = $item;
        }
        return $list;
    }

    // After the words have been processed, assemble them into the password string.
    private function assemblePassword($list) {
        $length = (int) Request::input("quantity-words") - 1;
        $pw = "";
        $spacer = self::getWordSpacer();
        for ($i = 0; $i < $length; $i++) {
            $item = $list[$i];
            $pw = $pw . $item . $spacer;
        }
        $pw = $pw . $list[$length];
        return base64_encode($pw);
    }

    // Main function to create a password.
    public function getPassword() {
        $list = self::getBaseWords();
        $list = self::setWordCase($list);
        if (Request::has("include-numbers") && Request::input("include-numbers") === "true") { $list = self::addNumbers($list); }
        if (Request::has("include-special") && Request::input("include-special") === "true") { $list = self::addSpecial($list); }
        return Response::json(array("password" => self::assemblePassword($list)));
    }
}