<?php

    class Point {

        public int $x;
        public int $y;

        function __construct($pointOne, $pointTwo){
            $this->x = $pointOne;
            $this->y = $pointTwo;
        }

    }

    function swap_points($x, $y){
        $tempX = $x->x;
        $tempY = $x->y;
        $x->x = $y->x;
        $x->y = $y->y;
        $y->x = $tempX;
        $y->y = $tempY;
    }

    $p1 = new Point(5, 2);
    $p2 = new Point(-3, 6);

    swap_points($p1, $p2);

    echo "(" . $p1->x . ", " . $p1->y . ")\n";
    echo "(" . $p2->x . ", " . $p2->y . ")";