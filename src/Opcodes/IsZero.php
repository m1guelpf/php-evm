<?php

namespace M1guelpf\EVM\Opcodes;

use M1guelpf\EVM\ExecutionContext;

class IsZero extends BaseOpcode
{
    public function __construct()
    {
        parent::__construct(0x15, 'ISZERO');
    }

    public function execute(ExecutionContext $context)
    {
        $context->stack->push($context->stack->pop() === 0 ? 1 : 0);
    }
}
