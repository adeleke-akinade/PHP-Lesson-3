<?php

// Class definition.
class ExampleClass {
  public $public_var; // Public variables is accessible anywhere.
  protected $protected_var; // Protected variables is accessible from within this class and classes that extend this class.
  private $private_var; // Private variables are accessible within this class only.

  public function __construct($value)
  {
    $this->public_var = $value;
  }

  public function setVariable($value) {
    $this->public_var = $value;
  }

  public function getVariable() {
    return $this->public_var;
  }

  public function displayVariable() {
    print '<p>' . $this->public_var . '</p>';
  }
}

// Extending a class.
class ExtendedExampleClass extends ExampleClass {
  public function __construct()
  {
    $this->protected_var = 'Initial value';
//    $this->private_var = 'This will error as the variable $private_var is accessible within the class is was defined only.';
  }

  public function setVariable($value) {
    $this->protected_var = $value;
  }

  public function getVariable() {
    return $this->protected_var;
  }

  public function displayVariable() {
    print '<p>' . $this->protected_var . '</p>';
  }
}

// To create an object you must instantiate a class.
print '<h3>Example class</h3>';
$example_class = new ExampleClass('Initial value');
var_dump($example_class);
$example_class->displayVariable();
$example_class->setVariable('New value');
$example_class->displayVariable();
$var = $example_class->getVariable();

print '<h3>Extended Example class</h3>';
$extended_example_class = new ExtendedExampleClass();
var_dump($extended_example_class);
$extended_example_class->displayVariable();
$extended_example_class->setVariable('New value');
$extended_example_class->displayVariable();
$var = $extended_example_class->getVariable();

// This will error as the variable $protected_var is accessible from within the class it was defined and classes that
// extend that class only.
//print $extended_example_class->protected_var;

// When you instantiate a class, the __construct method is executed.
// If the class's constructor method has arguments without default values then you must use parenthesis when instantiating
// the class as to pass it the required variables. Otherwise the parenthesis is optional.
$class_with_required_variables = new ExampleClass('Initial value'); // Requires argument so must have parenthesis.
var_dump($class_with_required_variables);
$class_with_required_variables = new ExtendedExampleClass; // Does not require an argument so parenthesis can be omitted.
var_dump($class_with_required_variables);


// You can create an empty object using PHP's built in stdClass.
print '<h3>Empty object</h3>';
$std_class = new stdClass;
var_dump($std_class);

// If any type, apart from an array or an object, is converted to an object, then it creates an object of type stdClass.
print '<h3>Object conversion</h3>';
// If a value of NULL is converted to an object then the stdClass created is empty.
print '<p>Converting NULL to an object.</p>';
$obj = (object) NULL;
var_dump($obj);

// If a other value is converted to an object, the object will contain a member variable named scalar containing the value.
print '<p>Converting a value other than NULL to an object.</p>';
$std_class = (object) 'foo';
var_dump($std_class);

$std_class = (object) TRUE;
var_dump($std_class);

// If you convert an array to an object then the array keys/values will become properties and corresponding values.
print '<p>Converting a value other than NULL to an object.</p>';
$array = array(1, 2, 3, 'car' => 'ford');
$std_class = (object) $array;
var_dump($std_class);

// To access the properties created from numeric keys, you must iterate through the object properties.
foreach($std_class as $key => $value) {
  print '<p>' . $key . ': ' . $value . '</p>';
}

// You can access the properties created from string keys using the property name
print '<p>' . $std_class->car . '</p>';