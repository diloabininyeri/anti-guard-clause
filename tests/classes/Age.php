<?php

namespace classes;

use Zues\Less\IfInterface;

readonly class Age implements IfInterface
{

    public function __construct(private int $age)
    {
    }

    /**
     * @return mixed
     */
    public function make(): mixed
    {
        return 'age must be greater than 18';
    }

    /**
     * @return bool
     */
    public function isTrue(): bool
    {
        return  18<=$this->age;
    }
}