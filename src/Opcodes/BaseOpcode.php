<?php

namespace M1guelpf\EVM\Opcodes;

use M1guelpf\EVM\ExecutionContext;

abstract class BaseOpcode
{
    public function __construct(public int $code, public string $name)
    {
        //
    }

    abstract public function execute(ExecutionContext $context);
}
