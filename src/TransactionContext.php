<?php

namespace M1guelpf\EVM;

class TransactionContext
{
    public function __construct(public string $data = "", public int $value = 0)
    {
        //
    }
}
