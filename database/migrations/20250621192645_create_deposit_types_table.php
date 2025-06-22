<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateDepositTypesTable extends AbstractMigration
{
    public function change(): void
    {
        $this->table('deposit_types')
            ->addColumn('index', 'integer')
            ->addColumn('icon', 'string', ['limit' => 100])
            ->addColumn('route', 'string', ['limit' => 100])
            ->addColumn('name', 'string', ['limit' => 100])
            ->addColumn('description', 'string', ['limit' => 255])
            ->addColumn('is_new', 'boolean', ['default' => false])
            ->addTimestamps()
            ->create();
    }
}
