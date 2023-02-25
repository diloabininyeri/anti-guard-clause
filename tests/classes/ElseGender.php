<?php

namespace classes;

use Zues\Less\ElseInterface;

readonly class ElseGender implements ElseInterface
{

    /**
     * @return mixed
     */
    public function make(): string
    {
        return 'else condition';
    }
}