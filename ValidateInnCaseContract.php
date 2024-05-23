<?php

interface ValidateInnCaseContract
{
    public function validate(int $sum): bool;
    public function getWeights(): array;
}