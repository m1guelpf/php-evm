<?php

namespace M1guelpf\EVM\Opcodes;

use M1guelpf\EVM\ExecutionContext;

class Mstore8 extends BaseOpcode
{
    public function __construct()
    {
        parent::__construct(0x53, 'MSTORE8');
    }

    public function execute(ExecutionContext $context)
    {
        $context->memory->set($context->stack->pop(), $context->stack->pop());
    }
}
