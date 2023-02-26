<?php

use classes\Age;
use classes\ElseGender;
use classes\Man;
use PHPUnit\Framework\TestCase;
use Zues\Less\Condition;

class LessConditionTest extends TestCase
{


    public function testLess(): void
    {

        $gender = 'man';
        $age = 16;

        $condition = new Condition();
        $condition
            ->if(new Age($age))
            ->ifNot(new Man($gender))
            ->else(new ElseGender());

        $this->assertEquals('else condition', $condition->getMake());
    }
}