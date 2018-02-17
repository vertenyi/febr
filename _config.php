<?php
// this is the config file it contains data 
// that changes from server to server
// so this is the first to get tuched during installation


// i had problems with the visibility of ini files
// on different webhosts,
// the temporary solution is this _config.php file
// it is included directly in the index.php for now
// require_once '_config.php'; 
// from there we can use data trough static calls like this:
// Config::$title;


class Config {
    static $host = '127.0.0.1';
    static $path  = '/febr/';
	static $title = 'PHP:Hangover';
	static $title_long = 'PHP:Hangover, Informatikai témájú anyagok publikálásához';
    static $admin  = 'PHP:Hangover';
    static $admin_email  = 'vertenyi@gmail.com';


  //  static $dbHost = 'localhost';
  //  static $dbUsername = 'user';
  //  static $dbPassword  = 'pass';
}
?>