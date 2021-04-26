<?php
/*
 * The Shape Class
 */

namespace FlickerLeap;

use FlickerLeap\Shape;

/**
 *
 */
class Rectangle extends Shape
{
    /**
     *
     * @param int $length
     */
    public function __construct($length = 5) {
        $this->name = 'Rectangle';
        $this->sides = 4;
        $this->sideLength = round($length);
        $this->pixel = "*";
    }

    /**
     *
     */
    public function displayName()
    {
        echo $this->name;
        $this->newLine();
    }

    /**
     * Draws the rectangle.
     */
    public function draw()
    {
        if($this->sideLength == 1) {
            echo 'The length you supplied seems a bit to small to draw a proper rectangle!';
            return;
        }
        $rectangleLength = $this->sideLength * 2;
        for ($i = 0; $i < ($this->sideLength); $i++)
        {
            for ($j = 0; $j < $rectangleLength; $j++) {
                if ($i == 0 || $j == 0 || $i == $this->sideLength - 1 || $j == ($rectangleLength - 1)) {
                    echo $this->pixel . $this->padding(2);
                } else {
                    echo $this->padding(4);
                }
            }
             $this->newLine();
        }
    }
}
