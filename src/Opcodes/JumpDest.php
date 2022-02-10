<?php

namespace M1guelpf\EVM\Opcodes;

use M1guelpf\EVM\ExecutionContext;

class JumpDest extends BaseOpcode
{
    public function __construct()
    {
        parent::__construct(0x5b, 'JUMPDEST');
    }

    public function execute(ExecutionContext $context)
    {
    }
}
