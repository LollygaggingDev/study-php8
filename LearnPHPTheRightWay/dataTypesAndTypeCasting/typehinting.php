<?php 

/* Data Types and Type Casting */

# 4 Scalar Types
    # bool 
    # int
    # float
    # string


# 4 Compound Types
    # array
    # object
    # callable
    # iterable

# 2 Special Types
    # resource 
    # null


// function sum($x, $y) {
//     return $x + $y;
// }


declare(strict_types=1);

function sum(int $x, int $y) {
    return $x + $y;
}


// $targetSum = sum(2, 2.5); //Fatal error