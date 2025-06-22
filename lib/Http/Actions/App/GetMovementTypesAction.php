<?php

namespace Wallet\Http\Actions\App;

use Wallet\Database\DatabaseResolver;
use Wallet\Http\Actions\Internal\BaseAction;

final class GetMovementTypesAction extends BaseAction
{
    public function __invoke(): void
    {
        $movement_types = DatabaseResolver::resolve()
            ->Execute('SELECT id, name, min_value, max_value, max_quantity_per_month, max_value_per_month FROM movement_types')
            ->GetAll()
        ;

        $this->response(
            http_code: 200,
            response: [
                'message' => 'Movement types retrieved successfully.',
                'data' => $movement_types,
            ]
        );
    }
}