<?php

namespace M1guelpf\EVM;

class Memory
{
    protected array $value = [];

    public function set(int $word, int $value): void
    {
        $this->value[$word] = $value;
    }

    public function get(int $word): int
    {
        if ($word >= count($this->value)) {
            return 0;
        }

        return $this->value[$word];
    }

    public function multi_get(int $word, int $length): string
    {
        return rtrim(implode('', array_map(fn (int $word) => dechex($this->get($word)), range($word, $word + $length))), '0');
    }
}
