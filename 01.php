<?php

    class Product {

        private string $name;
        private float $price_at_start;
        private int $amount_at_start;

        public function __construct(string $name, float $price_at_start, int $amount_at_start){
            $this->name = $name;
            $this->price_at_start = number_format($price_at_start, 2);
            $this->amount_at_start = $amount_at_start;
        }

        public function getName(): string {
            return $this->name;
        }

        public function print_product(): string {
            return "\"$this->name\", price $this->price_at_start EUR, amount $this->amount_at_start units\n";
        }

        public function changeQuantity($input){
            $this->amount_at_start = $input;
        }

        public function changePrice($input){
            $this->price_at_start = $input;
        }

    }

    $mouse = new Product('Logitech mouse', 70.00, 14);
    $phone = new Product("iPhone 5s", 999.99, 3);
    $projector = new Product("Epson EB-U05", 440.46, 1);

    $products = [$mouse, $phone, $projector];

    echo "1 | {$mouse->print_product()}2 | {$phone->print_product()}3 | {$projector->print_product()}";

    $selection = readline("Choose a product (1-3): ");
    switch($selection){
        case 1:
            echo "Product \"{$mouse->getName()}\"\n";
            $input = readline("Change the amount: ");
            $mouse->changeQuantity($input);
            $input = readline("Change the price: ");
            $mouse->changePrice($input);
            break;
        case 2:
            echo "Product \"{$phone->getName()}\"\n";
            $input = readline("Change the amount: ");
            $phone->changeQuantity($input);
            $input = readline("Change the price: ");
            $phone->changePrice($input);
            break;
        case 3:
            echo "Product \"{$projector->getName()}\"\n";
            $input = readline("Change the amount: ");
            $projector->changeQuantity($input);
            $input = readline("Change the price: ");
            $projector->changePrice($input);
            break;
        default:
            die("Bye");
    }

    echo "1 | {$mouse->print_product()}2 | {$phone->print_product()}3 | {$projector->print_product()}";

