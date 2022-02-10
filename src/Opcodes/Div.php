<?php

namespace M1guelpf\EVM\Opcodes;

use M1guelpf\EVM\ExecutionContext;

class Div extends BaseOpcode
{
    public function __construct()
    {
        parent::__construct(0x04, 'DIV');
    }

    public function execute(ExecutionContext $context)
    {
        [$a, $b] = $context->stack->popN(2);

        if ($b == 0) {
            return $context->stack->push(0);
        }

        $context->stack->push($a / $b);
    }
}
