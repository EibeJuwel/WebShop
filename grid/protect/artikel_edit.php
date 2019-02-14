<?php include dirname(__DIR__)."/db_include.php"?>
<!DOCTYPE html>
<html>
<head>
<title>Tomiko's Shop - Plus Artikel</title>
<?php include dirname(__DIR__)."/head.php"?>
</head>
<body id="re_body">
<div id="layout">
<div class="header"><?php include dirname(__DIR__)."/header.php"?></div>
<div class="main">

<?php
if(!isset($_SESSION['userid'])) {
	$error_address = "http://".$_SERVER['SERVER_NAME']."/grid/login_error.php";
	header("Location: $error_address");
	exit;
}

if(isset($_GET['ID'])){
	$ID = $_GET['ID'];
$sql = "SELECT * FROM `artikel` WHERE `ID` = $ID ";
	$db_erg = mysqli_query( $db, $sql );

	$zeile = mysqli_fetch_array( $db_erg, MYSQLI_ASSOC);
	
		$Artikel_ID = $zeile['ID'];
		$Artikel_Name = $zeile['Artikel_Name'];
		$user_ID = $zeile['User_ID'];
		$Preis = $zeile['Preis'];
		$Zahlungsart = $zeile['Zahlungsart'];
		$Erstellungs_Datum = $zeile['Erstellungs_Datum'];
		$Enddatum = $zeile['Enddatum'];
		$Bilder_Link = $zeile['Bilder_Link'];
		$Modell = $zeile['Modell'];
		$Marke_Hersteller = $zeile['Marke_Hersteller'];
		$Art = $zeile['Art'];
		$Beschreibung = $zeile['Beschreibung'];
		$Farbe = $zeile['Farbe'];

		
$error_name = false;
$error_zahlungsart = false;
$error_hersteller = false;
$error_art = false;
$error_modell = false;
$error_farbe = false;
$error_beschreibung = false;
$error_userfile = false;
$error_datum = false;
$error_img = false;

$error = false;

if(isset($_POST['artikel_plus'])){
	$name = $_POST['name'];
	$hersteller = $_POST['hersteller'];
	$art = $_POST['art'];
	$modell = $_POST['modell'];
	$farbe = $_POST['farbe'];
	$beschreibung = $_POST['beschreibung'];

	
	if(strlen($name) == 0) {
		$error_name = true;
		$error = true;
	}
	if(strlen($hersteller) == 0) {
		$error_hersteller = true;
		$error = true;
	}
	if(strlen($art) == 0) {
		$error_art = true;
		$error = true;
	}
	if(strlen($modell) == 0) {
		$error_modell = true;
		$error = true;
	}
	if(strlen($farbe) == 0) {
		$error_farbe = true;
		$error = true;
	}
	if(strlen($beschreibung) == 0) {
		$error_beschreibung = true;
		$error = true;
	}

	
	if(!$error) { 
	mysqli_query($db,"UPDATE `artikel` SET `Artikel_Name` = '$name', `Marke_Hersteller` = '$hersteller', `Art` = '$art', `Modell` = '$modell', `Farbe` = '$farbe', `Beschreibung` = '$beschreibung' WHERE `artikel`.`ID` = $Artikel_ID;");
 
	mysqli_close($db);
	$error_address = "http://".$_SERVER['SERVER_NAME']."/grid/protect/artikel.php";
	header("Location: $error_address");
	exit;
	} 
	}
}
?>
<form enctype="multipart/form-data" action="<?php echo "http://".$_SERVER['SERVER_NAME']."/grid/protect/artikel_edit.php?ID=$Artikel_ID"?>" method="post">
<div class="form_artikel_plus">
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input class="mdl-textfield__input" type="text" name="name" value="<?php if(isset($Artikel_Name)){echo $Artikel_Name;};?>">
			<label class="mdl-textfield__label" for="sample3">Artikel Name</label>
			<span class="error_textfield" style='visibility:<?php if($error_name){echo "visible";}else{echo "hidden";} ?>;'>Bitte einen Namen angeben</span>
		</div>

		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input class="mdl-textfield__input" type="text" name="hersteller" value="<?php if(isset($Marke_Hersteller)){echo $Marke_Hersteller;};?>">
			<label class="mdl-textfield__label" for="sample3">Hersteller</label>
			<span class="error_textfield" style='visibility:<?php if($error_hersteller){echo "visible";}else{echo "hidden";} ?>;'>Bitte einen Hersteller angeben</span>
		</div>
		
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input class="mdl-textfield__input" type="text" name="art" value="<?php if(isset($Art)){echo $Art;};?>">
			<label class="mdl-textfield__label" for="sample3">Art</label>
			<span class="error_textfield" style='visibility:<?php if($error_art){echo "visible";}else{echo "hidden";} ?>;'>Bitte eine Art angeben</span>
		</div>
		
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input class="mdl-textfield__input" type="text" name="modell" value="<?php if(isset($Modell)){echo $Modell;};?>">
			<label class="mdl-textfield__label" for="sample3">Modell</label>
			<span class="error_textfield" style='visibility:<?php if($error_modell){echo "visible";}else{echo "hidden";} ?>;'>Bitte ein Modell angeben</span>
		</div>
		
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input class="mdl-textfield__input" type="text" name="farbe" value="<?php if(isset($Farbe)){echo $Farbe;};?>">
			<label class="mdl-textfield__label" for="sample3">Farbe</label>
			<span class="error_textfield" style='visibility:<?php if($error_farbe){echo "visible";}else{echo "hidden";} ?>;'>Bitte eine Farbe angeben</span>
		</div>
		
		<div class="mdl-textfield mdl-js-textfield">
			<textarea class="mdl-textfield__input" type="text" id="sample5" name="beschreibung"><?php if(isset($Beschreibung)){echo $Beschreibung;};?></textarea>
			<label class="mdl-textfield__label" for="sample5">Beschreibung</label>
		</div>
		
		
		<button style="width:300px;" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" type="submit" value="Veröffentlichen" name="artikel_plus">Artikel Bearbeiten</button>
</div>
</form>
</div>
<div class="footer"><?php include dirname(__DIR__)."/footer.php"?></div>
</div>
</body>
</html>