<?php
namespace App\Helpers;

class Strings {

    public static function removeFirstWord($word, $count=0)
    {

        $wordclear = explode(" ", preg_replace('/[^a-zA-Z\s]+/', "", trim(strtolower($word))));
        for ($i=1; $i < $count; $i++) {
            array_shift($wordclear);
        }
        if (!in_array("kota", $wordclear)) {
            array_shift($wordclear);
        }
        $newword = implode(" ", $wordclear);

        return $newword;
    }

    public static function getFileName($path)
    {
        $fullName = basename($path);
        $parts = explode('~', $fullName);
        return end($parts);
    }

}
