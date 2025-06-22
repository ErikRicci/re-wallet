<?php

namespace Wallet\Http\Actions\App;

use Wallet\Database\DatabaseResolver;
use Wallet\Http\Actions\Internal\BaseAction;

final class GetDepositTypesAction extends BaseAction
{
    public function __invoke(): void
    {
//        $deposit_types = DepositType::orderBy('index')
//        ->get();

        $deposit_types = DatabaseResolver::resolve()
            ->Execute('SELECT icon, name, description, route, is_new FROM deposit_types ORDER BY `index` ASC')
            ->GetAll()
        ;

        $this->response(
            http_code: 200,
            response: [
                'message' => 'Deposit types retrieved successfully.',
                'data' => $deposit_types,
            ]
        );
    }
}