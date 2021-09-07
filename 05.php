<?php

    class Date {
        private int $month;
        private int $day;
        private int $year;

        public function __construct(int $month, int $day, int $year){
            $this->month = $month;
            $this->day = $day;
            $this->year = $year;
        }

        public function getMonth(): int {
            return $this->month;
        }

        public function getDay(): int {
            return $this->day;
        }

        public function getYear(): int{
            return $this->year;
        }

        public function setMonth($month): void {
            $this->month = $month;
        }

        public function setDay($day): void {
            $this->day = $day;
        }

        public function setYear($year): void {
            $this->year = $year;
        }

        public function displayDate(): string {
            return "$this->month/$this->day/$this->year";
        }

    }

    $dateTest = new Date(11, 24, 1993);
    echo $dateTest->displayDate()."\n";
    $dateTest->setMonth(12);
    $dateTest->setDay(31);
    $dateTest->setYear(2020);
    echo $dateTest->getMonth()."\n";
    echo $dateTest->getDay()."\n";
    echo $dateTest->getYear()."\n";
    echo $dateTest->displayDate();