<?php

namespace M1guelpf\EVM;

use RuntimeException;

class ExecutionContext
{
    public int $pc = 0;
    public array $code;
    public Stack $stack;
    public Memory $memory;
    public string $returnData;
    public bool $stopped = false;
    public TransactionContext $tx;

    public function __construct(string $code, TransactionContext $tx)
    {
        $this->tx = $tx;
        $this->code = array_map('hexdec', str_split($code, 2));
        $this->stack = new Stack();
        $this->memory = new Memory();
    }

    public function getCode(int $steps): int
    {
        if ($steps != 1) {
            throw new RuntimeException("Reading code in more than 1 byte increments not implemented yet.");
        }

        return tap(
            array_slice($this->code, $this->pc, $steps)[0],
            fn () => $this->pc += $steps
        );
    }
}
