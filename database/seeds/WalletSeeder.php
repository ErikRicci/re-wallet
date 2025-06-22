<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class WalletSeeder extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            [
                'owner_type' => 'admin',
                'owner_id' => 1,
                'balance' => 0,
                'bonus' => 0,
            ],
            [
                'owner_type' => 'user',
                'owner_id' => 1,
                'balance' => 0,
                'bonus' => 0,
            ],
        ];

        $this->table('wallets')->truncate();

        $this->table('wallets')
            ->insert($data)
            ->saveData();
    }
}
