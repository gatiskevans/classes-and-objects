<?php

    class Account
    {

        private string $name;
        private int $balance;

        public function __construct(string $name, int $balance)
        {
            $this->name = $name;
            $this->balance = $balance;
        }

        public function getName(): string
        {
            return $this->name;
        }

        public function getBalance(): int
        {
            return $this->balance;
        }

        public function deposit(int $deposit): void
        {
            $this->balance += $deposit;
        }

        public function withdraw(int $withdraw): void
        {
            $this->balance -= $withdraw;
        }

    }

    $matts_account = new Account("Matt's Account", 1000);
    $my_account = new Account("My Account", 0);

    $matts_account->withdraw(100);
    $my_account->deposit(20);

    echo PHP_EOL;
    echo "Name: {$matts_account->getName()}, Balance: \${$matts_account->getBalance()}\n";
    echo "Name: {$my_account->getName()}, Balance: \${$my_account->getBalance()}\n\n";

    function transfer(Account $from, Account $to, int $howMuch) {
        $from->withdraw($howMuch);
        $to->deposit($howMuch);
    }

    $account_A = new Account("A", 100);
    $account_B = new Account("B", 0);
    $account_C = new Account("C", 0);

    transfer($account_A, $account_B, 50);
    transfer($account_B, $account_C, 25);

    echo "Name: {$account_A->getName()}, Balance: \${$account_A->getBalance()}\n";
    echo "Name: {$account_B->getName()}, Balance: \${$account_B->getBalance()}\n";
    echo "Name: {$account_C->getName()}, Balance: \${$account_C->getBalance()}\n";