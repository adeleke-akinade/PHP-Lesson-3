<?php

require 'menu.php';
require 'helpers.php';

function simple_call_back_function($value) {
  display_value('p', $value);
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
      call_user_func(array('C', "$function"), 'Inside of: ');
    }
  }

  protected function function_a($value = '') {
    display_value('p', $value . __METHOD__);
  }

  private function function_b($value = '') {
    display_value('p', $value . __METHOD__);
  }
}

// Execute a simple callback function.
display_value('h3', 'A simple callback function');
call_user_func('simple_call_back_function', 'An example of a simple callback function.');

// Execute a callback function within a class.
display_value('h3', 'A callback function within a class');
$class_a = new A;
$result = call_user_func(array($class_a, 'callback_function_within_class'), 2);
display_value('p', $result);

$result = call_user_func(array($class_a, 'callback_function_within_class'));
display_value('p', $result);

// Execute a callback function within a class statically.
display_value('h3', 'A static callback function within a class');
$var = 'This will be removed. An example of a static callback function.';
$result = call_user_func(array('B', 'static_callback_function_within_class'), $var);
display_value('p', $result);

// This syntax is available since PHP 5.2.3
$var = 'This will be removed. Alternative syntax for executing a static callback function.';
$result = call_user_func('B::static_callback_function_within_class', $var);
display_value('p', $result);

// Execute protected and private callback functions from within the class they are defined.
display_value('h3', 'Protected and private callback functions executed within the class they are defined.');
$class_c = new C;

// This will cause an error as function_a is protected so can only be accessed within the class it was defined or child
// classes of the class in which it was defined.
//call_user_func(array($class_c, 'function_a'), 'This will cause an error.');

// You can execute a callback function for every item in an array using the array_map function
display_value('h3', 'Execute callback functions within an array using array_map.');
$square = function($number) {
  return pow($number, $number);
};

$numbers = range(1, 10);
display_value('p', implode(' ', array_map($square, $numbers)));