<?php

require 'menu.php';
require 'helpers.php';

function loose_comparison($value) {
  if ($value) {
    $result = '$value is true.';
  }
  else {
    $result = '$value is false.';
  }
  display_value('p', 'Loose comparison: ' . $result);
}

function strong_comparison($value) {
  if ($value === TRUE) {
    $result = '$value is true.';
  }
  elseif($value === FALSE) {
    $result = '$value is false.';
  }
  else {
    $result = '$value is of type <i>' . gettype($value) . '</i>';
  }
  display_value('p', 'Strong comparison: ' . $result);
}

function type_cast_to_boolean($value) {
  if ((bool) $value) {
    display_value('p', 'casts to TRUE');
  }
  else {
    display_value('p', 'casts to FALSE');
  }
}

display_value('h3', 'TRUE and FALSE');
loose_comparison(TRUE);
loose_comparison(FALSE);

strong_comparison(TRUE);
strong_comparison(FALSE);
strong_comparison('Neither');

// Example of expressions that evaluate to TRUE or FALSE.
display_value('h3', 'Expression that evaluate to TRUE or FALSE');
$date_time = getdate();
$current_hour_of_the_day = $date_time['hours'];
if ($current_hour_of_the_day < 12) {
  display_value('p', 'Good morning.');

}
else {
  display_value('p', 'Good afternoon.');
}

display_value('h3', '0 and 1');
loose_comparison(0);
loose_comparison(1);

strong_comparison(0);
strong_comparison(1);

display_value('h3', "'0' and '1'");
loose_comparison('0');
loose_comparison('1');

strong_comparison('0');
strong_comparison('1');

// Type casting to boolean.
display_value('h3', "Type casting.");
type_cast_to_boolean("");
type_cast_to_boolean(NULL);
type_cast_to_boolean(0);
type_cast_to_boolean('0');
type_cast_to_boolean(array());
type_cast_to_boolean(1);
type_cast_to_boolean('1');
type_cast_to_boolean(-2);
type_cast_to_boolean("foo");
type_cast_to_boolean(2.3e5);
type_cast_to_boolean(array(12));
type_cast_to_boolean("false");