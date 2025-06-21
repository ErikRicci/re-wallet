<?php

namespace Wallet\Http\Request;

use Psr\Http\Message\ServerRequestInterface;

interface Request
{
    public static function getMessage(): ServerRequestInterface;
}