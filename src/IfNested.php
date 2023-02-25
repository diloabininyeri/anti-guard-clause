<?php

namespace Zues\Less;

use Closure;

class IfNested implements IfInterface
{
    private mixed $result;

    public function __construct(private readonly IfInterface $if, private readonly Condition $condition)
    {
    }

    /**
     * @return mixed
     */
    public function make(): mixed
    {
        return $this->result;
    }

    /**
     * @return bool
     */
    public function isTrue(): bool
    {
        if (!$this->if->isTrue()) {
            return false;
        }
        foreach ($this->condition->getIfConditions() as $condition) {
            if ($condition->isTrue()) {
                $this->result = $condition->make();
                return true;
            }
        }
        return $this->getReturnElse();
    }

    /**
     * @return bool
     */
    public function getReturnElse(): bool
    {
        if (null !== $this->condition->getLessElse()) {
            $this->result = $this->condition->getLessElse()->make();
            return true;
        }
        return false;
    }
}