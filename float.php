<?php

function print_value($value) {
  print '<p>' . ($value) . '</p>';
}

function add_numbers_together($var1, $var2) {
  return $var1 + $var2;
}

function add_numbers_together_with_precision($var1, $var2, $precision) {
  return bcadd($var1, $var2, $precision);
}

function substract_number($var1, $var2) {
  return $var1 + $var2;
}

function substract_number_with_precision($var1, $var2, $precision) {
  return bcsub($var1, $var2, $precision);
}

print_value(round((0.1+0.7)*10));
print_value(floor((0.1+0.7)*10));
print_value((0.1+0.7)*10);
print_value(gettype((0.1+0.7)*10));
print_value(add_numbers_together_with_precision(0.1, 0.7, 1)*10);
print_value(gettype((int) add_numbers_together_with_precision(0.1, 0.7, 1)*10));

$value = 1/3;
print_value($value);
print_value($value);
print_value(gettype(0.1));
print_value(gettype(1));
print_value(($value == 1) ? 'true' : ' false');

$result = add_numbers_together(0.1, 0.2);
print_value($result);
print_value(($result == 0.3) ? 'true' : ' false');

$result = add_numbers_together_with_precision(0.1, 0.2, 1);
print_value($result);
print_value(($result == 0.3) ? 'true' : ' false');

$result = substract_number(8, 6.4);
print_value($result);
print_value(($result == 1.6) ? 'true' : ' false');

$result = substract_number_with_precision(8, 6.4, 1);
print_value($result);
print_value(($result == 1.6) ? 'true' : ' false');