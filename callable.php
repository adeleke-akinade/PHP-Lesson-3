<?php

function simple_call_back_function($value) {
  print'<p>' . $value . '</p>';
};

class A {
  public function callback_function_within_class($value = 1) {
    return $value * 10;
  }
}

class B {
  public function static_callback_function_within_class($value = '') {
    return substr($value, 22, strlen($value));
  }
}

class C {
  protected $functions = array('function_a', 'function_b');

  public function __construct() {
    foreach($this->functions as $function) {
      call_user_func(array('C', "$function"), $function);
    }
  }

  protected function function_a($value = '') {
    print '<p>' . $value . '</p>';
  }

  private function function_b($value = '') {
    print '<p>' . $value . '</p>';
  }
}

// Execute a simple callback function.
print '<h3>A simple callback function</h3>';
call_user_func('simple_call_back_function', 'An example of a simple callback function.');

// Execute a callback function within a class.
print '<h3>A callback function within a class</h3>';
$class_a = new A;
$result = call_user_func(array($class_a, 'callback_function_within_class'), 2);
print'<p>' . $result . '</p>';

$result = call_user_func(array($class_a, 'callback_function_within_class'));
print'<p>' . $result . '</p>';

// Execute a callback function within a class statically.
print '<h3>A static callback function within a class</h3>';
$var = 'This will be removed. An example of a static callback function.';
$result = call_user_func(array('B', 'static_callback_function_within_class'), $var);
print'<p>' . $result . '</p>';

$var = 'This will be removed. Alternative syntax for executing a static callback function.';
$result = call_user_func('B::static_callback_function_within_class', $var);
print'<p>' . $result . '</p>';

// Execute protected and private callback functions from within the class they are defined.
print '<h3>Protected and private callback functions executed within the class they are defined.</h3>';
$class_c = new C;

// This will cause an error as function_a is protected so can only be accessed within the class it was defined or child
// classes of the class in which it was defined.
//call_user_func(array($class_c, 'function_a'), 'This will cause an error.');

// You can execute a callback function for every item in an array using the array_map function
print '<h3>Execute callback functions within an array using array_map.</h3>';
$square = function($number) {
  return pow($number, $number);
};

$numbers = range(1, 10);
print '<p>' . implode(' ', array_map($square, $numbers)) . '</p>';