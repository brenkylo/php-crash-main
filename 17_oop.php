<?php 
/* --- Object Oriented Programming -- */

/*
  From PHP5 onwards you can write PHP in either a procedural or object oriented way. OOP consists of classes that can hold "properties" and "methods". Objects can be created from classes.
*/

class User{//Attributes that belong to a class
  // Properties are just variables that belong to a class.
  // Access Modifiers: public, private, protected
  // public - can be accessed from anywhere
  // private - can only be accessed from inside the class
  // protected - can only be accessed from inside the class and by inheriting classes
  public $name;
  public $email;
  public $password;

  //A constructor is a Method that runs when a object is created
  public function __construct($name, $email, $password){
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
  }

  //OTHER EXAMPLE:
  //A method is A function that belong to a class
  function set_name($name){
    $this->name = $name; //refers to name object
  }
  function get_name(){
    return $this->name; 
  }
}

//Instantiate a user Object

$user1 = new User('Bren', 'bren@gmail.com', 'brenpass');
$user2 = new User('Kylo', 'kylo@gmail.com', 'kylopass');

echo $user1->email;
echo $user2->name;

//Subclass
//Inheritance Using Extends
class Employee extends User{//Extenting for the Class User
  public $title;
  public function __construct($name, $email, $password, $title)
  {
    parent::__construct($name, $email, $password);//run the Constructor from the parent class
    $this->title = $title;
  }
  public function get_title(){
    return $this->title;
  }
}

$employee1 =  new Employee('Camma', 'camma@gmail.com', 'cammapass','Manager');

echo $employee1->get_title();