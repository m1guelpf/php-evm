<?php

namespace M1guelpf\EVM;

require_once "./vendor/autoload.php";

$hello_world = trim(file_get_contents(__DIR__.'/../contracts/out/HelloWorld.opc'));

$evm = new EVM;

$evm->execute($hello_world);
