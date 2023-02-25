<?php

namespace classes;

use Zues\Less\IfInterface;

readonly class Man implements IfInterface
{


    public function __construct(private string $gender)
    {
    }

    /**
     * @return mixed
     */
    public function make(): string
    {
        return 'gender must be a man';
    }

    /**
     * @return bool
     */
    public function isTrue(): bool
    {
        return $this->gender === 'man';
    }
}