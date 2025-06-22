<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class DepositTypeSeeder extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            [
                'index' => 1,
                'is_new' => 0,
                'name' => 'Depósito (PIX)',
                'description' => 'Pague com  Pix do seu banco e receba seu saldo na hora',
                'icon' => 'https://dev-apiservice.pagstar.com/icons/pix.svg',
                'route' => '/deposit/pix'
            ],
            [
                'index' => 2,
                'is_new' => 0,
                'name' => 'Depósito (TED)',
                'description' => 'Faça uma transferência do seu banco e receba seu saldo na hora',
                'icon' => 'https://dev-apiservice.pagstar.com/icons/bank_transfer.svg',
                'route' => '/deposit/bankaccount'
            ],
            [
                'index' => 3,
                'is_new' => 1,
                'name' => 'Depósito (Cartão de Crédito)',
                'description' => 'Pague com cartão de crédito e receba seu saldo na hora',
                'icon' => 'https://dev-apiservice.pagstar.com/icons/creditcard.svg',
                'route' => '/deposit/creditcard'
            ],
            [
                'index' => 4,
                'is_new' => 1,
                'name' => 'Depósito (Boleto)',
                'description' => 'Pague por boleto e receba em até dois dias úteis após o pagamento',
                'icon' => 'https://dev-apiservice.pagstar.com/icons/bankslip.svg',
                'route' => '/deposit/bankslip'
            ],
        ];

        $this->table('deposit_types')->truncate();

        $this->table('deposit_types')
            ->insert($data)
            ->saveData();
    }
}
