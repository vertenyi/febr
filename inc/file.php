<?php 
// so, even if file_get_contents seems easier, 
// and feels more natural, i decided to
// sty with the open/close file for this class

class File_handler{
	// gets file content as a string
	protected function getFile($filename){
		$myfile = fopen($filename, "r") or die("Unable to open file!");
		$ret = fread($myfile,filesize($filename));
		fclose($myfile);
		return $ret;
	}
	public function pre($filename){
		echo '<pre>'.$this->getFile($filename).'</pre>';
	}
}

class Errorlog extends File_handler{
	// get contents of the error log, and immediately prints out
	public function __construct(){
		$this->pre('errors/error_log.csv');
	}
}



?>