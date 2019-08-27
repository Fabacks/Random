<?php
/** 
* Classe Random
* @descrition Génération aléatoire de : character, alphanumeric, numbers, letters, specials
* @author Fabien COLAS Alias Fabacks
* @site  dahoo.Fr
* @gith https://github.com/Fabacks
* @Copyright Licence CC-by-nc-sa 
* @date : 27/08/2019
* @version 1.6.0
*/ 
namespace Fabacks;
class Random {
    const LOWER = 1;
    const UPPER = 2;
    const MIXTE = 3;

    const LETTER = 1; //Retourne une lettre de l'alphabet de A à Z
    const NUMBER = 2; //Retourne un chiffre de 0 à 9
    const ALPHANUMERIC = 3; //Retourne une lettre de l'alphabet de A à Z OU un chiffre de 0 à 9
    const SPECIAL = 4; //Retourne un caractere spéciaux
    const CHARACTER = 5; //Retourne une lettre, ou un nombre, ou caractere spéciaux
    
    /**
     * Generation d'une chaine de charactere aléatoire
     *
     * @param int type de generation
     * @param int longuer de la chaine
     * @param int type 
     * @return void
     */
    public static function generate($length = 8, $type = self::CHARACTER, $case = self::MIXTE) {
        if( empty($length) || empty($type) ) return "";

        $startArrayRandom = 1;
        $endArrayRandom = 45;
        $value = "";
        
        switch ($type) {
            case self::LETTER :
                $startArrayRandom = 1;
                $endArrayRandom = 26;
            break;   
            case self::NUMBER :
                $startArrayRandom = 27;
                $endArrayRandom = 36;
            break;   
            case self::ALPHANUMERIC :
                $startArrayRandom = 1;
                $endArrayRandom = 36;
            break;   
            case self::SPECIAL :
                $startArrayRandom = 37;
                $endArrayRandom = 45;
            break;   
            case self::CHARACTER :
                $startArrayRandom = 1;
                $endArrayRandom = 45;
            break;            
        }    

        for($i=1; $i<=$length; $i++) :
            mt_srand((double)microtime() * 1000000);
            $num = mt_rand($startArrayRandom, $endArrayRandom);
            $char = self::assign_rand_value($num);
            $value .= self::case_upper_lower($char, $case);
        endfor;

        return $value;
    }

    /**
     * Generation d'un token
     *
     * @param int longuer de la chaine
     * @return string
     */
    public static function generateToken($pLength = 8) {
        if( empty($pLength) || $pLength < 2 ) return "";

        $length = (int)($pLength / 2);
        return bin2hex(random_bytes($length));
    }

    /**
     * Generation d'un GUID au format FB6BD791-F5B1-4D2F-9E78-32A205A5703D
     *
     * @param boolean $upperCase
     * @param boolean $withSeparator
     * @return guid
     */
    public static function generateGuid(bool $upperCase = true, bool $withSeparator = true) {
        $guid = sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
    
            // 32 bits for "time_low"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
    
           // 16 bits for "time_mid"
            mt_rand(0, 0xffff),
    
            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,
    
            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,
    
            // 48 bits for "node"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );

        $guid = $withSeparator ? $guid : str_replace('-', '', $guid); 
        return $upperCase ? strtoupper($guid) : $guid;
    }
    
    
    /**
     * Determine si l'on doit etre en minuscule, majuscule, ou mixte
     *
     * @param char $char
     * @param int  $case
     * @return string
     */
    private static function case_upper_lower($char, $case) { 
		switch($case) :
			case "1"  :
                return strtolower($char); 
            break;            
            case "2"  :
                return strtoupper($char); 
            break;            
            case "3"  :
            	mt_srand((double)microtime() * 1000000);
                return self::case_upper_lower($char, mt_rand(1,2) ); 
            break;
		endswitch;
    }

    /**
     * Retourne une valeur en fonction du nombre passer en parametre
     *
     * @param int $num
     * @return string charactere
     */
    private static function assign_rand_value($num) {
        $rand_value = "";
        switch($num) :
            case "1"  : $rand_value = "a"; break;
            case "2"  : $rand_value = "b"; break;
            case "3"  : $rand_value = "c"; break;
            case "4"  : $rand_value = "d"; break;
            case "5"  : $rand_value = "e"; break;
            case "6"  : $rand_value = "f"; break;
            case "7"  : $rand_value = "g"; break;
            case "8"  : $rand_value = "h"; break;
            case "9"  : $rand_value = "i"; break;
            case "10" : $rand_value = "j"; break;
            case "11" : $rand_value = "k"; break;
            case "12" : $rand_value = "l"; break;
            case "13" : $rand_value = "m"; break;
            case "14" : $rand_value = "n"; break;
            case "15" : $rand_value = "o"; break;
            case "16" : $rand_value = "p"; break;
            case "17" : $rand_value = "q"; break;
            case "18" : $rand_value = "r"; break;
            case "19" : $rand_value = "s"; break;
            case "20" : $rand_value = "t"; break;
            case "21" : $rand_value = "u"; break;
            case "22" : $rand_value = "v"; break;
            case "23" : $rand_value = "w"; break;
            case "24" : $rand_value = "x"; break;
            case "25" : $rand_value = "y"; break;
            case "26" : $rand_value = "z"; break;
            case "27" : $rand_value = "0"; break;
            case "28" : $rand_value = "1"; break;
            case "29" : $rand_value = "2"; break;
            case "30" : $rand_value = "3"; break;
            case "31" : $rand_value = "4"; break;
            case "32" : $rand_value = "5"; break;
            case "33" : $rand_value = "6"; break;
            case "34" : $rand_value = "7"; break;
            case "35" : $rand_value = "8"; break;
            case "36" : $rand_value = "9"; break;
            case "37" : $rand_value = "*"; break;
            case "38" : $rand_value = "/"; break;
            case "39" : $rand_value = "!"; break;
            case "40" : $rand_value = "@"; break;
            case "41" : $rand_value = "#"; break;
            case "42" : $rand_value = "§"; break;
            case "43" : $rand_value = "%"; break;
            case "44" : $rand_value = "&"; break;
            case "45" : $rand_value = "-"; break;
        endswitch;
        return $rand_value;
    }
}