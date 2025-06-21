<?php

namespace Wallet\Http\Request;

use GuzzleHttp\Psr7\ServerRequest;
use Psr\Http\Message\ServerRequestInterface;
use Wallet\Static\Context;
use Wallet\Static\ContextEnum;

final class HttpRequest implements Request
{
    public static function getMessage(): ServerRequestInterface
    {
        return Context::getOrCreate(
            context: ContextEnum::INCOMING_REQUEST,
            value: ServerRequest::fromGlobals()
        );
    }
}