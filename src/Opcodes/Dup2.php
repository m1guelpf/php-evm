<?php

namespace M1guelpf\EVM\Opcodes;

use M1guelpf\EVM\ExecutionContext;

class Dup2 extends BaseOpcode
{
    public function __construct()
    {
        parent::__construct(0x81, 'DUP2');
    }

    public function execute(ExecutionContext $context)
    {
        [$a, $b] = $context->stack->popN(2);

        $context->stack->push($b);
        $context->stack->push($a);
        $context->stack->push($b);
    }
}
