<?php
// login view




If (!isset($_SESSION['user'])){
?>


<form method="post" id="loginform" name="loginform" action="index.php?menu=settings">
 <fieldset><legend> Login:</legend>
	<table class="notable">
		<tr>
			<td>
				E-mail: 
			</td>
			<td>
				<input type="text" name="email">
			</td>
		</tr>
		<tr>	
			<td>
				Jelszó: 
			</td>
			<td>
				<input type="password" name="password">
			</td>
		</tr>
		<tr>	
			<td>
				
			</td>
			<td>
				<input type="submit" name="login" value="login">
			</td>
		</tr>
	</table>
	<br>
 </fieldset>	
</form>


<br>


<form method="post" id="regform" name="regform" action="index.php?menu=login">
 <fieldset><legend> Regisztráció: ... hamarosan ... </legend>
	<table class="notable">
		<tr>
			<td>
				E-mail: 
			</td>
			<td>
				<input type="text" name="email" disabled>
			</td>
		</tr>
		<tr>	
			<td>
				Jelszó: 
			</td>
			<td>
				<input type="password" name="password" disabled>
			</td>
		</tr>
		<tr>	
			<td>
				
			</td>
			<td>
				<input type="submit" name="login" value=" ... hamarosan ... regisztrálok" disabled>
			</td>
		</tr>
	</table>
	<br>
 </fieldset>
</form>


<?php
}else{

	echo '<hr><h3><a href="index.php?menu=login&logout=logout">Log me out</a></h3>';
}
?>





