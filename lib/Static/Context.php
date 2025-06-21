<?php

namespace Wallet\Static;

final class Context
{
    private static array $context;

    public static function get(ContextEnum $context): mixed
    {
        return self::$context[$context->value] ?? null;
    }

    public static function getOrCreate(ContextEnum $context, mixed $value): mixed
    {
        if (!self::get($context)) {
            self::set($context, $value);
        }

        return self::get($context);
    }

    public static function getOrCry(ContextEnum $context): mixed
    {
        if (!self::get($context)) {
            throw new \RuntimeException("Trying to access non-existent '$context->value' context.");
        }

        return self::get($context);
    }

    public static function set(ContextEnum $context, mixed $value): void
    {
        self::$context[$context->value] = $value;
    }

    public static function setIfEmptyOrCry(ContextEnum $context, mixed $value): void
    {
        if (self::get($context)) {
            throw new \RuntimeException("Context '$context->value' is already set.");
        }

        self::set($context, $value);
    }
}