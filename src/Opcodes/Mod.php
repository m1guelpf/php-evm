<?php

namespace M1guelpf\EVM\Opcodes;

use M1guelpf\EVM\ExecutionContext;

class Mod extends BaseOpcode
{
    public function __construct()
    {
        parent::__construct(0x06, 'MOD');
    }

    public function execute(ExecutionContext $context)
    {
        [$a, $b] = $context->stack->popN(2);

        if ($b == 0) {
            return $context->stack->push(0);
        }

        $context->stack->push($a % $b);
    }
}
