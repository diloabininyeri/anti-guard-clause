<?php

namespace Zues\Less;

use Closure;

class IfNested implements IfInterface
{
    private Closure $resultClosure;

    public function __construct(private readonly CheckInterface $check, private readonly Condition $condition)
    {
    }

    /**
     * @return mixed
     */
    public function make(): mixed
    {
        return call_user_func($this->resultClosure);
    }

    private function setResult(mixed $result): void
    {
        $this->resultClosure = static fn() => $result;
    }


    /**
     * @return bool
     */
    private function getReturnElse(): bool
    {
        if (null !== $this->condition->getLessElse()) {
            $this->setResult(
                $this->condition->getLessElse()->make()
            );
            return true;
        }
        return false;
    }

    /**
     * @return bool
     */
    public function isTrue(): bool
    {
        if (!$this->check->isTrue()) {
            return false;
        }
        foreach ($this->condition->getIfConditions() as $condition) {
            if ($condition->isTrue()) {
                $this->setResult($condition->make());
                return true;
            }
        }
        return $this->getReturnElse();
    }
}
