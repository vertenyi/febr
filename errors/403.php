
<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
<meta http-equiv="refresh" content="10; url=index.php" />
	<title>403 - PHP:Hangover</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">	
</head>
<body>
<nav>
<?php include_once('../views/menu.php'); 
$req = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
?>
</nav>
<main>
<h2>403 - ERROR</h2>
<p> ... <i> the requested url was: <b><?=$req?></b> </i> </p>
	<h3>I’m sorry <b>Dave</b>,</h3>
	<p>I’m afraid I can’t do that.</p>
	<p>There was some error, mainly it seems 403 - ERROR.</p>
	<p>Perhaps it's my fault.</p>
	<p>I saved this in an error log, just in case.</p>
	<p>And now I will bring you back to the start.</p>
<input type="text" id="cd" value="10" size="2">
<script>
	i=10;
	setInterval(function(){ document.getElementById('cd').value = --i; }, 1000);
		

</script>
<?php // include_once('../views/footer.php'); 
 $err=403;
 include_once('../errors/error_log.php'); ?>

</body>
</html>