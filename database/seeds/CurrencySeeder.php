<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class CurrencySeeder extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            [
                'code' => 'BRL',
                'name' => 'Real',
                'symbol' => 'R$',
            ],
            [
                'code' => 'USD',
                'name' => 'Dólar',
                'symbol' => '$',
            ],
            [
                'code' => 'EUR',
                'name' => 'Euro',
                'symbol' => '€',
            ],
        ];

        $this->table('currencies')->truncate();

        $this->table('currencies')
            ->insert($data)
            ->saveData();
    }
}
