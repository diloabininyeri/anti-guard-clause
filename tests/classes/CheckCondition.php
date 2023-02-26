<?php

namespace classes;

use Zues\Less\CheckInterface;

class CheckCondition implements CheckInterface
{

    /**
     * @return bool
     */
    public function isTrue(): bool
    {
        return true;
    }
}