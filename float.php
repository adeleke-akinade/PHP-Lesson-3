<?php

require 'menu.php';
require 'helpers.php';

function add_numbers_together($var1, $var2) {
  return $var1 + $var2;
}

function add_numbers_together_with_precision($var1, $var2, $precision) {
  return bcadd($var1, $var2, $precision);
}

function substract_number($var1, $var2) {
  return $var1 - $var2;
}

function substract_number_with_precision($var1, $var2, $precision) {
  return bcsub($var1, $var2, $precision);
}

display_value('h3', 'Float types can not be trusted for preciseness.');
display_value('p', '0.1+0.7)*10: ' . round((0.1+0.7)*10));
display_value('p', '0.1+0.7)*10: ' . floor((0.1+0.7)*10));
display_value('p', '0.1+0.7)*10: ' . (0.1+0.7)*10);
display_value('p', '0.1+0.7)*10: ' . gettype((0.1+0.7)*10));
display_value('p', '0.1+0.7)*10: ' . add_numbers_together_with_precision(0.1, 0.7, 1)*10);
display_value('p', '0.1+0.7)*10: ' . gettype(add_numbers_together_with_precision(0.1, 0.7, 1)*10));

display_value('h3', 'Add numbers together.');
$result = add_numbers_together(0.1, 0.2);
display_value('p', $result);
display_value('p', ($result == 0.3) ? 'true' : 'false');

display_value('h3', 'Add numbers together with precision.');
$result = add_numbers_together_with_precision(0.1, 0.2, 1);
display_value('p', $result);
display_value('p', ($result == 0.3) ? 'true' : ' false');

display_value('h3', 'Subtract numbers.');
$result = substract_number(8, 6.4);
display_value('p', $result);
display_value('p', ($result == 1.6) ? 'true' : ' false');

display_value('h3', 'Subtract numbers with precision.');
$result = substract_number_with_precision(8, 6.4, 1);
display_value('p', $result);
display_value('p', ($result == 1.6) ? 'true' : ' false');