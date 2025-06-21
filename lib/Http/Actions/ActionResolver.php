<?php

namespace Wallet\Http\Actions;

use Wallet\Http\Actions\Internal\BaseAction;
use Wallet\Http\Request\RequestResolver;

final class ActionResolver
{
    public static function resolve(): BaseAction
    {
        $request = RequestResolver::resolve();
        $path = $request->getUri()->getPath();
        $method = $request->getMethod();

        return self::findAction($path, $method);
    }

    // TODO: Find a better place for these
    private static function findAction(string $path, string $method): BaseAction
    {
        $path_and_method = [$path, $method];

        return match ($path_and_method) {
            ['/', 'GET'] => new DebugAppVersionAction(),
            default => self::fallbackAction(),
        };
    }

    private static function fallbackAction(): BaseAction
    {
        return new class extends BaseAction
        {
            function __invoke(): void
            {
                $this->response(
                    http_code: 404,
                    response: [
                        'error' => 'Not Found',
                        'message' => 'The requested resource could not be found.',
                    ]
                );
            }
        };
    }
}