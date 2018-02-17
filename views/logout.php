<?php
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
echo '<h3>Kijelentkezve.</h3>';
require_once('views/login.php');}

?>