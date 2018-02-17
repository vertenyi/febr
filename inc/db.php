<?php 
// this will be the basis for the mysql calls. 
// I'll make a separate file and class for each table.
// the first one is the db connection class

class dbcon{
	private $host; 
	private $user;
	private $pass;
	private $dbname;
	protected function connect(){
		$this->host = "localhost"; 		// these 
		$this->user = "phphangover"; 	// will go out
		$this->pass = "phphangover"; 	// to a seperate
		$this->dbname = "phphangover"; 	// config file... 
		$conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
		mysqli_set_charset($conn,"utf8");
		return $conn;
	}
	public function sanitize($string){
		$connect=$this->connect();
		return mysqli_real_escape_string($connect, $string);
	}	
}

	// CRUD (Create, Read, Update, Delete)

class db extends dbcon{
	// Create
	protected function qC($table,$cols,$values){
		$sql = "INSERT INTO $table ($cols)
				VALUES ($values);";
		$result = $this->connect()->query($sql);
	}
	// Read
	protected function qR($arg,$from){
		$sql = "SELECT $arg FROM $from";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		if ($numRows > 0){
			while ($row = $result->fetch_assoc()){
				$data[] = $row;
			}
			return $data;
		}	
	}
	protected function qR1($arg,$from,$where){
		$sql = "SELECT $arg FROM $from WHERE $where ";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		if ($numRows > 0){
			while ($row = $result->fetch_assoc()){
				$data = $row;
			}
			return $data;
		}	
	}
	protected function qRwo($arg,$from,$where,$order){
		if (strlen($order)>1){
			$order = 'ORDER BY '.$order;
		}else{$order='';}
		$sql = "SELECT $arg FROM $from WHERE $where $order";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		if ($numRows > 0){
			while ($row = $result->fetch_assoc()){
				$data[] = $row;
			}
			return $data;
		}	
	}
	
	// Update (I use Replace Into instead) not finished
	protected function qU($set,$table,$where){
		$sql = "UPDATE $table SET $set WHERE $where";
		$result = $this->connect()->query($sql);
	}
	protected function qU1($set,$table,$where){
		$sql = "UPDATE $table SET $set WHERE $where";
		$result = $this->connect()->query($sql);
	}
	// Delete
	protected function qD($table,$col,$val){
		$sql = "DELETE FROM $table
				WHERE $col = $val;";
		$result = $this->connect()->query($sql);
		return $result;
	}
	// sometimes I use REPLACE INTO instead of Insert and update...
	protected function LOFT($table){
		$sql = "REPLACE INTO $table FROM $from";
		if ($this->connect()->query($sql) === TRUE){ /* Siker! */ }
		else{ /* error message here */ }

	}
}



// THIS SHOULDN'T BE HERE, THIS SHOULDN'T EXIST!! - but it does
// I broke this into CRUD
class God extends dbcon{
	protected function q($sql){
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		if ($numRows > 0){
			while ($row = $result->fetch_assoc()){
				$data[] = $row;
			}
			return $data;
		}
	}
	public function preq($sql){
		echo '<pre>'.print_r($this->q($sql)).'</pre>';		// vardump
	}
}




?>