<?php
/*
 * The Diamond Class
 */

namespace FlickerLeap;
use FlickerLeap\Shape;

/**
 *
 */
class Diamond extends Shape
{
    /**
     *
     * @param int $length
     */
    public function __construct($length = 5)
    {
        $this->name = 'Diamond';
        $this->sideLength = $length;
        $this->pixel = "♦";
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
     * Draws the diamond.
     */
    public function draw()
    {
        if($this->sideLength < 6) {
            echo 'The length you supplied seems a bit to small to draw a proper diamond!';
            return;
        }
        $isEvenLength = $this->sideLength % 2 === 0 ? true : false;
        $size = 1;
        $reachedHalfway = false;

        while($size) {
            if($size == 1) {
                $size--;
            } else if ($size < 4) {
                echo $this->padding( ($this->sideLength - $size)*2 +1);
                echo $this->pixel;
            }else {
                echo $this->padding( ($this->sideLength - $size)*2);
                echo $this->pixel;
                echo $this->padding(($size - 2)*4);
                echo $this->pixel;
            }
            if($size == $this->sideLength && $isEvenLength) {
                $reachedHalfway = true;
            }
            if($size == ($this->sideLength - 1) && !$isEvenLength) {
                $reachedHalfway = true;
            }
            if(!$reachedHalfway) {
                $size += 2;
            } else {
                if($size == 1) { 
                    $size = null; 
                }
                $size -= 2;
            }
            $this->newLine();
        }
    }
}
