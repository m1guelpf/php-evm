<?php

namespace M1guelpf\EVM\Opcodes;

use M1guelpf\EVM\ExecutionContext;
use RuntimeException;

class CallDataLoad extends BaseOpcode
{
    public function __construct()
    {
        parent::__construct(0x35, 'CALLDATALOAD');
    }

    public function execute(ExecutionContext $context)
    {
        $pos = $context->stack->pop();

        if ($pos > strlen($context->tx->data)) {
            return $context->stack->push(0);
        }

        throw new RuntimeException("Loading calldata not yet implemented");
    }
}
