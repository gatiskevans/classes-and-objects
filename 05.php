<?php

    class Date {
        private int $month;
        private int $day;
        private int $year;

        function __construct(int $month, int $day, int $year){
            $this->month = $month;
            $this->day = $day;
            $this->year = $year;
        }

        function getMonth(): int {
            return $this->month;
        }

        function getDay(): int {
            return $this->day;
        }

        function getYear(): int{
            return $this->year;
        }

        function setMonth($month){
            $this->month = $month;
        }

        function setDay($day){
            $this->day = $day;
        }

        function setYear($year){
            $this->year = $year;
        }

        function displayDate(): string {
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