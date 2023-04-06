<?php

class ParentClass
{
    public $property1 = '1';
    protected $property2 = '2';
    private $property3 = '3';

}

class ChildClass extends ParentClass
{

}

$obj = new ChildClass ();
echo $obj->$property1;
