<?php

    class FuelGauge {
        private int $fuel = 0;
        private int $maxFuel = 70;

        public function getMaxFuel(): int {
            return $this->maxFuel;
        }

        public function addFuel(): int {
            return $this->fuel++;
        }

        public function burnFuel(): int {
            return $this->fuel--;
        }

        public function getFuel(): int {
            return $this->fuel;
        }
    }

    class Odometer {
        private int $mileage;
        private int $maxMileage = 999999;
        private int $driven = 0;
        private FuelGauge $fuel;

        public function __construct(int $mileage, FuelGauge $fuel){
            $this->mileage = $mileage;
            $this->fuel = $fuel;
        }

        public function getMileage(): int {
            return $this->mileage;
        }

        public function addMileage(): void {
            $this->mileage < $this->maxMileage ? $this->mileage++ : $this->mileage = 0;
            $this->driven++;
            if($this->driven % 10 === 0) $this->fuel->burnFuel();
        }

    }

    $fuel = new FuelGauge();
    $mileage = new Odometer(100000, $fuel);

    for($i = 1; $i <= $fuel->getMaxFuel(); $i++){
        $fuel->addFuel();
        echo "Adding fuel: {$fuel->getFuel()}\n";
        usleep(25000);
    }

    echo "\e[32mGetting ready to drive!\e[0m\n";
    sleep(2);

    while($fuel->getFuel() > 0){
        $mileage->addMileage();
        echo "Mileage: {$mileage->getMileage()}\n";
        echo "Fuel Level: {$fuel->getFuel()} liters\n";
        echo "--------------------------------\n";
        usleep(500);
    }


