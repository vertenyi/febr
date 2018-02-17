<?php
// login controller
Session_start();


If ( isset($_GET['logout']) ){
	$bck[] = 'Logged out: '. $_SESSION['user']['user'];
	session_unset(); // remove all session variables
	session_destroy(); // ends the session 
}
If (isset($_POST['login'])){
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false){
			$User = new User();
			$getUser = $User->getActiveUser('email',$_POST['email']);
		If (md5($_POST['password'])=='6281f1abdd3bf07df3d55652f04843b4'){
			$_SESSION['user']=$getUser; 	
			$bck[] = 'Welcome: '. $_SESSION['user']['user']. '. Have a nice day!';
		}else{ $bck[] = 'a jelszó nem megfelelő ehhez az emailhez: '. $_POST['email'];}	 // backstage message
	}else{ $bck[] = 'ez nem email: '. $_POST['email'];}	 // backstage message


}
?>