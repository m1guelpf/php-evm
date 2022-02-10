<?php

namespace M1guelpf\EVM\Opcodes;

use M1guelpf\EVM\ExecutionContext;

class Shr extends BaseOpcode
{
    public function __construct()
    {
        parent::__construct(0x1c, 'SHR');
    }

    public function execute(ExecutionContext $context)
    {
        [$shift, $value] = $context->stack->popN(2);

        if ($shift > 255) {
            return $context->stack->push(0);
        }

        $context->stack->push(
            $value >> $shift
        );
    }
}
