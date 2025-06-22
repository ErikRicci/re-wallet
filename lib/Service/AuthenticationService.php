<?php

namespace Wallet\Service;

use Alohomora\Facades\Alohomora;

final class AuthenticationService
{
    public static function getUser(): ?array
    {
        return Alohomora::validate()?->optional_data['data'] ?? null;
    }
}