<?php

require 'menu.php';
require 'helpers.php';

display_value_and_type('p', 1234);
display_value_and_type('p', -1234);
display_value_and_type('p', 01234);
display_value_and_type('p', 0x1234);
display_value_and_type('p', 0b1111);
display_value_and_type('p', PHP_INT_SIZE);
display_value_and_type('p', PHP_INT_MIN);
display_value_and_type('p', PHP_INT_MAX);
display_value_and_type('p', 10000000000000000000);
display_value_and_type('p', 9223372036854775808);
display_value_and_type('p', '0');
display_value('p', (int) '0.039');
display_value('p', (integer) '2.03');
display_value('p', (integer) 'String');
display_value('p', intval(TRUE));
display_value('p', (int) FALSE);
display_value('p', (integer) array());
display_value('p', intval(array(1, 2)));