<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateWalletsTable extends AbstractMigration
{
    public function change(): void
    {
        $this->table('wallets')
            ->addColumn('owner_type', 'string', ['limit' => 50, 'default' => 'user'])
            ->addColumn('owner_id', 'integer')
            ->addColumn('balance', 'float', ['default' => 0.0, 'precision' => 12, 'scale' => 4])
            ->addColumn('bonus', 'float', ['default' => 0.0, 'precision' => 12, 'scale' => 4])
            ->addTimestamps()
            ->addColumn('deleted_at', 'timestamp', ['null' => true])
            ->create();
    }
}
