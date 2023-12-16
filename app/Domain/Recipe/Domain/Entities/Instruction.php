<?php

namespace App\Domain\Recipe\Domain\Entities;

class Instruction
{
    public function __construct(
        private int $step,
        private string $instruction
    )
    {
    }

    /**
     * @return int
     */
    public function getStep(): int
    {
        return $this->step;
    }

    /**
     * @param int $step
     * @return Instruction
     */
    public function setStep(int $step): Instruction
    {
        $this->step = $step;
        return $this;
    }

    /**
     * @return string
     */
    public function getInstruction(): string
    {
        return $this->instruction;
    }

    /**
     * @param string $instruction
     * @return Instruction
     */
    public function setInstruction(string $instruction): Instruction
    {
        $this->instruction = $instruction;
        return $this;
    }
}
