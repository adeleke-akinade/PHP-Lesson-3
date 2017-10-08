<?php

require_once 'helpers.php';

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

// Using a generator uses less memory than creating an array and looping through it as the array will be stored in memory
// where as the generator only needs to create an iterator object and track the current state of the generator internally.
display_value('h3', 'Using a Generator.');
function gen($start, $end, $step): iterable {
  if ($start < $end) {
    for ($i = $start; $i < $end; $i += $step) {
      yield $i;
    }
  }
  else {
    throw new LogicException('Start must be less than end.');
  }
}

foreach(gen(1, 8, 1) as $value) {
  display_value('p', $value);
}

// A class that implements or extends can broaden method parameters by changing them from array or Travesable to iterable types
// and can narrow return types from iterable to array or Traversable.
display_value('h3', 'Traversable.');
interface Example {
  public function method(array $array): iterable; // Array argument.
}

class ExampleImplementation implements Example {
  public function method(iterable $iterable ): array {
    // Parameter broadened and return type narrowed.
  }
}

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