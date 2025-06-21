<?php

namespace Wallet\Application;

use Wallet\Application\Entrypoint\EntryPoint;
use Wallet\Application\Entrypoint\EntrypointResolver;

final class Main
{
    public static function __init(): EntryPoint
    {
        return EntrypointResolver::resolve();
    }
}
