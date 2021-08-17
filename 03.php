<?php

    class FuelGauge {
        public int $fuel = 0;
        public int $maxFuel = 70;

        function addFuel(): int {
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
        public int $mileage;
        public int $maxMileage = 999999;
        public int $driven = 0;
        public FuelGauge $fuel;

        function __construct(int $mileage, FuelGauge $fuel){
            $this->mileage = $mileage;
            $this->fuel = $fuel;
        }

        function getMileage(): int {
            return $this->mileage;
        }

        function addMileage() {
            if($this->mileage < $this->maxMileage){
                $this->mileage++;
            } else {
                $this->mileage = 0;
            }

            $this->driven++;
            if($this->driven % 10 === 0){
                $this->fuel->burnFuel();
            }

        }

    }

    $fuel = new FuelGauge();
    $mileage = new Odometer(100000, $fuel);

    for($i = 1; $i <= $fuel->maxFuel; $i++){
        $fuel->addFuel();
    }

    while($fuel->getFuel() > 0){
        $mileage->addMileage();
        echo "Mileage: {$mileage->getMileage()}\n";
        echo "Fuel Level: {$fuel->getFuel()} liters\n";
        echo "--------------------------------\n";
    }


