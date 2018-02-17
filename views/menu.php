<ul>
	<li><a href="index.php" target="_self">Home</a></li>
	<!-- <li><a href="index.php?menu=tabla" target="_self">tábla</a></li> -->
	<!-- <li><a href="index.php?menu=list" target="_self">lista</a></li> -->
	<li><a href="index.php?menu=display" target="_self">display </a></li>
<?php if(isset($_SESSION['user'])){?>
	<li><a href="index.php?menu=felvisz" target="_self">Felvisz</a></li>
	<li><a href="index.php?menu=publication" target="_self">Publikáció</a></li>
	<li><a href="index.php?menu=settings" target="_self">Beállítások</a></li>
	<li><a href="index.php?menu=login&logout=logout" target="_self" onclick="return confirm('Are you sure you want to logout?')">Logout</a></li>
<?php }else {?>
	<li><a href="index.php?menu=login" target="_self">Login</a></li>
<?php } ?>
</ul>