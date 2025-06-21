<?php

namespace Wallet\Application\Entrypoint;

use Wallet\Http\Actions\ActionResolver;

final class HttpEntryPoint implements Entrypoint
{
    public function __construct()
    {
        header('Content-Type: application/json');
    }

    public function enter(): void
    {
        ActionResolver::resolve()->__invoke();
    }
}
