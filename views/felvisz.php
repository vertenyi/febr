<?php 

// initialize some variables, just in cease...
$rtTitle = ''; $text = ''; $selectedCat = ''; $rtId = 0;
// if Text field is posted
if (isset($_POST['rtArea'])){
	$rtId = $_POST['rtId'];
	$text = $_POST['rtArea'];
	$text = Statics::sanitize($text);
	$rtTitle = $_POST['rtTitle'];
	if($_POST['selectcategory']>0){$selectedCat=$_POST['selectcategory'];}
	else{$selectedCat=0;}

	// a little correction ... this one needs some oversight
	$text = preg_replace("/\r\n|\r|\n/", '', $text);
	$text = str_replace(array("\r\n", "\n", "\r"), '', $text);
	$text = str_replace(PHP_EOL, '', $text);
	
	echo $posted = '<h5>You posted on '.date('Y F dS, D H:i:s').'</h5>';
	
	// preview:
	// echo '<article><h2>'. $rtTitle . '</h2><div class="text">' . $text . '</div></article>';

	$userid = $_SESSION['user']['id'];
	if(isset($_GET['edit'])){
		// 		(id,cat_id,par_id,title,meta,text,code,tags,img,user)
		$set = "cat_id='$selectedCat',par_id=0,title='$rtTitle',meta='',text='$text',code='',tags='',img='',user='$userid'";
		$CRUD_Update = new UpdateBlog();
		$CRUD_Update->updateArticle($rtId, $set);	
		echo $bck[]= $rtTitle.' cikk frissítve';
	}else{
		// 				(cat_id,par_id,title,meta,text,code,tags,img,user)
		$article = array($selectedCat,0,$rtTitle,'',$text,'code','test','_',$userid);
		$CRUD_Create = new Blog();
		$CRUD_Create->newArticle($article);
		echo $bck[] = $rtTitle.' cikk létrehozva';
	}
}
else if (isset($_GET['edit'])){
	// feltölti a formot az adatbázisból, ha szerkesztésen van a cikk
	$getArticle = new Blog();
	$article = $getArticle->getArticle($_GET['edit']);
	$rtTitle = $article['title'];
	$text = $article['text'];
	$selectedCat = $article['cat_id'];
	$rtId = $_GET['edit'];
}
?>


<div>
<form action="index.php?menu=felvisz" name="rtForm" id="rtForm" method="post">
<p>Title: 
	<input name="rtId" id="rtId" type="number" value="<?=$rtId?>" readonly class="hidden">
	<input name="rtTitle" id="rtTitle" type="text" value="<?=$rtTitle?>">
	

<?php  if (isset($_GET['edit'])||isset($_POST['rtArea'])){
	echo '<input type="text" name="flag" value="edit" hidden>';
	echo '<input name="editBtn" type="button" value="edit" class="btn" onClick="javascript:submitform();"/>';
}else{ 
	echo '<input name="saveBtn" type="button" value="Save" class="btn" onClick="javascript:submitform();"/>';
}
?>	
</p>
<p>Category: 
<?php
	$SelectCat=new SelectCat($selectedCat);

?>
</p>

<?php
	include('inc/rtf.php');

?>



</form>
</div>
