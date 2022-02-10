<?php

namespace M1guelpf\EVM\Opcodes;

use M1guelpf\EVM\ExecutionContext;
use RuntimeException;

class Revert extends BaseOpcode
{
    public function __construct()
    {
        parent::__construct(0xfd, 'REVERT');
    }

    public function execute(ExecutionContext $context)
    {
        [$word, $length] = $context->stack->popN(2);
        $context->returnData = $context->memory->multi_get($word, $length);
        $context->stopped = true;

        throw new RuntimeException("Reverted.");
    }
}
