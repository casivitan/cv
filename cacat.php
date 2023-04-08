<?php

class Person {

    public $name;
    protected $age;
    private $phone;

    public function __construct($name, $age, $phone)
    {
        $this->name = $name;
        $this->age = $age;
        $this->phone = $phone;
    }

    public function hello(){
        return "Hello from person";
    }

}

class Employee extends Person {

    private $salary;
    public function __construct($name, $age, $phone, $salary)
    {
        parent::__construct($name, $age, $phone);
        $this->salary = $salary;
    }

    public function hello(){
        return "Sunt angajatul pe nume: $this->name, si am salariul de $this->salary";
    }
}

class Student extends Person {

    private $studentNO;
    public function __construct($name, $age, $phone, $studentNO)
    {
        parent::__construct($name, $age, $phone);
        $this->studentNO = $studentNO;
    }

    public function hello()
    {
        return "Sunt studentul cu numele $this->name, am $this->age ani si am numarul $this->studentNO!";
    }

}

$employee = new Employee("Casi", 27,123456, 2500);
$employee2 = new Employee("Andrei", 25,654321, 1000);
$student = new Student("Ion", 14,432243,2 );


echo $employee->hello().PHP_EOL;
echo $employee2->hello().PHP_EOL;
echo $student->hello().PHP_EOL;
