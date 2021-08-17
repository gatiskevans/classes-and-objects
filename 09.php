<?php

    class BankAccount {

        public string $name;
        public float $balance;

        function __construct(string $name, float $balance){
            $this->name = $name;
            $this->balance = $balance;
        }

        function show_user_name_and_balance(): string {
            $balance = number_format(abs($this->balance), 2);
            return $this->balance < 0 ? "$this->name, -$$balance" : "$this->name, $$balance";
        }

    }

    $ben = new BankAccount("Benson", -17.5);
    echo $ben->show_user_name_and_balance();