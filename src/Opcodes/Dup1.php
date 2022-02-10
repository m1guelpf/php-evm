<?php

namespace M1guelpf\EVM\Opcodes;

use M1guelpf\EVM\ExecutionContext;

class Dup1 extends BaseOpcode
{
    public function __construct()
    {
        parent::__construct(0x80, 'DUP1');
    }

    public function execute(ExecutionContext $context)
    {
        $a = $context->stack->pop();

        $context->stack->push($a);
        $context->stack->push($a);
    }
}
