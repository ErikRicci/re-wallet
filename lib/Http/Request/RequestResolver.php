<?php

namespace Wallet\Http\Request;

use Psr\Http\Message\ServerRequestInterface;

final class RequestResolver
{
    public static function resolve(): ServerRequestInterface
    {
        return HttpRequest::getMessage();
    }
}