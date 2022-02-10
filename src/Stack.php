<?php

namespace M1guelpf\EVM;

use Illuminate\Support\Collection;
use RuntimeException;

class Stack
{
    protected array $value = [];

    public function push(int $item) : void
    {
        if ($item < 0 || $item > 2 ** 256 - 1) {
            throw new RuntimeException("Invalid stack push");
        }

        array_push($this->value, $item);
    }

    public function pop() : int
    {
        return array_pop($this->value);
    }

    public function popN(int $lenght) : array
    {
        return Collection::times($lenght, fn () => array_pop($this->value))->toArray();
    }
}
