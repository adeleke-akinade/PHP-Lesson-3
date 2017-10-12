<?php

require 'menu.php';
require 'helpers.php';

// Using an iterable parameter type.
// You can use NULL or an empty array as a default parameter type.
display_value('h3', 'Using an iterable parameter type example.');
function foo(iterable $iterable) {
  foreach ($iterable as $value) {
    display_value('p', $value);
  }
}
$array = range(1, 5);
foo($array);

// If you try to use a value that is not traversable you will get a type error.
//foo('This will cause an error');

// Iterable can also be used as a return type to indicate that a function returns an iterable value.
display_value('h3', 'Using iterable to indicate return type.');
function bar(): iterable {
  return [
    'Audi',
    'A5',
    'blue',
    '2015',
    '£6000',
  ];
}
foreach(bar() as $value) {
  display_value('p', $value);
}

// Implementing the IteratorAggregate interface
display_value('h3', 'Implementing the IteratorAggregate interface.');
class A implements IteratorAggregate {
  public $var1 = '1';
  public $var2 = '2';
  public $var3 = '3';
  public $var4 = '4';
  public $var5 = '5';

  public function getIterator() {
    return new ArrayIterator($this);
  }
}

$obj_a = new A;
foreach($obj_a as $value) {
  display_value('p', $value);
}

// Implementing the Iterator interface
display_value('h3', 'Implementing the Iterator interface.');
class myIterator implements Iterator {
  private $position = 0;
  private $array = array(
    "first element",
    "second element",
    "third element",
    "fourth element",
    "last element",
  );

  public function __construct() {
    $this->position = 0;
  }

  public function rewind() {
    var_dump(__METHOD__);
    $this->position = 0;
  }

  public function current() {
    var_dump(__METHOD__);
    return $this->array[$this->position];
  }

  public function key() {
    var_dump(__METHOD__);
    return $this->position;
  }

  public function next() {
    var_dump(__METHOD__);
    ++$this->position;
  }

  public function valid() {
    var_dump(__METHOD__);
    return isset($this->array[$this->position]);
  }
}

$iterator = new myIterator;

foreach($iterator as $key => $value) {
  display_value('p', $key . ' => ' . $value);
}