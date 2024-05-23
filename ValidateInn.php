<?php

class ValidateInn {

	private ValidateInnCaseContract $validateCase;
    private string $inn;

	public function __constructor(ValidateInnCaseContract $validateCase, $inn): void
    {
        $this->validateCase = $validateCase;
        $this->inn = $inn;
    }

	public function validate():bool
    {
        $controlSum = $this->getControlSum();
        return $this->validateCase->validate($controlSum);
    }

    private function getControlSum(): int
    {
        $innArray = explode($this->inn, '');
        $controlSum = 0;
        foreach ($innArray as $key => $number) {
            if ($this->validateCase->getWeights()[$key]) {
                $controlSum += $number * (int) $this->validateCase->getWeights()[$key];
            }
        }
        return $controlSum;
    }
}