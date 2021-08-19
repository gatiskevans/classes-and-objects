<?php

    class Dog {
        public string $name;
        public string $sex;
        public string $mother = "";
        public string $father = "";

        function __construct(string $name, string $sex){
            $this->name = $name;
            $this->sex = $sex;
        }

        function setMotherAndFather(string $mother, string $father){
            $this->mother = $mother;
            $this->father = $father;
        }

        function fathersName(): string {
            return $this->father !== "" ? $this->father : "Unknown";
        }

        function mothersName(): string {
            return $this->mother !== "" ? $this->mother : "Unknown";
        }

        function hasSameMotherAs(string $dog): bool {
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

            return "{$coco->name}`s father`s name is {$coco->fathersName()}.\n".
            "{$sparky->name}`s father`s name is {$sparky->fathersName()}.\n".
            "{$coco->hasSameMotherAs($rocky->mothersName())}";
        }
    }

    $dogTest = new DogTest();
    echo $dogTest->main();