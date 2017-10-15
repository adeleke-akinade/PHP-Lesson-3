<?php

require 'menu.php';
require 'helpers.php';

// Three ways a variable can be NULL.

// By setting it's value to the NULL constant.
$var1 = NULL;
var_dump($var1);

// By initialising it without a value.
$var2;
@var_dump($var2);

// By un-setting it using the unset() function.
$var3 = 'String';
unset($var3);
@var_dump($var3);

// Testing if a variable is NULL.
$array = array($var1, '', array(), FALSE, TRUE, 0, '0');
foreach ($array as $value) {
  if (is_null($value)) {
    display_value('p', 'is_null: ' . var_export($value, true) . ' is equal to NULL and of the same type.');
  }
  else {
    display_value('p', 'is_null: ' . var_export($value, true) . ' is not of the same type as NULL.');
  }

  if ($value == NULL) {
    display_value('p', '==: ' . var_export($value, true) . ' is equal to NULL.');
  }
  else {
    display_value('p', '==: ' . var_export($value, true) . ' is not equal to NULL.');
  }

  if ($value === NULL) {
    display_value('p', '===: ' . var_export($value, true) . ' is equal to NULL and of the same type.');
  }
  else {
    display_value('p', '===: ' . var_export($value, true) . ' is not of the same type as NULL.');
  }
}