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
display_value('p', '0.039 casts to ' . (int) '0.039');
display_value('p', '2.03 casts to ' . (integer) '2.03');
display_value('p', 'String casts to ' . (integer) 'String');
display_value('p', 'TRUE casts to ' . intval(TRUE));
display_value('p', 'FALSE casts to ' . (int) FALSE);
display_value('p', 'array() casts to ' . (integer) array());
display_value('p', 'array(1, 2) casts to ' . intval(array(1, 2)));