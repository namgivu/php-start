<?php

if (empty(0)) { //we don't need to call isset() here
    echo 333;
}
if (empty($someUndefined)) { //we don't need to call isset() here
    echo 122;
}
