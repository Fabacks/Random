<?php

use Fabacks\Random;

class RandomTest extends \PHPUnit\Framework\TestCase {
    
    public function test_generate()
    {
        $try = 200;
        for($i = 0; $i <= $try; $i++ ): 
            $long = rand(5, 20);
            $rand = Random::generate($long);
            $this->assertEquals(strlen($rand), $long);
        endfor;
    }

    public function test_generateLetter()
    {
        $try = 200;
        for($i = 0; $i <= $try; $i++ ):
            $long = 9;

            $rand = Random::generate($long, Random::TYPE_LETTER, Random::CASE_LOWER);
            $this->assertEquals( strlen($rand), $long);
            $this->assertTrue( ctype_alpha($rand) );
            $this->assertTrue( ctype_lower($rand) );

            $rand = Random::generate($long, Random::TYPE_LETTER, Random::CASE_UPPER);
            $this->assertEquals( strlen($rand), $long);
            $this->assertTrue( ctype_alpha($rand) );
            $this->assertTrue( ctype_upper($rand) );
        endfor;
    }

    public function test_generateNumber()
    {
        $try = 200;
        for($i = 0; $i <= $try; $i++ ):
            $long = 9;

            $rand = Random::generate($long, Random::TYPE_NUMBER, Random::CASE_LOWER);
            $this->assertEquals( strlen($rand), $long);
            $this->assertTrue( ctype_digit ($rand) );
        endfor;
    }

    public function test_generateToken()
    {
        $long = 7;

        $token = Random::generateToken($long);
        $this->assertEquals( strlen($token), $long);
    }

    public function test_generatePassword()
    {
        $long = 11;

        $token = Random::generatePassword($long);
        $this->assertEquals( strlen($token), $long);
    }

    public function test_generateGuid()
    {
        $guid = Random::generateGuid();
        $this->assertEquals(strlen($guid), 36);

        $guid = Random::generateGuid(true, false);
        $this->assertEquals(strlen($guid), (36 -4) );
    }
    
}