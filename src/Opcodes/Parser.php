<?php

namespace M1guelpf\EVM\Opcodes;

use M1guelpf\EVM\Opcodes\BaseOpcode as OpCode;
use Illuminate\Support\Collection;
use Illuminate\Support\ItemNotFoundException;
use Illuminate\Support\Str;
use M1guelpf\EVM\ExecutionContext;
use ReflectionClass;
use RuntimeException;
use Symfony\Component\Finder\Finder;

class Parser
{
    protected Collection $opcodeList;

    public function __construct()
    {
        $this->opcodeList = $this->buildOpcodeList();
    }

    public function decode(ExecutionContext $context)
    {
        if ($context->pc >= count($context->code)) {
            return new Stop;
        }

        try {
            return with($code = $context->getCode(1), fn (int $code) => $this->opcodeList->firstOrFail(fn (OpCode $i) => $i->code === $code));
        } catch (ItemNotFoundException $e) {
            throw new RuntimeException(sprintf("Opcode 0x%s not found, see https://www.evm.codes/#%s", dechex($code), dechex($code)), 0, $e);
        }
    }

    protected function buildOpcodeList(): Collection
    {
        $opcodeList = collect();

        foreach ((new Finder)->in([__DIR__])->files() as $instruction) {
            $instruction = '\M1guelpf\EVM\Opcodes\\'.str_replace('.php', '', Str::after($instruction->getRealPath(), __DIR__.DIRECTORY_SEPARATOR));

            if (is_subclass_of($instruction, BaseOpcode::class) && ! (new ReflectionClass($instruction))->isAbstract()) {
                $opcodeList->push(new $instruction);
            }
        }

        return $opcodeList;
    }
}
