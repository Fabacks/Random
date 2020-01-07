<?php

use Fabacks\Random;

class RandomTest extends \PHPUnit\Framework\TestCase {
    
    public function test_generateLetter()
    {
        $rand = Random::generate(15, Random::TYPE_LETTER, Random::CASE_LOWER);
        $this->assertEquals( strlen($rand), 15);
        $this->assertTrue( ctype_alpha($rand) );
        $this->assertTrue( ctype_lower($rand) );


        $rand = Random::generate(10, Random::TYPE_LETTER, Random::CASE_UPPER);
        $this->assertEquals( strlen($rand), 10);
        $this->assertTrue( ctype_alpha($rand) );
        $this->assertTrue( ctype_upper($rand) );
    }

    public function test_generateNumber()
    {
        $rand = Random::generate(8, Random::TYPE_NUMBER, Random::CASE_LOWER);
        $this->assertEquals( strlen($rand), 8);
        $this->assertTrue( ctype_digit ($rand) );
    }

    public function test_generate()
    {
        $rand = Random::generate(8);
        $this->assertEquals(strlen($rand), 8);
    }

    public function test_generateToken()
    {
        $token = Random::generateToken(8);
        $this->assertEquals( strlen($token), 8);
    }

    public function test_generateGuid()
    {
        $guid = Random::generateGuid();
        $this->assertEquals(strlen($guid), 36);

        $guid = Random::generateGuid(true, false);
        $this->assertEquals(strlen($guid), (36 -4) );
    }
    
}