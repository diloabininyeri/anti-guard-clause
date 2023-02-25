<?php

namespace classes;

use Zues\Less\IfInterface;

readonly class Woman implements IfInterface
{
    public function __construct(private string $gender)
    {
    }

    /**
     * @return mixed
     */
    public function make(): string
    {
        return 'gender must be woman';
    }

    /**
     * @return bool
     */
    public function isTrue(): bool
    {
        return 'woman' === $this->gender;
    }
}