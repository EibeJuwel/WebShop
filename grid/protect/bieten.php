<?php include dirname(__DIR__)."/db_include.php"?>
<!DOCTYPE html>
<html>
<head>
<title>Tomiko's Shop - Bieten</title>
<?php include dirname(__DIR__)."/head.php"?>
</head>
<body id="re_body">
<div id="layout">
<div class="header"><?php include dirname(__DIR__)."/header.php"?></div>
<div class="menu"><?php include dirname(__DIR__)."/menu.php"?></div>
<div class="main">
<?php
$show_gebot = true;
if(!isset($_SESSION['userid'])) {
	$error_address = "http://".$_SERVER['SERVER_NAME']."/grid/content/start.php";
	header("Location: $error_address");
	exit;
}
if(isset($_GET['artikel-id'])){
	$ID = $_GET['artikel-id'];
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
		
		if($_SESSION['userid'] == $user_ID) {
			$error_address = "http://".$_SERVER['SERVER_NAME']."/grid/biete_error.php";
			header("Location: $error_address");
			exit;
		}
		
	$sql_p = "SELECT `preise`.`Datum`,`preise`.`Preis` FROM `preise` WHERE `preise`.`Artikel_ID` LIKE '$Artikel_ID' ORDER BY `preise`.`Preis` DESC";
	$db_erg_p = mysqli_query( $db, $sql_p );

	$preis_daten = mysqli_fetch_array( $db_erg_p, MYSQLI_ASSOC);
		$Preis_p = $preis_daten['Preis'];
		
	if($Preis < $Preis_p){
		$Preis = $Preis_p;
	}
	if(isset($_POST['bieten'])){
	$show_gebot = false; 
	$gebot = $_POST['gebot'];
	$userid = $_SESSION['userid'];
	$datum_erstellung = date("Y-m-d",mktime(date('G'),date('i'),date('s'),date("m"),date("d"),date("Y")))."T".date("G:i:s",mktime(date('G'),date('i'),date('s'),date("m"),date("d"),date("Y")));
	mysqli_query($db,"INSERT INTO `preise` (`ID`, `User_ID`, `Artikel_ID`, `Preis`, `Datum`) VALUES (NULL, '$userid', '$ID', '$gebot', '$datum_erstellung');");
	}
	
	}else{
		$error_address = "http://".$_SERVER['SERVER_NAME']."/grid/error.php";
		header("Location: $error_address");
		exit;	
	}
	if($show_gebot){
	?>
	<form enctype="multipart/form-data" action="<?php echo "http://".$_SERVER['SERVER_NAME']."/grid/protect/bieten.php?artikel-id=$Artikel_ID"?>" method="post">
<div class="form_artikel_plus">

		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input class="mdl-textfield__input" type="number" name="gebot" step="0.01" min="<?php if(isset($Preis)){echo $Preis;};?>">
			<label class="mdl-textfield__label" for="sample3">Gebot</label>
			<span class="error_textfield" style='visibility:<?php if($error_preis){echo "visible";}else{echo "hidden";} ?>;'>Ungültiges Gebot</span>
		</div>
		
		<button style="width:300px;" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" type="submit" value="Bieten" name="bieten">Bieten</button>
</div>
</form>
<?php
}else{
?>
<div style="width:auto;height:auto;">
			<p>sie haben erfolgreich auf diesen Artikel geboten "<?php echo "$Artikel_Name"?>"</p>
</div>
<?php
}
?>
</div>
<div class="footer"><?php include dirname(__DIR__)."/footer.php"?></div>
</div>
</body>
</html>