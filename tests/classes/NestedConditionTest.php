<?php

namespace classes;

use PHPUnit\Framework\TestCase;
use Zues\Less\Condition;

class NestedConditionTest extends TestCase
{


    /**
     * @test
     * @return void
     */
    public function nested(): void
    {
        $condition = new Condition();
        $condition
            ->if(new Age(17))
            ->ifNested(new Man('man'), new NestedIfTest())
            ->ifNot(new Woman('woman'));

        echo $condition->getMake();

        $this->assertEquals('gender must be a man', $condition->getMake());

    }
}