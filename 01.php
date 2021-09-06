<?php

    class Product {

        private string $name;
        private float $startPrice;
        private int $amount;

        public function __construct(string $name, float $priceStart, int $amount){
            $this->name = $name;
            $this->startPrice = number_format($priceStart, 2);
            $this->amount = $amount;
        }

        public function getName(): string {
            return $this->name;
        }

        public function getProduct(): string {
            return "\"$this->name\", price $this->startPrice EUR, amount $this->amount units\n";
        }

        public function setAmount($input): void{
            $this->amount = $input;
        }

        public function setPrice($input): void {
            $this->startPrice = $input;
        }

    }

    $mouse = new Product('Logitech mouse', 70.00, 14);
    $phone = new Product("iPhone 5s", 999.99, 3);
    $projector = new Product("Epson EB-U05", 440.46, 1);

    $products = [$mouse, $phone, $projector];

    echo "1 | {$mouse->getProduct()}2 | {$phone->getProduct()}3 | {$projector->getProduct()}";

    function setAmountAndPrice(object $product){
        $input = readline("Change the amount: ");
        $product->setAmount($input);
        $input = readline("Change the price: ");
        $product->setPrice($input);
    }

    $selection = readline("Choose a product (1-3): ");
    switch($selection){
        case 1:
            echo "Product \"{$mouse->getName()}\"\n";
            setAmountAndPrice($mouse);
            break;
        case 2:
            echo "Product \"{$phone->getName()}\"\n";
            setAmountAndPrice($phone);
            break;
        case 3:
            echo "Product \"{$projector->getName()}\"\n";
            setAmountAndPrice($projector);
            break;
        default:
            die("Bye");
    }

    echo "1 | {$mouse->getProduct()}2 | {$phone->getProduct()}3 | {$projector->getProduct()}";

