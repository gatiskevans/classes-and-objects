<?php

    class Survey {
        private int $surveyed = 12467;
        private float $purchasedEnergyDrinks = 0.14;
        private float $preferCitrusDrinks = 0.64;

        public function getPurchasedEnergyDrinks(): float {
            return $this->purchasedEnergyDrinks;
        }

        public function getPreferCitrusDrinks(): float {
            return $this->preferCitrusDrinks;
        }

        public function calculateEnergyDrinkers(): int {
            return $this->surveyed * $this->getPurchasedEnergyDrinks();
        }

        public function calculatePreferCitrus(): int {
            return $this->calculateEnergyDrinkers() * $this->getPreferCitrusDrinks();
        }

        public function getSurveyed(): int {
            return $this->surveyed;
        }
    }

    $energyDrinksSurvey = new Survey();

    echo "Total number of people surveyed: " . $energyDrinksSurvey->getSurveyed() . "\n";
    echo "Approximately " . $energyDrinksSurvey->calculateEnergyDrinkers() . " bought at least one energy drink\n";
    echo $energyDrinksSurvey->calculatePreferCitrus() . " of those " . "prefer citrus flavored energy drinks.";