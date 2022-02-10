<?php

namespace M1guelpf\EVM\Opcodes;

use M1guelpf\EVM\ExecutionContext;

class Push4 extends BaseOpcode
{
    public function __construct()
    {
        parent::__construct(0x63, 'PUSH4');
    }

    public function execute(ExecutionContext $context)
    {
        (new Push1())->execute($context);
    }
}
