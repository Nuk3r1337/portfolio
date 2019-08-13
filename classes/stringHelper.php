<?php

class StringHelper
{
    /**
     * stringShortener() is a method for shortning strings and adding an ending
     * @param $string
     * @param $length
     * @param string $textEnding
     * @return bool|string
     */
    public static function stringShortener($string, $length, $textEnding = "..."){

        // substr to get the desired length of the string
        $shortenString = substr($string, 0, $length);

        // if string > length append textEnding
        if (strlen($string) > $length){

            $shortenString .= $textEnding;
        }

        // return the string
        return $shortenString;
    }
}