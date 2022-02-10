<?php

namespace M1guelpf\EVM\Opcodes;

use M1guelpf\EVM\ExecutionContext;

class CallValue extends BaseOpcode
{
    public function __construct()
    {
        parent::__construct(0x34, 'CALLVALUE');
    }

    public function execute(ExecutionContext $context)
    {
        $context->stack->push($context->tx->value);
    }
}
