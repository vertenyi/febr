<?php

if (isset($_GET['delete'])){
	$DeleteBlog = new DeleteBlog();
	$d_name = $DeleteBlog->deleteArticle($_GET['delete']);	
	$bck[] = 'Törölve: ' . $d_name; 
}
if(isset($bck)){  // if there is a backstage message, then
	echo '<pre class="backstage">';
	for($i=0; $i<count($bck);$i++) {
		echo $bck[$i];
	}
	echo '</pre>';	
unset ($bck); // unset backstage message
}
	
?>