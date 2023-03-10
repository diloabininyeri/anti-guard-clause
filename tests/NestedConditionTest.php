<?php


use classes\Age;
use classes\Man;
use classes\CheckCondition;
use classes\NestedIfTest;
use classes\Woman;
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
            ->ifNested(new CheckCondition(), new NestedIfTest())
            ->ifNot(new Woman('woman'));

        $this->assertEquals('gender must be a man', $condition->getMake());

    }

    /**
     * @test
     * @return void
     */
    public function nestedWithBool(): void
    {
        $condition = new Condition();
        $condition
            ->if(new Age(17))
            ->ifNested(true, new NestedIfTest())
            ->ifNot(new Woman('woman'));

        $this->assertEquals('gender must be a man', $condition->getMake());

    }
}
