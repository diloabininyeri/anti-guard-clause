<?php

namespace Zues\Less;

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
    private  ?ElseInterface $lessElse=null;

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
}