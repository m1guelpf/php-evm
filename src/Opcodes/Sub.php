<?php

namespace M1guelpf\EVM\Opcodes;

use M1guelpf\EVM\ExecutionContext;

class Sub extends BaseOpcode
{
    public function __construct()
    {
        parent::__construct(0x03, 'SUB');
    }

    public function execute(ExecutionContext $context)
    {
        $context->stack->push(
            $context->stack->pop() - $context->stack->pop()
        );
    }
}
