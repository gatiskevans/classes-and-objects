<?php

    class SavingsAccount {
        private float $annualInterestRate;
        private int $balance;
        private int $deposit = 0;
        private int $withdraw = 0;
        private int $interestEarned = 0;

        public function __construct(float $balance, float $annualInterestRate)
        {
            $this->balance = ceil($balance * 100);
            $this->annualInterestRate = $annualInterestRate / 100;
        }

        public function getBalance(): int
        {
            return $this->balance;
        }

        public function getDeposit(): int
        {
            return $this->deposit;
        }

        public function getWithdraw(): int
        {
            return $this->withdraw;
        }

        public function getInterestEarned(): int
        {
            return $this->interestEarned;
        }

        public function withdraw(float $amount): int
        {
            $amount = ceil($amount * 100);
            $this->withdraw += $amount;
            return $this->balance = $this->balance - $amount;
        }

        public function deposit(float $amount): int
        {
            $amount = ceil($amount * 100);
            $this->deposit += $amount;
            return $this->balance = $this->balance + $amount;
        }

        public function monthlyInterest(): float
        {
            return number_format($this->annualInterestRate / 12, 4);
        }

        public function addInterest(): float
        {
            $this->interestEarned += ceil($this->monthlyInterest() * $this->balance);
            return $this->balance = ceil($this->monthlyInterest() * $this->balance + $this->balance);
        }

    }

    $balance = (float) readline("How much money is in the account?: ");
    $interestRate = (float) readline("Enter the annual interest rate: ");
    $accountActive = (int) readline("How long has the account been opened (months)? ");

    $account = new SavingsAccount($balance, $interestRate);

    for($i = 1; $i <= $accountActive; $i++) {
        $account->addInterest();
        $deposit = readline("Enter amount deposited for month: $i: ");
        $withdraw = readline("Enter amount withdrawn for month: $i: ");
        $account->deposit($deposit);
        $account->withdraw($withdraw);
    }

    $totalDeposit = number_format($account->getDeposit()/100, 2);
    $totalWithdraw = number_format($account->getWithdraw()/100, 2);
    $interestEarned = number_format($account->getInterestEarned()/100, 2);
    $accountBalance = number_format($account->getBalance()/100, 2);

    echo "Total deposited: $$totalDeposit\n";
    echo "Total withdrew: $$totalWithdraw\n";
    echo "Interest Earned: $$interestEarned\n";
    echo "Ending balance: $$accountBalance";
