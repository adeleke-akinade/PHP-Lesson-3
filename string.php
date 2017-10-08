<?php

function print_value($value) {
  print '<p>' . $value . '</p>';
}

// ********** Single quote syntax **********
print '<h3>Single quote syntax</h3>';
$number = 2000;
$var = 'The number is ' . $number;
print_value($var);

// ********** Double quote syntax **********
print '<h3>Double quote syntax</h3>';
$var = "Strings created with double quotes interpret escape sequences such as newline \n. This will be on a new line.
 Carriage return \r.
 Horizontal tab \t.
 vertical tab \v.
 escape \e.
 form feed \f.
 backslash \\.
 dollar sign \$.
 double quote \".";
print_value($var);

$array = array(1, 2, 3, 'car' => 'Bentley');

$var = "When within double quotes, strings can parse array values like so $array[0] {$array['car']}";
print_value($var);

$var = "I lost the {$array['car']}'s key fob.'";
print_value($var);

$food = 'Cheese cake';
// Enclosing the variable within braces explicitly specifies the end of the name.
$var = "He ate too many {$food}s";
print_value($var);

class Foo {
  public $foo;
  public $bar;

  function __construct() {
    $this->foo = 'foo';
    $this->bar = array('bar1', 'bar2', 'bar3');
  }
}

$foo = new foo();
// Parsing object properties is similar to parsing array values
$var = "When using double quotes you can also parse object properties like so $foo->foo";
print_value($var);

$var = "Parsing an array inside of an class property requires braces, {$foo->bar[0]}, {$foo->bar[1]}, {$foo->bar[2]}";
print_value($var);

// ********** Heredoc syntax (heredocs behave the same as double quoted strings without the quotes) **********
print '<h3>Heredoc quote syntax</h3>';
$var = <<<EOT
This is a string created using the heredoc syntax.
EOT;
print_value($var);

$var = <<<EOT
You can parse variables within heredocs like so $food
EOT;
print_value($var);

$var = <<<EOT
How many {$food}s did the man eat?
EOT;
print_value($var);

// This works just like double quotes.
$var = <<<EOT
When using double quotes you can also parse object properties like so $foo->foo
EOT;
print_value($var);

$var = <<<EOT
$var = "Parsing an array inside of an class property requires braces, {$foo->bar[0]}, {$foo->bar[1]}, {$foo->bar[2]}";
EOT;
print_value($var);

// ********** Nowdoc syntax (nowdocs behave the same as single quoted strings without the quotes) **********
print '<h3>Nowdoc quote syntax</h3>';
$var = <<<'EOT'
Nowdocs behave the same as single quoted strings without the quotes meaning that variables are not parsed.
EOT;
print_value($var);
$var = <<<'EOT'
Any variables within this string will not be parsed. $food, $foo->foo, $foo-bar[0] and escape characters such as newline will
not be interpreted \n \f \v.
EOT;
print_value($var);

// Universal
print '<h3>Universal</h3>';
// Whichever syntax you use, you can access individual string characters using a zero-based offset.
$var = 'WORD: A simple string created using single quotes';
print_value($var[0]);

$var = "WORD: A simple string created using double quotes";
print_value($var[1]);

$var = <<<EOT
WORD: A simple string created using heredoc syntax;
EOT;
print_value($var[2]);

$var = <<<EOT
WORD: A simple string created using nowdoc syntax;
EOT;
print_value($var[3]);

// String conversion
print '<h3>String conversion</h3>';
// You can convert a value to string using the (string) cast or strval() function. However, string conversion is automatically
// done when in the scode of an expression where a string is needed.
$var = 1;
print_value(gettype($var));
print_value(gettype((string) $var));

// The print function will convert a value to a string meaning the below to instructions are identical.
print_value('TRUE converts to : ' . (string) TRUE);
print_value('TRUE converts to : ' . TRUE);

// If you use a string in an equation that requires a number, the string will be converted into a number if possible.
// If a string begins with a valid number then that number is used, otherwise its value is 0. A valid number is one or
// more digits, optionally preceded by a sign, followed by an optional exponent (the exponent is an 'e' or 'E' followed
// by one or more digits.
$var = array();
$var[] = 1 + "10.5";
$var[] = 1 + "-1.3e3";
@$var[] = 1 + "bob3";
@$var[] = 1 + "10 cats";
@$var[] = 4 + "10.2 oranges";
@$var[] = "10.0 drinks " + 1;
@$var[] = "10.0 sweets " + 1.0;
@$var[] = 1 + "cats";

foreach($var as $item) {
  print_value($item);
}