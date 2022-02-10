<?php

namespace M1guelpf\EVM\Opcodes;

use M1guelpf\EVM\ExecutionContext;

class ReturnOp extends BaseOpcode
{
    public function __construct()
    {
        parent::__construct(0xf3, 'RETURN');
    }

    public function execute(ExecutionContext $context)
    {
        $context->stopped = true;
        $context->returnData = $context->memory->multi_get($context->stack->pop(), $context->stack->pop());
    }
}
