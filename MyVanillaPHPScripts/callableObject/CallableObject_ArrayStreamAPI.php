<?php

class MyPredicate
{
    public function __invoke($x)
    {
        return $x > 5;
    }
}

class PrintFunctor
{
    public function __invoke($x)
    {
        echo $x . ' ';
    }
}

class ArrayStream
{

    private $array;

    public function __construct($array)
    {
        $this->array = $array;
    }

    public function foreach(callable $c): ArrayStream
    {
        foreach ($this->array as $value) {
            $c($value);
        }
        return $this;
    }

    public function filter(callable $predicate)
    {
        $newArray = [];
        foreach ($this->array as $value) {
            if ($predicate($value)) {
                array_push($newArray, $value);
            }
        }
        $this->array = $newArray;
        return $this;
    }
}

$a = [1, 2, 4, 5, 6, 7, 8, 9, 10];

$x2Predicate = function ($x) {
    return $x <= 7;
};

$stream = new ArrayStream($a);

$stream
    ->filter(new MyPredicate())
    ->filter($x2Predicate)
    ->forEach(new PrintFunctor());
