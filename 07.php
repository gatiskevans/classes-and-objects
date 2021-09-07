<?php

    class Dog {
        private string $name;
        private string $sex;
        private string $mother;
        private string $father;

        public function __construct(string $name, string $sex, string $mother = "Unknown", string $father = "Unknown"){
            $this->name = $name;
            $this->sex = $sex;
            $this->mother = $mother;
            $this->father = $father;
        }

        public function getName(): string {
            return $this->name;
        }

        public function getSex(): string {
            return $this->sex;
        }

        public function setMotherAndFather(string $mother, string $father): void {
            $this->mother = $mother;
            $this->father = $father;
        }

        public function getFathersName(): string {
            return $this->father !== "Unknown" ? $this->father : "Unknown";
        }

        public function getMothersName(): string {
            return $this->mother !== "Unknown" ? $this->mother : "Unknown";
        }

        public function hasSameMotherAs(string $dog): bool {
            return $this->mother === $dog;
        }

    }

    class DogTest {
        function main(): string {
            $max = new Dog("Max", "male");
            $rocky = new Dog("Rocky", "male");
            $sparky = new Dog("Sparky", "male");
            $buster = new Dog("Buster", "male");
            $sam = new Dog("Sam", "male");
            $lady = new Dog("Lady", "female");
            $molly = new Dog("Molly", "female");
            $coco = new Dog("Coco", "female");

            $max->setMotherAndFather("Lady", "Rocky");
            $coco->setMotherAndFather("Molly", "Buster");
            $rocky->setMotherAndFather("Molly", "Sam");
            $buster->setMotherAndFather("Lady", "Sparky");

            return "{$coco->getName()}`s father`s name is {$coco->getFathersName()}.\n".
            "{$sparky->getName()}`s father`s name is {$sparky->getFathersName()}.\n".
            "{$coco->hasSameMotherAs($rocky->getMothersName())}";
        }
    }

    $dogTest = new DogTest();
    echo $dogTest->main();