<?php

namespace Zues\Less;

/**
 * @internal
 */
readonly class IfNotCondition implements IfInterface
{
    /**
     * @param IfInterface $lessIf
     */
    public function __construct(private IfInterface $lessIf)
    {
    }

    /**
     * @return mixed
     */
    public function make(): mixed
    {
        return $this->lessIf->make();
    }

    /**
     * @return bool
     */
    public function isTrue(): bool
    {
        return !$this->lessIf->isTrue();
    }
}