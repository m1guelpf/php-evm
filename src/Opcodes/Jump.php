<?php

namespace M1guelpf\EVM\Opcodes;

use M1guelpf\EVM\ExecutionContext;
use RuntimeException;

class Jump extends BaseOpcode
{
    public function __construct()
    {
        parent::__construct(0x56, 'JUMP');
    }

    public function execute(ExecutionContext $context)
    {
        $dest = $context->stack->pop();

        if ($dest > count($context->code)) {
            throw new RuntimeException("Invalid Jump at {$context->pc}");
        }

        $context->pc = $dest;
    }
}
