<?php

namespace Wallet\Database;

// TODO: Kinda ugly, check if there's a better way to write it
include __DIR__ . '/../../vendor/adodb/adodb-php/drivers/adodb-sqlite3.inc.php';
include __DIR__ . '/../../vendor/adodb/adodb-php/adodb-exceptions.inc.php';

final class DatabaseResolver
{
    public static function resolve(): \ADOConnection
    {
        $connection = new \ADODB_sqlite3();
        $connection->fetchMode = ADODB_FETCH_ASSOC;
        $connection->raiseErrorFn = 'adodb_throw';

        $connection->Connect(__DIR__ . '/../../database.sqlite');

        if (!$connection->IsConnected()) {
            throw new \RuntimeException('Failed to connect to the database.');
        }

        return $connection;
    }
}