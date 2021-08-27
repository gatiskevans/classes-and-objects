<?php

    class Survey {
        private int $surveyed = 12467;
        private float $purchased_energy_drinks = 0.14;
        private float $prefer_citrus_drinks = 0.64;

        public function calculate_energy_drinkers(): int {
            return $this->surveyed * $this->purchased_energy_drinks;
        }

        public function calculate_prefer_citrus(): int {
            return $this->calculate_energy_drinkers() * $this->prefer_citrus_drinks;
        }

        public function getSurveyed(): int {
            return $this->surveyed;
        }
    }

    $energyDrinksSurvey = new Survey();

    echo "Total number of people surveyed: " . $energyDrinksSurvey->getSurveyed() . "\n";
    echo "Approximately " . $energyDrinksSurvey->calculate_energy_drinkers() . " bought at least one energy drink\n";
    echo $energyDrinksSurvey->calculate_prefer_citrus() . " of those " . "prefer citrus flavored energy drinks.";