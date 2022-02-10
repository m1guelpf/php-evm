<?php

namespace M1guelpf\EVM;

use Closure;
use M1guelpf\EVM\Opcodes\Parser;

class EVM
{
    protected Parser $opcodes;

    public function __construct()
    {
        $this->opcodes = new Parser();
    }

    public function execute(string $code): string
    {
        $context = new ExecutionContext($code, new TransactionContext());

        while (! $context->stopped) {
            $instruction = $this->opcodes->decode($context);
            d("DEBUG: position => {$context->pc}: {$instruction->name}");

            $instruction->execute($context);

            d($context->stack, $context->memory);
        }

        d("Output: 0x{$context->returnData}");

        return $context->returnData;
    }
}
