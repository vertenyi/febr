
<?php
if(isset($_GET['pubid'])){
$id = $_GET['pubid'];
$ShowPublications = new ShowPublications();
$order = $ShowPublications->publicationOrderList($id);
$DisplayBlog = new DisplayBlog();
$pubname= $ShowPublications->getPublicationName($id);		
?>	<div class="fn"><div id="pub_foot"></div></div>
<a id='toprint'> print </a>
	<section id="s0">
		<div id="fejlec" hidden>fejléc</div>
		<h1><?=$pubname?></h1>
		
		<?php
			$chapterKeys = array_keys($order);
			$ck=0;		
		// $ShowPublications->showPublicationHeaders($id);
		// echo '<pre>'.print_r($order).'<br>';	
		// echo '<pre>'.print_r($chapterKeys).'<br>';	
			foreach($order as $chapter){

				echo '<h2>'.$ShowPublications->publicationOrderH2($chapterKeys[$ck++]).'</h2>';
				//print_r($chapter);
				echo '<div class="chapter" id="chapter_'.$ck.'">';
				foreach($chapter as $article){
					echo '<h3>'.$DisplayBlog->getName($article).'</h3>';
					 echo '<h6>article id: '.$article.'</h6>';
					$DisplayBlog->showContent($article);
				}
				echo '</div>';
			}
		
		?>
		
		
		
		
		
		
	</section>

	<div id="debug"></div>
	
<script>
s0 = document.getElementById('s0');
document.getElementById('debug').innerHTML = '';
</script>
	
<?php	
}else{echo '<h3>nincs publikáció kiválasztva. </h3><p><a href="index.php?menu=publication" class="btn">&lt;- Vissza</a></p>';}

?>