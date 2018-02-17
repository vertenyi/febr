<?php 
// this program was made by Peter Vertenyi, in 2018. 

$php_classes = get_declared_classes(); 
// this was a helper to check classes, only in debug phase


require_once '_config.php'; 

// config is a static class now, 
// i will probably have some method there later

require_once '_inc.php'; 
// include classes, (without this, nothing works, period)

require_once 'inc/chk_login.php'; 
// this is the session start, so it is important that no output comes before this


// i'll have a file/folder handler class, that makes entries
// starting with _ and . invisible... like _config, _inc and .htaccess

require_once('views/header.php');
require_once('views/backstage.php');


// this is my rooting, for now

if(isset($_GET['menu'])){
	require_once('views/'.$_GET['menu'].'.php');
}else{require_once('views/index.php');}


// footer

require_once('views/footer.php');
?>


