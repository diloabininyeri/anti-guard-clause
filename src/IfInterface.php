<?php

namespace Zues\Less;

/**
 *
 */
interface IfInterface extends ElseInterface
{
    /**
     * @return bool
     */
    public function isTrue(): bool;
}
