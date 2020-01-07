<?php

// require __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."phpunit.autoload.php";
require __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."vendor".DIRECTORY_SEPARATOR."autoload.php";
use Fabacks\Random;

$string = Random::generate(8, Random::TYPE_ALPHANUMERIC, Random::CASE_LOWER);
echo "Random string : ".$string;
echo "<br /><br />";

$string = Random::generatePassword(15);
echo "Random password : ".$string;
echo "<br /><br />";

$string = Random::generateToken(10);
echo "Random token : ".$string;
echo "<br /><br />";

$string = Random::generateGuid();
echo "Random guid : ".$string;
echo "<br /><br />";