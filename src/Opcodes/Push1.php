<?php

namespace M1guelpf\EVM\Opcodes;

use M1guelpf\EVM\ExecutionContext;

class Push1 extends BaseOpcode
{
    public function __construct()
    {
        parent::__construct(0x60, 'PUSH1');
    }

    public function execute(ExecutionContext $context)
    {
        $context->stack->push($context->getCode(1));
    }
}
