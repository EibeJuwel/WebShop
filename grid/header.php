<a href="<?php echo "http://".$_SERVER['SERVER_NAME']."/grid/content/start.php"?>">
	<img class="header_img" src="<?php echo "http://".$_SERVER['SERVER_NAME']."/grid/logo.svg"?>" alt="Logo">
</a>
<div class="login_menu">

<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored" onclick="document.getElementById('id01').style.display='block'">
  <img src="<?php echo "http://".$_SERVER['SERVER_NAME']."/grid/login_symbol.svg"?>" alt="Login_Symbol" style="transform: scale(1.5);">
</button>

</div>

<?php 	
if(isset($_POST['logout'])) {
		echo "test logout";
		session_destroy();
		header("Location: $_SERVER[PHP_SELF]");
		exit;
}

if(isset($_GET['login']) && !isset($_POST['logout'])) {
 $email = $_POST['email'];
 $passwort = $_POST['passwort'];
 $error_login = false;
 
	$sql = "SELECT * FROM `user` WHERE `E-Mail` LIKE '$email'";
	$db_erg = mysqli_query( $db, $sql );

	while ($zeile = mysqli_fetch_array( $db_erg, MYSQLI_ASSOC))
	{
		$zeile['E-Mail'] = trim($zeile['E-Mail']);
		$email_verify = $zeile['E-Mail'];
		$vorname = $zeile['Vorname'];
		$nachname = $zeile['Nachname'];
		$password_verify = $zeile['Kennwort'];
		$ID_verify = $zeile['ID'];
	}
 
 //Überprüfung des Passworts
 if ($email_verify == $email && password_verify($passwort, $password_verify)) {
 $_SESSION['userid'] = $ID_verify;
 $_SESSION['email'] = $email_verify;
 $_SESSION['vorname'] = $vorname;
 $_SESSION['nachname'] = $nachname;
 } else {
 $error_login = true;
 }
}
if(!isset($_SESSION['userid'])) {
	$login_no_jes = false;
	$showLogin = true;
}else{
	$showLogin = false;
	$login_no_jes = true;
	$vorname = $_SESSION['vorname'];
}
?>
<!-- The Modal -->
<div id="id01" class="modal">  
  <!-- Modal Content -->
  <form class="modal-content animate" action="?login=1" method="post">

    <div class="container">
	<?php
	if($showLogin) {
	?>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input class="mdl-textfield__input" type="email" name="email">
			<label class="mdl-textfield__label" for="sample3">E-Mail</label>
			<span class="error_textfield" style='visibility:<?php if($error_login){echo "visible";}else{echo "hidden";} ?>;'>Bitte einen gültigen Vornamen eingeben</span>
		</div>

		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input class="mdl-textfield__input" type="password" name="passwort">
			<label class="mdl-textfield__label" for="sample3">Passwort</label>
			<span class="error_textfield" style='visibility:<?php if($error_login){echo "visible";}else{echo "hidden";} ?>;'>Bitte einen gültigen Vornamen eingeben</span>
		</div>
	  <button style="width:300px;" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" type="submit" value="Abschicken">Login</button>

		<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" style="margin:5px 0;" for="checkbox-1">
		<input type="checkbox" id="checkbox-1" class="mdl-checkbox__input" checked>
		<span class="mdl-checkbox__label">Remember me Funktioniert nicht (;</span>
		</label>
		
		<button type="button" style="width:300px; margin-bottom:10px;" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" onclick="location.href='<?php echo "http://".$_SERVER['SERVER_NAME']."/grid/registrierung.php"?>';" value="Registrierung">Registrierung</button>
    <?php
	}else{
	//Wird Angezeig wenn der Benutzer eingelogt ist
	?>	
	
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable" style="width:300px;">
		<label>
			<?php echo "Hallo ".$_SESSION['vorname']." ".$_SESSION['nachname'];?>
		</label>
	</div>
	
	<button type="button" style="width:300px; margin-bottom:10px;" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" onclick="location.href='<?php echo "http://".$_SERVER['SERVER_NAME']."/grid/protect/artikel.php"?>';" value="Artikel">Artikel</button>
	<button type="button" style="width:300px; margin-bottom:10px;" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" onclick="location.href='<?php echo "http://".$_SERVER['SERVER_NAME']."/grid/protect/gebote.php"?>';" value="Artikel">Ihre Gebote</button>

	<button style="width:300px; margin-bottom:10px;" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" type="submit" value="logout" name="logout">Logout</button>
	<?php
	}
	?>
	</div>
    <div class="container">
	  <button style="width:300px;" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" type="button" onclick="document.getElementById('id01').style.display='none'">Cancel</button>
    </div>
  </form>
	<script>
	// Get the modal
	var modal = document.getElementById('id01');

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
	}
</script>

</div>
