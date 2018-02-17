<?php
// teszt class to test out the basics of oop
// just some random garbage

class ParentClass{
	public $name ="nevem";
	public $error = "this is the ".__CLASS__." class.";	
	
}

class NewClass extends ParentClass{

	public static $static = 0;
	public static function staticMethod(){
		return self::$static++;
	}

	
	public function __construct($name){
		echo "construct <br>";
		$this->name = $name;
	}
	public function name(){
		return $this->name . '()';
	}	
	public function __toString(){
		echo "toString method: ";
		return $this->error;
	}
	
	public $info ="ez az info";

	public $data = "ez egy property";
	
	public function setProp($newdata){
		$this->data = $newdata;
	}
	public function getProp(){
		return $this->data;
	}	
	
	public function __destruct(){
		echo "destruct <br>";
	}
	
}
/*
$newobject = new NewClass;
var_dump($newobject);
echo $newobject->info;
echo '<br>';
echo $newobject->name;
echo '<br>';
echo $newobject->name();
*/
?>