<?php

namespace Wallet\Application;

final class Application
{
    public static function getAppVersion(): string
    {
        return APP_VERSION;
    }
}