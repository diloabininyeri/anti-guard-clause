<?php

namespace Zues\Less;

/**
 *
 */
readonly class BooleanAdapter implements CheckInterface
{

    /**
     * @param bool $check
     */
    public function __construct(private bool $check)
    {
    }

    /**
     * @return bool
     */
    public function isTrue(): bool
    {
        return $this->check;
    }
}