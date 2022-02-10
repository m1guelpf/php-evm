<?php

namespace M1guelpf\EVM\Opcodes;

use M1guelpf\EVM\ExecutionContext;

class Dup3 extends BaseOpcode
{
    public function __construct()
    {
        parent::__construct(0x80, 'DUP1');
    }

    public function execute(ExecutionContext $context)
    {
        [$a, $b, $c] = $context->stack->popN(3);

        $context->stack->push($c);
        $context->stack->push($b);
        $context->stack->push($a);
        $context->stack->push($c);
    }
}
