<?php 
echo  $_SERVER['QUERY_STRING'];

$SelectCategory=new SelectCategory('index.php?menu=list');
	$list = new DisplayBlog();
if(isset($_POST['selectcategory'])){
	$catid = $_POST['selectcategory'];
	$CatName = new CatName();
	echo '<article class="cat_header"><div class="text"><h3>Kategória: '.$CatName->getCatName($catid).'</h3><p>'.$CatName->getCatDescription($catid).'</p></div></article>';
	$list->showBlogByCat($catid);

}else if(isset($_GET['catid'])){
	$catid = $_GET['catid'];
	$CatName = new CatName();
	echo '<article class="cat_header"><div class="text"><h3>Kategória: '.$CatName->getCatName($catid).'</h3><p>'.$CatName->getCatDescription($catid).'</p></div></article>';
	$list->showBlogByCat($catid);
}


?>