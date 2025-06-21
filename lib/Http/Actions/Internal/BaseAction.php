<?php

namespace Wallet\Http\Actions\Internal;

abstract class BaseAction
{
    abstract function __invoke(): void;
    public function response(
        int $http_code,
        string|array $response,
    ): never {
        http_response_code($http_code);

        $json_response = is_array($response)
            ? json_encode($response)
            : $response;

        die($json_response);
    }
}