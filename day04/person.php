<?php

class Person {
    public $age;

    public function __toString() {
        return "age={$this->age}\n";
    }

}

$p1 = new Person(); $p1->age = 122; echo $p1->age."\n";
$p2 = new Person(); $p2->age = 333; echo $p2->age."\n";

echo $p1;
echo $p2;
