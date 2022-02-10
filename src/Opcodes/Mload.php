<?php

namespace M1guelpf\EVM\Opcodes;

use M1guelpf\EVM\ExecutionContext;

class Mload extends BaseOpcode
{
    public function __construct()
    {
        parent::__construct(0x51, 'MLOAD');
    }

    public function execute(ExecutionContext $context)
    {
        $context->stack->push($context->memory->get($context->stack->pop()));
    }
}
