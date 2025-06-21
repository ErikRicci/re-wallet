<?php

namespace Wallet\Http\Actions\Currency;

use Wallet\Database\DatabaseResolver;
use Wallet\Http\Actions\Internal\BaseAction;

final class GetCurrenciesAction extends BaseAction
{
    function __invoke(): void
    {
        $currencies = DatabaseResolver::resolve()
            ->Execute('SELECT id, name, symbol, code FROM currencies ORDER BY name ASC')
            ->GetAll()
            ;

        $this->response(
            http_code: 200,
            response: [
                'data' => [
                    'currencies' => (array) $currencies,
                ],
            ]
        );
    }
}