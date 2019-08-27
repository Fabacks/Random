<?php

use Fabacks\Random;


class RandomTest extends \PHPUnit\Framework\TestCase {
    
    public function test_generate() {
        $guid = Random::generate(8);
        $this->assertEquals(strlen($guid), 8);
    }

    public function test_generateToken() {
        $guid = Random::generateToken(8);
        $this->assertEquals(strlen($guid), 8);
    }

    public function test_generateGuid() {
        $guid = Random::generateGuid();
        $this->assertEquals(strlen($guid), 36);

        $guid = Random::generateGuid(true, false);
        $this->assertEquals(strlen($guid), (36 -4) );
    }
    
}