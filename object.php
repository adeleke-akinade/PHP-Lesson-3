<?php

require 'menu.php';
require 'helpers.php';

// Class definition.
class ExampleClass {
  public $public_property; // Public variables is accessible anywhere.
  protected $protected_property; // Protected variables is accessible from within this class and classes that extend this class.
  private $private_property; // Private variables are accessible within this class only.

  public function __construct($value)
  {
    $this->public_property = $value;
  }

  public function setProperty($value) {
    $this->public_property = $value;
  }

  public function getProperty() {
    return $this->public_property;
  }

  public function displayProperty() {
    display_value('p', $this->public_property);
  }
}

// Extending a class.
class ChildExampleClass extends ExampleClass {
  public function __construct()
  {
    $this->protected_property = 'Initial value';
  }

  public function setProperty($value) {
    $this->protected_property = $value;
  }

  public function getProperty() {
    return $this->protected_property;
  }

  public function displayProperty() {
    display_value('p', $this->protected_property);
  }
}

// Extending a class.
class DescendantExampleClass extends ChildExampleClass {

}

// To create an object you must instantiate a class.
display_value('h3', 'Example class');
$example_class = new ExampleClass('Initial value');
var_dump($example_class);
$example_class->displayProperty();
$example_class->setProperty('New value');
$var = $example_class->getProperty();
display_value('p', $var);
//display_value('p', $example_class->protected_property); // This will cause a fatal error.
//display_value('p', $example_class->private_property); // This will cause a fatal error.

display_value('h3', 'Child Example class');
$child_example_class = new ChildExampleClass;
var_dump($child_example_class);
$child_example_class->displayProperty();
$child_example_class->setProperty('New value');
$var = $child_example_class->getProperty();
display_value('p', $var);
//display_value('p', $child_example_class->protected_property); // This will cause a fatal error.
//display_value('p', $child_example_class->private_property); // This will cause an undefined property notice.

display_value('h3', 'Descendant Example class');
$descendant_example_class = new DescendantExampleClass;
var_dump($descendant_example_class);
$descendant_example_class->displayProperty();
$descendant_example_class->setProperty('New value');
$var = $descendant_example_class->getProperty();
display_value('p', $var);
//display_value('p', $descendant_example_class->protected_property); // This will cause a fatal error.
//display_value('p', $descendant_example_class->private_property); // This will cause an undefined property notice.

// When you instantiate a class, the __construct method is executed.
// If the class's constructor method has arguments without default values then you must use parenthesis when
// instantiating the class as to pass it the required variables. Otherwise the parenthesis can be omitted.
$class_with_argument = new ExampleClass('Initial value'); // Requires argument so must have parenthesis.
var_dump($class_with_argument);
$class_without_argument = new ChildExampleClass; // Does not require an argument so parenthesis can be omitted.
var_dump($class_without_argument);

// You can create an empty object using PHP's built in stdClass.
display_value('h3', 'Empty object');
$std_class = new stdClass;
var_dump($std_class);
$std_class->property = 'Foo';
var_dump($std_class);

// If any type is converted to an object, then it creates an object of type stdClass.
display_value('h3', 'Object conversion');
// If a value of NULL is converted to an object then the stdClass created is empty.
display_value('p', 'Converting NULL to an object.');
$obj = (object) NULL;
var_dump($obj);

// If a value other than NULL is converted to an object, the object will contain a member variable named scalar
// containing the value.
display_value('p', 'Converting a value other than NULL to an object.');
$std_class = (object) 'foo';
var_dump($std_class);

$std_class = (object) TRUE;
var_dump($std_class);

// If you convert an array to an object then the array keys/values will become properties and corresponding values.
display_value('p', 'Converting an array to an object.');
$array = array(1, 2, 3, 'car' => 'ford');
$std_class = (object) $array;
var_dump($std_class);

// To access the properties created from numeric keys, you must iterate through the object properties.
foreach($std_class as $key => $value) {
  display_value('p', $key . ': ' . $value);
}

// You can access the properties created from string keys using the property name
display_value('p', $std_class->car);