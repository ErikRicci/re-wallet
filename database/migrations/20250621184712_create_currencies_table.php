<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateCurrenciesTable extends AbstractMigration
{
    public function change(): void
    {
        $this->table('currencies')
            ->addColumn('name', 'string', ['limit' => 100])
            ->addColumn('symbol', 'string', ['limit' => 10])
            ->addColumn('code', 'string', ['limit' => 10])
            ->addTimestamps()
            ->addColumn('deleted_at', 'timestamp', ['null' => true])
            ->create();
    }
}
