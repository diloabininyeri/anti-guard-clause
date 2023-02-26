<?php

namespace classes;

use Zues\Less\Condition;

class NestedIfTest
{


    public function __invoke(Condition $condition): void
    {
        $condition
            ->if(new Woman('man'))
            ->ifNot(new Man('woman'));
    }
}