<?php

namespace Wallet\Application\Entrypoint;

final class EntrypointResolver
{
    public static function resolve(): EntryPoint
    {
        if (php_sapi_name() === 'cli') {
            throw new \LogicException("Execution from CLI is not yet supported");
        }

        return new HttpEntryPoint;
    }
}
