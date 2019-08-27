<?php

// require __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."phpunit.autoload.php";
require __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."vendor".DIRECTORY_SEPARATOR."autoload.php";
use Fabacks\Random;

$string = Random::generate(8);
echo "Random string : ".$string;
echo "<br /><br />";

$string = Random::generateToken(8);
echo "Random token : ".$string;
echo "<br /><br />";

$string = Random::generateGuid(8);
echo "Random guid : ".$string;
echo "<br /><br />";