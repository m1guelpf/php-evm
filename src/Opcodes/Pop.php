<?php

namespace M1guelpf\EVM\Opcodes;

use M1guelpf\EVM\ExecutionContext;

class Pop extends BaseOpcode
{
    public function __construct()
    {
        parent::__construct(0x50, 'POP');
    }

    public function execute(ExecutionContext $context)
    {
        $context->stack->pop();
    }
}
