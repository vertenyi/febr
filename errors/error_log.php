<?php
// this script saves an error log, mainly for 404
// file_get_contents() This function is the preferred way 
// to read the contents of a file into a string. 
// Because it will use memory mapping techniques, 
// if this is supported by the server, to enhance performance.
// so this way no need to open and close file, 
// but in other parts of the program 
// maybe I'll use the old fashioned way
// also if I make a general request log, it won't be reversed... 


if(!isset($err)){$err='???';}

$err_write = date("Y-m-d l") .','.date("h:i:s") .
', '.$err.
', '.$_SERVER['REQUEST_METHOD'].
', '.$_SERVER['REMOTE_ADDR'].
', '. 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']. 
' ';

$file= 'error_log.csv';
$err_bup = file_get_contents($file);	
$content = $err_write . PHP_EOL . $err_bup;   // I wanted to reverse the order i store
file_put_contents($file,$content);  


echo '<hr><pre>'.$err_write.'</pre>';
?>