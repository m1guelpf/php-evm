<?php

namespace M1guelpf\EVM\Opcodes;

use M1guelpf\EVM\ExecutionContext;

class Stop extends BaseOpcode
{
    public function __construct()
    {
        parent::__construct(0x00, 'STOP');
    }

    public function execute(ExecutionContext $context)
    {
        $context->stopped = true;
    }
}
