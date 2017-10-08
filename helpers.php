<?php

function display_value($tag, $value) {
  print "<$tag>$value</$tag>";
}

function display_value_and_type($tag, $value) {
  print "<$tag>$value is of type {gettype($value)}</$tag>";
}