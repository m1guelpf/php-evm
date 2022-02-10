<?php

namespace M1guelpf\EVM\Opcodes;

use M1guelpf\EVM\ExecutionContext;

class CallDataSize extends BaseOpcode
{
    public function __construct()
    {
        parent::__construct(0x36, 'CALLDATASIZE');
    }

    public function execute(ExecutionContext $context)
    {
        $context->stack->push(strlen($context->tx->data));
    }
}
