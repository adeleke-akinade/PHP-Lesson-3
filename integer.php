<?php

function print_value_and_type($value) {
  print '<p>' . $value . ' is of type ' . gettype($value) . '</p>';
}

print '<p>' . (0.1 + 0.2) . '</p>';

print_value_and_type(1234);
print_value_and_type(-1234);
print_value_and_type(01234);
print_value_and_type(0x1234);
print_value_and_type(0b1111);
print_value_and_type(PHP_INT_SIZE);
print_value_and_type(PHP_INT_MAX);
print_value_and_type(PHP_INT_MIN);
print_value_and_type(10000000000000000000);
print_value_and_type('0');
print_value_and_type((int) '0.039');
print_value_and_type(intval('0.039'));
print_value_and_type((int) '10000000000000000000.0');
print_value_and_type((int) 10000000000004532300000001.02);
print_value_and_type((int) 1.0E19);
print_value_and_type((int) TRUE);
print_value_and_type((int) FALSE);