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

        public function addMileage() {
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

    for($i = 1; $i <= $fuel->getMaxFuel(); $i++){
        $fuel->addFuel();
    }

    while($fuel->getFuel() > 0){
        $mileage->addMileage();
        echo "Mileage: {$mileage->getMileage()}\n";
        echo "Fuel Level: {$fuel->getFuel()} liters\n";
        echo "--------------------------------\n";
    }


