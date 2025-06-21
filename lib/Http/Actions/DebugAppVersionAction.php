<?php

namespace Wallet\Http\Actions;

use Wallet\Application\Application;
use Wallet\Http\Actions\Internal\BaseAction;
use Wallet\Http\Request\RequestResolver;

final class DebugAppVersionAction extends BaseAction
{
    public function __invoke(): void
    {
        $request = RequestResolver::resolve();
        $request_fields = $request->getParsedBody() + $request->getQueryParams();

        $this->response(
            http_code: 200,
            response: [
                'app_version' => Application::getAppVersion(),
                'php_version' => phpversion(),
                'request_fields' => $request_fields,
            ]
        );
    }
}
