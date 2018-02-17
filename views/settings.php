<?php
If (!isset($_SESSION['user'])){
	echo '<pre class="backstage"> nincs bejelentkezve </pre>';
	include ('views/login.php');
}else{
?>

<h2>Beállítások</h2>
<h3>Felhasználó adatai:  &emsp; // &emsp;  <a href="index.php?menu=login&logout=logout">_Log_me_out_</a></h3>
<form>
	<table class="notable">
		<tr>
			<td>
				E-mail: 
			</td>
			<td>
				<input type="email" name="email" value="<?=$_SESSION['user']['email']?>" required>
			</td>
			<td>
				ezzel lépsz be
			</td>
		</tr>
		<tr>
			<td>
				Usernév: 
			</td>
			<td>
				<input type="text" name="username" value="<?=$_SESSION['user']['user']?>" required>
			</td>
			<td>
				ezen a néven szólítunk majd
			</td>
		</tr>
		<tr>
			<td>
				jogok: 
			</td>
			<td>
				<input type="email" name="email" value="<?=$_SESSION['user']['rights']?>" readonly>
			</td>
			<td>
				//
			</td>
		</tr>
		<tr>
			<td>
				jelszó: 
			</td>
			<td>
				<input type="email" name="email" value="" >
			</td>
			<td>
				// itt lehet MAJD megváltoztatni
			</td>
		</tr>
		<tr>
			<td>
				jelszó újra: 
			</td>
			<td>
				<input type="email" name="email" value="" >
			</td>
			<td>
				// megerősítés
			</td>
		</tr>
		<tr>
			<td>
				 
			</td>
			<td>
				<input type="submit" name="profil" value="Módosít" readonly>
			</td>
			<td>
				// egyenlóre NE módosítsunk
			</td>
		</tr>
	</table>
</form>

<?php
if(isset($_GET['avatar'])){
	
	$_SESSION['user']['avatar']=$_GET['avatar'];
	$updateUser = new UpdateUser();
	$updateUser->updateAvatar($_GET['avatar']);
}


?>
<p>Avatar: <img class="avatar" src="img/users/<?=$_SESSION['user']['avatar']?>"><u class="btn" onclick="document.getElementById('avatars').classList.toggle('hidden');">Válasszon új avatárt</u></p>

<div id="avatars" class="hidden"><hr>
<?php

$path = 'img/users/';
$files = scandir($path);
for($i=0; $i < (count($files)); $i++){
	if		(substr($files[$i], 0, 1)=='.'){}
	elseif ((substr($files[$i], -3, 3)=='svg')||(substr($files[$i], -3, 3)=='SVG')||
			(substr($files[$i], -3, 3)=='jpg')||(substr($files[$i], -3, 3)=='JPG')||
			(substr($files[$i], -3, 3)=='gif')||(substr($files[$i], -3, 3)=='GIF')||
			(substr($files[$i], -3, 3)=='png')||(substr($files[$i], -3, 3)=='PNG')
	){ 
	//else { 
		echo '<a href="index.php?menu=settings&avatar='.$files[$i].'" title="'.$files[$i].'" alt=="'.$files[$i].'" target="_self"><img class="avatar" src="'.$path.$files[$i].'"></a>';
	}
}
?>
</div>


<?php 



if ($_SESSION['user']['rights']>5){
	echo '<hr><h3>Users:</h3>';

	$users = new ShowAllUsers();
	$conf = new ReflectionClass('Config');
	$conf_arr = $conf->getStaticProperties();
		
	echo '<pre class="debug">'.	print_r($_SESSION, true);	
	echo '<hr><h3>Config: '.Config::$title.'</h3>';
	print_r($conf_arr);
	$dbcon = new dbcon();
	var_dump($dbcon);
	if ($_SESSION['user']['rights']>7){
		echo '<hr><h3>Error logs:</h3>';
		$errorlog = new Errorlog();
	}
	
	echo '</pre>';
}
		echo '<pre class="debug">';
if (isset($_SESSION['user']['id'])){
	foreach(array_diff(get_declared_classes(), $php_classes) as $diff){
		$my_classes[] = $diff;
		echo $diff.'<br>';
		$class_methods = get_class_vars($diff);
		print_r($class_methods, true);
	}	
		echo print_r($my_classes, true);	
}
		echo '</pre>';
}
?>
