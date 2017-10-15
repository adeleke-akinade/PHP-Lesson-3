<?php

require 'menu.php';
require 'helpers.php';

// ********** Single quote syntax **********
display_value('h3', 'Single quote syntax');
$number = 2000;

$var = 'The number is $number';
display_value('p', $var);

$var = 'The number is ' . $number;
display_value('p', $var);

$var = 'Strings created with single quotes do not interpret escape sequences apart from \' and \\. 
The remaining are treated as plain text Carriage return \r, Horizontal tab \t, vertical tab \v, 
escape \e, form feed \f, dollar sign \$, double quote \".';
display_value('p', $var);

// ********** Double quote syntax **********
display_value('h3', 'Double quote syntax');
$var = "Strings created with double quotes interpret 
escape sequences such as newline \n. This will be on a new line.
 Carriage return \r, Horizontal tab \t, vertical tab \v, escape \e, 
 form feed \f, backslash \\, dollar sign \$, double quote \".";
display_value('p', $var);

$array = array(1, 2, 3, 'car' => 'Bentley');

$var = "When within double quotes, strings can parse array values like so $array[0] {$array['car']}";
display_value('p', $var);

$var = "I lost the {$array['car']}'s key fob.'";
display_value('p', $var);

$food = 'Cheese cake';
// Enclosing the variable within braces explicitly specifies the end of the name.
$var = "He ate too many {$food}s";
display_value('p', $var);

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
display_value('p', $var);

$var = "Parsing an array inside of an class property requires 
braces, {$foo->bar[0]}, {$foo->bar[1]}, {$foo->bar[2]}";
display_value('p', $var);

// ********** Heredoc syntax (heredocs behave the same as double quoted strings without the quotes) **********
display_value('h3', 'Heredoc quote syntax');
$var = <<<EOT
This is a string created using the heredoc syntax.
EOT;
display_value('p', $var);

$var = <<<EOT
You can parse variables within heredocs like so $food
EOT;
display_value('p', $var);

$var = <<<EOT
How many {$food}s did the man eat?
EOT;
display_value('p', $var);

// This works just like double quotes.
$var = <<<EOT
When using double quotes you can also parse object properties like so $foo->foo
EOT;
display_value('p', $var);

$var = <<<EOT
$var = "Parsing an array inside of an class property requires braces, {$foo->bar[0]}, {$foo->bar[1]}, {$foo->bar[2]}";
EOT;
display_value('p', $var);

// ********** Nowdoc syntax (nowdocs behave the same as single quoted strings without the quotes) **********
display_value('h3', 'Nowdoc quote syntax');
$var = <<<'EOT'
Nowdocs behave the same as single quoted strings without the quotes meaning that variables are not parsed.
EOT;
display_value('p', $var);
$var = <<<'EOT'
Any variables within this string will not be parsed. $food, $foo->foo, $foo-bar[0] and 
escape characters such as newline will
not be interpreted \n \f \v.
EOT;
display_value('p', $var);

// Universal
display_value('h3', 'Universal');
// Whichever syntax you use, you can access individual string characters using a zero-based offset.
$var = 'WORD: A simple string created using single quotes';
display_value('p', $var[0]);

$var = "WORD: A simple string created using double quotes";
display_value('p', $var[1]);

$var = <<<EOT
WORD: A simple string created using heredoc syntax;
EOT;
display_value('p', $var[2]);

$var = <<<'EOT'
WORD: A simple string created using nowdoc syntax;
EOT;
display_value('p', $var[3]);

// String conversion
display_value('h3', 'String conversion');
// You can convert a value to string using the (string) cast or strval() function. However, string conversion is automatically
// done when in the scope of an expression where a string is required.
$var = 1;
display_value('p', var_export($var, true) . ': ' . gettype($var));
display_value('p', var_export((string) $var, true) . ': ' . gettype((string) $var));

// The print function will convert a value to a string meaning the below two instructions are identical.
print '<p>TRUE converts to: ' . (string) TRUE . '</p>';
//print '<p>TRUE converts to: ' . TRUE . '</p>';

// If you use a string in an equation that requires a number, the string will be converted
// into a number if possible. If a string begins with a valid number then that number is used,
// otherwise its value is 0. A valid number is one or more digits, optionally preceded by a sign,
// followed by an optional exponent (the exponent is an 'e' or 'E' followed by one or more digits).
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
  display_value_and_type('p', $item);
}