<?php

namespace Zues\Less;

use Closure;

/**
 *
 */
class Condition
{
    /**
     * @var array<IfInterface> $ifConditions
     */
    private array $ifConditions = [];
    /**
     * @var ElseInterface|null $elseConditions
     */
    private ?ElseInterface $lessElse = null;

    /**
     * @param IfInterface $lessIf
     * @return $this
     */
    public function if(IfInterface $lessIf): self
    {
        $this->ifConditions[] = $lessIf;
        return $this;
    }

    /**
     * @param ElseInterface $lessElse
     * @return $this
     */
    public function else(ElseInterface $lessElse): self
    {
        $this->lessElse = $lessElse;
        return $this;
    }

    /**
     * @param IfInterface $lessIf
     * @return $this
     */
    public function ifNot(IfInterface $lessIf): self
    {
        $this->ifConditions[] = new IfNotCondition($lessIf);
        return $this;
    }

    /**
     * @param IfInterface $if
     * @param callable(Condition $condtion):void $closure
     * @return $this
     */
    public function ifNested(IfInterface $if, callable $closure): self
    {

        $closure($self = new self());
        $this->ifConditions[] = new IfNested($if, $self);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMake(): mixed
    {
        foreach ($this->ifConditions as $ifCondition) {
            if ($ifCondition->isTrue()) {
                return $ifCondition->make();
            }
        }

        return $this->lessElse?->make();
    }

    /**
     * @return array
     */
    public function getIfConditions(): array
    {
        return $this->ifConditions;
    }

    /**
     * @return ElseInterface|null
     */
    public function getLessElse(): ?ElseInterface
    {
        return $this->lessElse;
    }
}