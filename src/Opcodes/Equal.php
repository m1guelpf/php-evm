<?php

namespace M1guelpf\EVM\Opcodes;

use M1guelpf\EVM\ExecutionContext;

class Equal extends BaseOpcode
{
    public function __construct()
    {
        parent::__construct(0x14, 'EQ');
    }

    public function execute(ExecutionContext $context)
    {
        $context->stack->push($context->stack->pop() === $context->stack->pop() ? 1 : 0);
    }
}
