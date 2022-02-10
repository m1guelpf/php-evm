<?php

namespace M1guelpf\EVM\Opcodes;

use M1guelpf\EVM\ExecutionContext;

class Swap1 extends BaseOpcode
{
    public function __construct()
    {
        parent::__construct(0x90, 'SWAP1');
    }

    public function execute(ExecutionContext $context)
    {
        [$a, $b] = $context->stack->popN(2);

        $context->stack->push($a);
        $context->stack->push($b);
    }
}
