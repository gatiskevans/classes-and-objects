<?php


class Point
{

    public int $x;
    public int $y;

    public function __construct(int $pointOne, int $pointTwo)
    {
        $this->x = $pointOne;
        $this->y = $pointTwo;
    }

}

class PointSwapper {
    private int $tempX;
    private int $tempY;
    private object $x;
    private object $y;

    public function __construct(object $x, object $y) {
        $this->tempX = $x->x;
        $this->tempY = $x->y;
        $x->x = $y->x;
        $x->y = $y->y;
        $y->x = $this->tempX;
        $y->y = $this->tempY;
    }
}



$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);

$swapper = new PointSwapper($p1, $p2);

echo "(" . $p1->x . ", " . $p1->y . ")\n";
echo "(" . $p2->x . ", " . $p2->y . ")";