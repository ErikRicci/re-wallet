<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateMovementTypesTable extends AbstractMigration
{
    public function change(): void
    {
        $this->table('movement_types')
            ->addColumn('code', 'integer')
            ->addColumn('name', 'string', ['limit' => 100])
            ->addColumn('description', 'string', ['limit' => 255])
            ->addColumn('fare', 'float', ['default' => 0.0, 'precision' => 12, 'scale' => 4])
            ->addColumn('fee', 'float', ['default' => 0.0, 'precision' => 12, 'scale' => 4])
            ->addColumn('min_value', 'float', ['precision' => 12, 'scale' => 4])
            ->addColumn('max_value', 'float', ['precision' => 12, 'scale' => 4])
            ->addColumn('max_quantity_per_day', 'integer')
            ->addColumn('max_value_per_day', 'float', ['precision' => 12, 'scale' => 4])
            ->addColumn('max_quantity_per_month', 'integer')
            ->addColumn('max_value_per_month', 'float', ['precision' => 12, 'scale' => 4])
            ->addColumn('expiry_time_ms', 'integer')
            ->addColumn('is_new', 'boolean', ['default' => false])
            ->addTimestamps()
            ->addColumn('deleted_at', 'timestamp', ['null' => true])
            ->create();
    }
}
