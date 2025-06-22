<?php

namespace Wallet\Http\Actions\Wallet;

use Wallet\Database\DatabaseResolver;
use Wallet\Http\Actions\Internal\BaseAction;
use Wallet\Service\AuthenticationService;

class GetAuthenticatedUserWalletAction extends BaseAction
{
    function __invoke(): void
    {
        $user = AuthenticationService::getUser();

        if (empty($user)) {
            $this->response(
                http_code: 401,
                response: [
                    'message' => 'You must be authenticated to access this resource.',
                    'data' => [],
                ]
            );
        }

        $wallet = DatabaseResolver::resolve()
            ->GetRow(
                'SELECT balance, bonus FROM wallets WHERE owner_type = ? AND owner_id = ?',
                [
                    'user',
                    $user['user_id'],
                ]
            )
        ;

        if (empty($wallet)) {
            $this->response(
                http_code: 404,
                response: [
                    'message' => 'Wallet not found for the authenticated user.',
                    'data' => [],
                ]
            );
        }

        $this->response(
            http_code: 200,
            response: [
                'message' => 'Wallet retrieved successfully.',
                'data' => [
                    'wallet' => $wallet,
                ],
            ],
        );
    }
}