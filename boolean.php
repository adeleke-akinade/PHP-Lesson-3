<?php

function loose_comparison($value) {
  print '<p>Loose comparison: ';
  if ($value) {
    print '$value is true.';
  }
  else {
    print '$value is false.';
  }
  print '</p>';
}

function strong_comparison($value) {
  print '<p>Strong comparison: ';
  if ($value === TRUE) {
    print '$value is true.';
  }
  elseif($value === FALSE) {
    print '$value is false.';
  }
  else {
    print '$value is of type ' . gettype($value);
  }
  print '</p>';
}

function type_cast_to_boolean($value) {
  var_dump($value);
  if ((bool) $value) {
    print ' casts to TRUE';
  }
  else {
    print ' casts to FALSE';
  }
}

print '<h3>TRUE and FALSE</h3>';
loose_comparison(TRUE);
loose_comparison(FALSE);

strong_comparison(TRUE);
strong_comparison(FALSE);

// Example of expressions that evaluate to TRUE or FALSE.
print '<h3>Expression that evaluate to TRUE or FALSE</h3>';
$date_time = getdate();
$current_hour_of_the_day = $date_time['hours'];
if ($current_hour_of_the_day < 12) {
  print '<p>Good morning.</p>';
}
else {
  print '<p>Good afternoon.</p>';
}

print '<h3>0 and 1</h3>';
loose_comparison(0);
loose_comparison(1);

strong_comparison(0);
strong_comparison(1);


print "<h3>'0' and '1'</h3>";
loose_comparison('0');
loose_comparison('1');

strong_comparison('0');
strong_comparison('1');

// Type casting to boolean.
print '<h3>Type casting.</h3>';
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