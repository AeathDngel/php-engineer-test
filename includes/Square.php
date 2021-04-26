<?php
/*
 * The Shape Class
 */

namespace FlickerLeap;

use FlickerLeap\Shape;

/**
 *
 */
class Square extends Shape
{
    /**
     *
     * @param int $length
     */
    public function __construct($length = 5)
    {
        $this->name = 'Square';
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
     * Draws the square.
     */
    public function draw()
    {
        if($this->sideLength == 1) {
            echo 'The length you supplied seems a bit to small to draw a proper square!';
            return;
        }
        for ($i = 0; $i < $this->sideLength; $i++) {
            for ($j = 0; $j < $this->sideLength; $j++) {
                if ($i == 0
                    || $j == 0
                    || $i == $this->sideLength - 1
                    || $j == $this->sideLength - 1) {
                    echo $this->pixel . $this->padding(2);
                } else {
                    echo $this->padding(4);
                }
            }
             $this->newLine();
        }
    }
}
