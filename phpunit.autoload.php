<?php

$files = array("Random.php");

foreach($files as $file): 
    require_once __DIR__.DIRECTORY_SEPARATOR."src".DIRECTORY_SEPARATOR.$file;
endforeach;