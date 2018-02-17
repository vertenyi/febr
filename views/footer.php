<?php //	echo '<pre class="debug">'.	print_r($_SESSION, true) . '</pre>';	?>
<?php //	echo '<pre class="debug">'.	print_r(get_defined_vars(), true) . '</pre>';	?>


</main>

<footer>
	<h5><img src="style/img/cc88x31.png" alt="creative commons"> | &copy;2017-<?php echo date("Y");?> | <a href="mailto:vertenyi@gmail.com">_Péter .Vértényi_</a></h5>
	<h5>System admin on this site: <a href="mailto:<?=Config::$admin_email?>"><?=Config::$admin?></a></h5>
</footer>
<div id="totop" onclick="location.href='#top'"> fel </div>
<script type="text/javascript">
	try {	SyntaxHighlighter.all();}catch(err) {}
	try {	doFrameOn();}catch(err) {}
</script>
</body>
</html>

