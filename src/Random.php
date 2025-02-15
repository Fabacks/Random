<?php
/** 
* Classe Random
* @description Génération aléatoire de : character, alphanumeric, numbers, letters, specials
* @author Fabien COLAS Alias Fabacks
* @site  dahoo.Fr
* @gith https://github.com/Fabacks
* @Copyright Licence CC-by-nc-sa 
* @date : 12/01/2025
* @version 2.0.0
*/ 
namespace Fabacks;
class Random 
{
    const CASE_LOWER = 1;
    const CASE_UPPER = 2;
    const CASE_MIXTE = 3;

    const TYPE_LETTER = 1;          // Retourne une lettre de l'alphabet de A à Z
    const TYPE_NUMBER = 2;          // Retourne un chiffre de 0 à 9
    const TYPE_ALPHANUMERIC = 3;    // Retourne une lettre de l'alphabet de A à Z OU un chiffre de 0 à 9
    const TYPE_SPECIAL = 4;         // Retourne un caractère spéciaux
    const TYPE_CHARACTER = 5;       // Retourne une lettre, ou un nombre, ou caractère spéciaux
    
    /**
     * Génération d'une chaine de caractère aléatoire
     *
     * @param int $length Nombre de caractère
     * @param int $type Type de génération
     * @param int $case CamelCase du caractère 
     * @return void
     */
    public static function generate($length = 8, $type = self::TYPE_CHARACTER, $case = self::CASE_MIXTE) 
    {
        if( empty($length) || empty($type) )
            return "";

        $startArrayRandom = 0;
        $endArrayRandom = 44;
        $value = "";

        switch( $type ):
            case self::TYPE_LETTER :
                $startArrayRandom = 0;
                $endArrayRandom = 25;
            break;   
            case self::TYPE_NUMBER :
                $startArrayRandom = 26;
                $endArrayRandom = 35;
            break;   
            case self::TYPE_ALPHANUMERIC :
                $startArrayRandom = 0;
                $endArrayRandom = 35;
            break;   
            case self::TYPE_SPECIAL :
                $startArrayRandom = 36;
                $endArrayRandom = 44;
            break;   
            case self::TYPE_CHARACTER :
                $startArrayRandom = 0;
                $endArrayRandom = 44;
            break;            
        endswitch;

        for( $i=1; $i<=$length; $i++ ):
            mt_srand((double)microtime() * 1000000);
            $num    = mt_rand($startArrayRandom, $endArrayRandom);
            $char   = self::assign_rand_value($num);

            // Si $num < 26 Ce n'est pas une lettre donc le CAMEL_CASE n'est pas applicable
            $value .= $num < 26 ? self::case_upper_lower($char, $case) : $char;
        endfor;

        return $value;
    }

    /**
     * Génération d'un token
     *
     * @param int longueur de la chaine
     * @return string
     */
    public static function generateToken($pLength = 8)
    {
        if( empty($pLength) || $pLength < 2 ) 
            return "";

        return self::generate($pLength, self::TYPE_ALPHANUMERIC, self::CASE_LOWER);
    }


    /**
     * Génération d'un password
     *
     * @param int longueur de la chaine
     * @return string
     */
    public static function generatePassword(int $pLength = 8)
    {
        return self::generate($pLength, self::TYPE_CHARACTER, self::CASE_MIXTE);
    }

    /**
     * Génération d'un GUID au format FB6BD791-F5B1-4D2F-9E78-32A205A5703D
     *
     * @param boolean $upperCase
     * @param boolean $withSeparator
     * @return guid
     */
    public static function generateGuid(bool $upperCase = true, bool $withSeparator = true)
    {
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
     * Détermine si l'on doit être en minuscule, majuscule, ou mixte
     *
     * @param string $char
     * @param int  $case
     * @return string
     */
    private static function case_upper_lower($char, $case)
    { 
        switch( $case ):
			case self::CASE_LOWER :
                return strtolower($char); 
            break;            
            case self::CASE_UPPER :
                return strtoupper($char); 
            break;            
            case self::CASE_MIXTE :
            	mt_srand((double)microtime() * 1000000);
                return self::case_upper_lower($char, mt_rand(1,2) ); 
            break;
		endswitch;
    }

    /**
     * Retourne une valeur en fonction du nombre passer en paramètre
     *
     * @param int $pNum
     * @return string Caractère dans la liste 
     */
    private static function assign_rand_value(int $pNum) 
    {
        // 26 lettre
        // 10 chiffre
        // 10 caractère spéciaux
        $list = array(
            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
            '0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
            '*', '/', '!', '@', '#', '~', '%', '&', '-', '_'
        );

        return $list[$pNum];
    }
}