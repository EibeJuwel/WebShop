<?php include "db_include.php"?>
<!DOCTYPE html>
<html>
<head>
<title>Tomiko's Shop - Registrierung</title>
<?php include "head.php"?>
</head>
<body id="re_body">
<div id="layout">
<div class="header"><?php include "header.php"?></div>
<div>

<?php
if(isset($_SESSION['userid'])) {
	$error_address = "http://".$_SERVER['SERVER_NAME']."/grid/content/start.php";
	header("Location: $error_address");
	exit;
}

$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll
$email_error = false;
$passwort_error = false;
$passwort2_error = false;
$vorname_error = false;
$nachname_error = false;
$geburtstag_error = false;
$land_error = false;
$plz_error = false;
$ort_error = false;
$hausnummer_error = false;

if(isset($_GET['register'])) {
 $error = false;
 $email = $_POST['email'];
 $passwort = $_POST['passwort'];
 $passwort2 = $_POST['passwort2'];
 $vorname = $_POST['vorname'];
 $nachname = $_POST['nachname'];
 $geburtstag = $_POST['geburtstag'];
 $land = $_POST['land'];
 $plz = $_POST['plz'];
 $ort = $_POST['ort'];
 $hausnummer = $_POST['hausnummer'];
  
 if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 $email_error = true;
 $error = true;
 } 
 if(strlen($passwort) == 0) {
 $passwort_error = true;
 $error = true;
 }
 if(strlen($vorname) == 0) {
 $vorname_error = true;
 $error = true;
 }
 if(strlen($nachname) == 0) {
 $nachname_error = true;
 $error = true;
 }
 if(strlen($geburtstag) == 0) {
 $geburtstag_error = true;
 $error = true;
 }
 if(strlen($land) == 0) {
 $land_error = true;
 $error = true;
 }
 if(strlen($plz) == 0) {
 $plz_error = true;
 $error = true;
 }
 if(strlen($ort) == 0) {
 $ort_error = true;
 $error = true;
 }
 if(strlen($hausnummer) == 0) {
 $hausnummer_error = true;
 $error = true;
 }
 if($passwort != $passwort2) {
 $passwort2_error = true;
 $error = true;
 }
 
 /*if(!$error){
	$result = mysqli_query($db,"SELECT * FROM `user` WHERE `E-Mail` = '$email'");
	
	if($result == false) {
	echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
	$error = true;
	} 
 }*/
 
 //Keine Fehler, wir können den Nutzer registrieren
 if(!$error) { 
 $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);
 mysqli_query($db,"INSERT INTO `user` (`ID`, `E-Mail`, `Vorname`, `Nachname`, `Geburtstag`, `Land`, `Ort`, `PLZ`, `Hausnummer`, `Kennwort`) VALUES (NULL, '$email', '$vorname', '$nachname', '$geburtstag', '$land', '$ort', '$plz', '$hausnummer', '$passwort_hash');");
 
 mysqli_close($db);
 $showFormular = false;
 } 
}
 
if($showFormular) {
?>
<div class="register_form">
<form action="?register=1" method="post">
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="email" id="sample3" name="email">
    <label class="mdl-textfield__label" for="sample3">E-Mail</label>
	<span class="error_textfield" style='visibility:<?php if($email_error){echo "visible";}else{echo "hidden";} ?>;'>Bitte eine gültige E-Mail-Adresse eingeben</span>
  </div>
  
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample3" name="vorname" pattern="[^<>]{1,40}">
    <label class="mdl-textfield__label" for="sample3">Vorname</label>
	<span class="error_textfield" style='visibility:<?php if($vorname_error){echo "visible";}else{echo "hidden";} ?>;'>Bitte einen gültigen Vornamen eingeben</span>
  </div>
  
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample3" name="nachname" pattern="[^<>]{1,40}">
    <label class="mdl-textfield__label" for="sample3">Nachname</label>
	<span class="error_textfield" style='visibility:<?php if($nachname_error){echo "visible";}else{echo "hidden";} ?>;'>Bitte einen gültigen Nachnamen eingeben</span>
  </div>
 
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="password" id="sample3" name="passwort">
    <label class="mdl-textfield__label" for="sample3">Passwort</label>
	<span class="error_textfield" style='visibility:<?php if($passwort_error){echo "visible";}else{echo "hidden";} ?>;'>Bitte ein gültiges Passwort eingeben</span>
  </div>
 
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="password" id="sample3" name="passwort2">
    <label class="mdl-textfield__label" for="sample3">Passwort wiederholen</label>
	<span class="error_textfield" style='visibility:<?php if($passwort2_error){echo "visible";}else{echo "hidden";} ?>;'>Bitte ein gleiches Passwort eingeben</span>
  </div>
  
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="date" id="sample3" value="<?php echo date("Y-m-d");?>" max="<?php echo date("Y-m-d");?>" name="geburtstag">
    <label class="mdl-textfield__label" for="sample3">Geburtstag</label>
	<span class="error_textfield" style='visibility:<?php if($geburtstag_error){echo "visible";}else{echo "hidden";} ?>;'>Bitte ein gültiges Geburtstag datum eingeben</span>
  </div>
  
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample3" value="Deutschland" name="land" pattern="[^<>]{2,40}">
    <label class="mdl-textfield__label" for="sample3">Land</label>
	<span class="error_textfield" style='visibility:<?php if($land_error){echo "visible";}else{echo "hidden";} ?>;'>Bitte ein gültiges Land eingeben</span>
  </div>
  
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="number" id="sample3" name="plz" pattern="[0-9]{5}">
    <label class="mdl-textfield__label" for="sample3">Postleitzahl</label>
	<span class="error_textfield" style='visibility:<?php if($plz_error){echo "visible";}else{echo "hidden";} ?>;'>Bitte eine gültige Postleitzahl eingeben</span>
  </div>
  
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample3" name="ort" pattern="[^<>]{0,40}">
    <label class="mdl-textfield__label" for="sample3">Ort</label>
	<span class="error_textfield" style='visibility:<?php if($ort_error){echo "visible";}else{echo "hidden";} ?>;'>Bitte einen gültigen Ort eingeben</span>
  </div>
  
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample3" name="hausnummer" pattern="[^<>]{1,4}">
    <label class="mdl-textfield__label" for="sample3">Hausnummer</label>
	<span class="error_textfield" style='visibility:<?php if($hausnummer_error){echo "visible";}else{echo "hidden";} ?>;'>Bitte eine gültige Hausnummer eingeben</span>
  </div>
  
<button style="width:300px;" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" type="submit" value="Abschicken">Registrieren</button>
</form>
</div>
<?php
}else{ //Ende von if($showFormular)
?>
<div class="register_form">
<button style="width:100%;margin:0 auto" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" onclick="location.href='<?php echo "http://".$_SERVER['SERVER_NAME']."/grid/content/start.php"?>';">Registrierung erfolgreich</button>
</div>
<?php
} //Ende von if($showFormular)
?>
</div>
<!--<div class="footer"><?php include "footer.php"?></div>-->
</div>
</body>
</html>