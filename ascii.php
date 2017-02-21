#!/usr/bin/php -q
<?php

require 'Matrice.php';

Class convertStringToAscii
{
    public $arrayOfString =[];


    function __construct()
    {
        global $argv;
        if(isset($argv[1]) && strlen($argv[1]) && preg_match('/^[A-Z0-9 .\-]+$/i', $argv[1])) {
            $this->arrayOfString = str_split($argv[1]);
        }else {
            echo 'Please Specify a String';
            exit(1);
        }
    }

    public function transformletterToMAtrice() {

        $displaystring = [];
        $matrice = new Matrice();

        for($i = 0 ;$i < count($this->arrayOfString);$i++) {
            $current_letter = $this->arrayOfString[$i];
            $matricelet = $matrice->matrice_letters[$current_letter];
            foreach ($matricelet as $key => $line) {
                if(isset($displaystring[$key])){
                    $displaystring[$key] = array_merge($displaystring[$key],$line);
                }else {
                    $displaystring[$key] = $line;
                }

            }
        }

        return $displaystring;
    }

    public function display() {
        $transform_string = $this->transformletterToMAtrice();
        foreach ($transform_string as $keyline => $line) {
            foreach ($line as $keuColumn => $column) {
                if($column == 1){
                    echo '#';
                }else {
                    echo ' ';
                }
            }
            echo "\n";
        }
    }
}

$conv = new convertStringToAscii();
$conv->display();