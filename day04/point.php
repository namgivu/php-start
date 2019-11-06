<?php

// duong_thang co 2 diem A va B
// moi diem A, B co toa do x, y

class Point {
    public $name;

    public function __toString() {
        return "Diem {$this->name}";
    }

    public function __construct($initial_name){
        $this->name = $initial_name;
    }
}

class Line {
    public $A;
    public $B;

    public function __toString() {
        return "Duong thang noi {$this->A} va {$this->B}";
    }

    public function __construct($initial_A, $initial_B) {
        $this->A = $initial_A;
        $this->B = $initial_B;
    }
}

$A = new Point('X'); echo $A."\n";
$B = new Point('Y'); echo $B."\n";
$dt = new Line($A, $B); $dt->A = $A; $dt->B = $B; echo $dt."\n";

$C = new Point('C');
$D = new Point('D');
$dt2 = new Line($C, $D); echo $dt2."\n";
