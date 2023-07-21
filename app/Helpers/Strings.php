<?php
namespace App\Helpers;

class Strings {

    public static function removeFirstWord($word)
    {

        $wordclear = explode(" ", preg_replace('/[^a-zA-Z\s]+/', "", trim(strtolower($word))));
        array_shift($wordclear);
        $newword = implode(" ", $wordclear);

        return $newword;
    }

}
