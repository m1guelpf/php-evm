<?php

namespace M1guelpf\EVM\Opcodes;

use M1guelpf\EVM\ExecutionContext;
use RuntimeException;

class JumpI extends BaseOpcode
{
    public function __construct()
    {
        parent::__construct(0x57, 'JUMPI');
    }

    public function execute(ExecutionContext $context)
    {
        [$dest, $cond] = $context->stack->popN(2);

        if ($cond === 0) {
            return;
        }

        if ($dest > count($context->code)) {
            throw new RuntimeException("Invalid Jump at {$context->pc}");
        }

        $context->pc = $dest;
    }
}
