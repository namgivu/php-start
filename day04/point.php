<?php

// duong_thang co 2 diem A va B
// moi diem A, B co toa do x, y

class Point {
    public $name;

    public function __toString() {
        return "Diem {$this->name}";
    }

}

class Line {
    public $A;
    public $B;

    public function __toString() {
        return "Duong thang noi {$this->A} va {$this->B}";
    }
}

$A = new Point(); $A->name='A'; echo $A."\n";
$B = new Point(); $B->name='B'; echo $B."\n";

$dt = new Line(); $dt->A = $A; $dt->B = $B; echo $dt."\n";
