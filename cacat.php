<?php
// blueprint / mold / pattern / factory for objects

class Car
{
    private $color = 'red';
    public $weight;
    private $year;
    private $availableColors = [
        'red', 'green', 'blue', 'white'
    ];

    public function setYear($year)
    {
        $this->year = $year;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function setColor($color)
    {
        if (in_array($color, $this->availableColors)) {
            $this->color = $color;

        }
    }
        public function getColor ()
            {
        return $this->color;
            }
}

$myCar = new Car();
$myCar->setColor() = 'white';

echo $myCar->getColor();

