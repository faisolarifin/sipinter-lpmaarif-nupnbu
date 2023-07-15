<?php
namespace App\Helpers;

class Strings {

    public static function removeFirstWord($word)
    {

        $wordclear = explode(" ", trim(strtolower($word)));
        array_shift($wordclear);
        $newword = implode(" ", $wordclear);

        return $newword;
    }

}
