
<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
<meta http-equiv="refresh" content="10; url=index.php" />
	<title>404 - PHP:Hangover</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">	
</head>
<body>
<nav>
<?php include_once('../views/menu.php'); 
$req = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
?>
</nav>
<main>
<img src="errors/hal.png" style="float: left; max-height: 100%;">
<p> ... <i> the requested url was: <b><?=$req?></b> </i> </p>
	<h3>I’m sorry <b>Dave</b>,</h3>
	<p>I’m afraid I can’t do that.</p>
	<p>The Page You requested doesn't seems to exist any more.</p>
	<p>Perhaps it never did.</p>
	<p>I saved this in an error log, just in case.</p>
	<p>And now I will bring you back to the start.</p>
<input type="text" id="cd" value="10" size="2">
<script>
	i=10;
	setInterval(function(){ document.getElementById('cd').value = --i; }, 1000);
		

</script>
<?php // include_once('../views/footer.php'); 
 $err=404;
 include_once('../errors/error_log.php'); ?>

</body>
</html>
