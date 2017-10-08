<?php

function print_value($value) {
  print '<p>' . $value . '</p>';
}

function loop_through_and_print_array_values($array) {
  foreach($array as $value) {
    if(is_array($value)) {
      loop_through_and_print_array_values($value);
    }
    else {
      print '<p>' . $value . '</p>';
    }
  }
}

function loop_through_and_print_array_values_and_keys($array) {
  foreach($array as $key => $value) {
    if(is_array($value)) {
      loop_through_and_print_array_values_and_keys($value);
    }
    else {
      print '<p>' . $key . ' => ' . $value . '</p>';
    }
  }
}

function loop_through_and_print_value_type($array) {
  foreach($array as $value) {
    if(is_array($value)) {
      loop_through_and_print_value_type($value);
    }
    else {
      print '<p>' . gettype($value) . '</p>';
    }
  }
}

// Standard way of creating an array.
print '<h3>Standard array syntax.</h3>';
print_value('Single-line array.');
$array = array(1, 2, 3, 4, 5);
var_dump($array);
loop_through_and_print_array_values($array);
loop_through_and_print_array_values_and_keys($array);

// In PHP 5.4 and later you can also use the shorthand array syntax.
print '<h3>Shorthand array syntax available as of PHP 5.4.</h3>';
print_value('Single-line array.');
$array = [1, 2, 3, 4, 5];
loop_through_and_print_array_values($array);

// In multi-line arrays, it's a best practice to add a trailing comma as this makes it easier to add additional items.
$array = [
  1,
  2,
  3,
  4,
  5,
];

// You can initialise an empty array and then insert items later.
print_value('Initialising an empty array and inserting items afterwards.');
$array = [];
$array[] = 1;
$array[] = 2;
$array[] = 3;
$array[] = 4;
$array['car'] = 5;
loop_through_and_print_array_values_and_keys($array);

// Arrays keys can either be an integer or a string. By default, they are integers starting from 0.
print_value($array[0]);

// You can initialise an array and insert additional items afterwards.
print_value('Initialising an empty array and inserting items afterwards.');
$array = [1, 2, 3];
$array[] = 4;
$array['animal'] = 'dog';
$array['age'] = '5';
$array['type'] = 'poodle';
loop_through_and_print_array_values_and_keys($array);

// Example of array with string keys.
print '<h3>Array with string keys.</h3>';
$array = [
  'name' => 'Bob',
  'age' => '20',
  'occupation' => 'Dentist',
];

loop_through_and_print_array_values_and_keys($array);

// You can access individual array items.
print_value($array['name']);
print_value($array['occupation']);

// String keys with valid decimal integers will be cast to the integer type, unless preceded with a + sign.
print '<h3>Array keys cast from string to integer.</h3>';
$array = ['0' => 'This items array key is an integer.', '08' => 'This items array key is a string.'];

// The first item in the array created above will be stored under the key 0 not '0'. However, Because PHP does the same
// conversion when accessing items, you can access the array key 0 with '0' meaning both lines below are effectively the same
print_value($array[0]);
print_value($array['0']);

$keys = array_keys($array);
loop_through_and_print_value_type($keys);

// Floats used as keys are cast to integers meaning that the fractional part is removed so 1.2 will become 1.
print '<h3>Array keys cast from float to integer.</h3>';
$array = [1.2 => 'This items key will be cast to an integer'];
print_value($array[1]);
$keys = array_keys($array);
loop_through_and_print_value_type($keys);

// Boolean TRUE is cast to int 1 and FALSE is cast to int 0.
print '<h3>Array keys cast from boolean to integer.</h3>';
$array = [
  TRUE => 'This items key will be cast to an integer with a value of 1.',
  FALSE => 'This items key will be cast to an integer with a value of 0.'
];
loop_through_and_print_array_values_and_keys($array);
$keys = array_keys($array);
loop_through_and_print_value_type($keys);

// NULL is cast to an empty string
print '<h3>Array keys cast from NULL to empty string.</h3>';
$array = [
  NULL => 'This items key will be cast to an empty string.',
];
loop_through_and_print_array_values_and_keys($array);
$keys = array_keys($array);
loop_through_and_print_value_type($keys);

// Array indexing.
print '<h3>Array indexing.</h3>';
// If you explicitly specify a numeric array key, the implicit numeric key position will continue from that number.
$array = [1, 2, 3, '7' => 4, 5, 6, 7, 8];
loop_through_and_print_array_values_and_keys($array);

$array = [1, 2, 3, 'car' => 'ford', 5, 6, 7];
loop_through_and_print_array_values_and_keys($array);