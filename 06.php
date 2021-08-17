<?php

    class Survey {
        public int $surveyed = 12467;
        public float $purchased_energy_drinks = 0.14;
        public float $prefer_citrus_drinks = 0.64;

        function calculate_energy_drinkers(): int {
            return $this->surveyed * $this->purchased_energy_drinks;
        }

        function calculate_prefer_citrus(): int {
            return $this->calculate_energy_drinkers() * $this->prefer_citrus_drinks;
        }
    }

    $energyDrinksSurvey = new Survey();

    echo "Total number of people surveyed: " . $energyDrinksSurvey->surveyed . "\n";
    echo "Approximately " . $energyDrinksSurvey->calculate_energy_drinkers() . " bought at least one energy drink\n";
    echo $energyDrinksSurvey->calculate_prefer_citrus() . " of those " . "prefer citrus flavored energy drinks.";