<?php

require 'menu.php';
require 'helpers.php';

function loop_through_and_display_array_values($array) {
  foreach($array as $value) {
    if(is_array($value)) {
      loop_through_and_display_array_values($value);
    }
    else {
      display_value('p', $value);
    }
  }
}

function loop_through_and_display_array_values_and_keys($array) {
  foreach($array as $key => $value) {
    if(is_array($value)) {
      loop_through_and_display_array_values_and_keys($value);
    }
    else {
      display_value('p', $key . ' => ' . $value);
    }
  }
}

function loop_through_and_display_value_type($array) {
  foreach($array as $value) {
    if(is_array($value)) {
      loop_through_and_display_value_type($value);
    }
    else {
      display_value('p', gettype($value));
    }
  }
}

// Standard way of creating an array.
display_value('h3', 'Standard array syntax.');
display_value('p', 'Single-line array.');
$array = array(1, 2, 3, 4, 5);
loop_through_and_display_array_values($array);
loop_through_and_display_array_values_and_keys($array);

// In PHP 5.4 and later you can also use the shorthand array syntax.
display_value('h3', 'Shorthand array syntax available as of PHP 5.4.');
display_value('p', 'Single-line array.');
$array = [1, 2, 3, 4, 5];
loop_through_and_display_array_values($array);

// In multi-line arrays, it's a best practice to add a trailing comma as this makes it easier to add additional items.
$array = [
  1,
  2,
  3,
  4,
  5,
];

display_value('h3', 'Overwriting array items.');
// Overwriting array items
$array = array(1 => 'one', 2 => 'two', 3 => 'three', 3 => '3');
loop_through_and_display_array_values($array);

// You can initialise an empty array and then insert items later.
display_value('p', 'Initialising an empty array and inserting items afterwards.');
$array = [];
$array[] = 1;
$array[] = 2;
$array[] = 3;
$array[] = 4;
$array['car'] = 5;
loop_through_and_display_array_values_and_keys($array);

// Arrays keys can either be an integer or a string. By default, they are integers starting from 0.
display_value('p', $array[0]);

// You can initialise an array and insert additional items afterwards.
display_value('p', 'Initialising an empty array and inserting items afterwards.');
$array = [1, 2, 3];
$array[] = 4;
$array['animal'] = 'dog';
$array['age'] = '5';
$array['type'] = 'poodle';
loop_through_and_display_array_values_and_keys($array);

// Example of array with string keys.
display_value('h3', 'Array with string keys.');
$array = [
  'name' => 'Bob',
  'age' => '20',
  'occupation' => 'Dentist',
];
loop_through_and_display_array_values_and_keys($array);

// You can access individual array items.
display_value('p', $array['name']);
display_value('p', $array['occupation']);

// String keys with valid decimal integers will be cast to the integer type, unless preceded with a + sign.
display_value('h3', 'Array keys cast from string to integer.');
$array = ['0' => 'This items key is an integer.', '08' => 'This items key is a string.'];

// The first item in the array created above will be stored under the key 0 not '0'. However, Because PHP does the same
// conversion when accessing items, you can access the array key 0 with '0' meaning both lines below are effectively the same
display_value('p', $array[0]);
display_value('p', $array['0']);

$keys = array_keys($array);
loop_through_and_display_value_type($keys);

// Floats used as keys are cast to integers meaning that the fractional part is removed so 1.2 will become 1.
display_value('h3', 'Array keys cast from float to integer.');
$array = [1.2 => 'This items key will be cast to an integer'];
display_value('p', $array[1]);
$keys = array_keys($array);
loop_through_and_display_value_type($keys);

// Boolean TRUE is cast to int 1 and FALSE is cast to int 0.
display_value('h3', 'Array keys cast from boolean to integer.');
$array = [
  TRUE => 'This items key will be cast to an integer with a value of 1.',
  FALSE => 'This items key will be cast to an integer with a value of 0.'
];
loop_through_and_display_array_values_and_keys($array);
$keys = array_keys($array);
loop_through_and_display_value_type($keys);

// NULL is cast to an empty string
display_value('h3', 'Array keys cast from NULL to empty string.');
$array = [
  NULL => 'This items key will be cast to an empty string.',
];
loop_through_and_display_array_values_and_keys($array);
$keys = array_keys($array);
loop_through_and_display_value_type($keys);

// Array indexing.
display_value('h3', 'Array indexing.');
// If you explicitly specify a numeric array key, the implicit numeric key position will continue from that number.
$array = [1, 2, 3, 7 => 4, 5, 6, 7, 8];
loop_through_and_display_array_values_and_keys($array);

$array = [1, 2, 3, 'car' => 'ford', 5, 6, 7];
loop_through_and_display_array_values_and_keys($array);