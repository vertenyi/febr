<?php
if(isset($_SESSION['user']['user'])){

$ShowPublications = new ShowPublications();
$DisplayBlog = new DisplayBlog();
	
if (isset($_POST['editId'])){
	$id=$_POST['editId'];
	$ListNames = $ShowPublications->publicationOrderListNames($id);
	$pubname= $ShowPublications->getPublicationName($id);	
?> 
<h2><?=$pubname?></h2>
<form menu="index.php?menu=publication" method="post"><input type="text" name="rename" value="<?=$pubname?>"><input type="hidden" name="renameId" class="hidden" value="<?=$id?>" readonly><input type="submit" value="átnevez"></form></td>
<br>
<form>
	<fieldset>
		<legend> Átrendezés (doubleclick to add)</legend>
		<div class="table w100">
			<div class="row inv">
				<div class="cell w25">
					Teljes lista
				</div>
				<div class="cell w25">
					Publikáció
				</div>
				<div class="cell w25">
					Szakasz kiválasztása
				</div>
				<div class="cell w25">
					Új Sorrend
				</div>
			</div>
			<div class="row">
				<div class="cell w25">
					<?=	$DisplayBlog->showBlogSelects()?>
				</div>
				<div class="cell w25">
					<?= $ShowPublications->showPublicationOrderSelect($id)?>
				</div>
				<div class="cell w25">
					Szakaszonként kell menteni!<br>
					<select id="szakaszok" class="sfrom">
						<option value="new">új szakasz</option>
					</select>
					<br>ha új szakasz, itt adhat neki új őst<br>
					<select id="ujos" class="sfrom">
						<option value="new">új szakasz</option>ű
					</select>
					<br><input type="submit">
				</div>
				<div class="cell w25">
					<select id="slist" size="10" multiple>
					</select>
				</div>
			</div>
		</div>
	</fieldset>
</form>


<script>
function addthis(tid) {
	var slist = document.getElementById("slist");
	var uid = 'u'+tid;
    var option = document.createElement("option");
    option.text = document.getElementById(tid).text;
    option.value = document.getElementById(tid).value;
	var att = document.createAttribute("ondblclick");      
	att.value = "removeOptionsById(this)";           
	option.setAttributeNode(att); 
    slist.add(option);
}
function removeOptionsById(sid)
{
	selectBox=document.getElementById("slist");
	for (var i=0; i < selectBox.length ; i++) {
		if (selectBox[i] == sid) {
			selectBox.remove(i);
		}
	}
}
</script>
<?php

}else{
	if(isset($_POST['rename'])){
		print_r($_POST);
		$UpdatePublication=new UpdatePublication();
		$UpdatePublication->updatePublicationName($_POST['renameId'],$_POST['rename']);
	}
	echo '<h2>Publikációk</h2>';
	$ShowPublications->publicationsTable();
}
}else{
	echo '<h3>... ehhez a nézethez be kell jelentkeznie!</h3>';
	
	include('views/login.php');
}
?>