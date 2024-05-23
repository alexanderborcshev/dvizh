<?php

class ValidateInnCaseTen implements ValidateInnCaseContract
{
    private array $weights;
    public function __construct(
        public string $inn
    ) {
        $this->weights = [2, 4, 10, 3, 5, 9, 4, 6, 8];
    }

    public function validate(int $sum): bool
    {
        if (strlen($this->inn)) {
            return false;
        }

        $innLastSymbol = (int)$this->inn[9];

        $kNumber = $sum % 11;
        if ($kNumber > 9) {
            $kNumber = $sum % 10;
        }
        return $kNumber == $innLastSymbol;
    }

    public function getWeights(): array
    {
        return $this->weights;
    }
}