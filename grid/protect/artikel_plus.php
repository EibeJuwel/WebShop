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

$error_name = false;
$error_preis = false;
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
	$preis = $_POST['preis'];
	$zahlungsart = $_POST['zahlungsart'];
	$hersteller = $_POST['hersteller'];
	$art = $_POST['art'];
	$modell = $_POST['modell'];
	$farbe = $_POST['farbe'];
	$beschreibung = $_POST['beschreibung'];
	$datum = $_POST['datum'];

	
	if(strlen($name) == 0) {
		$error_name = true;
		$error = true;
	}
	if(strlen($preis) == 0) {
		$error_preis = true;
		$error = true;
	}
	if(strlen($zahlungsart) == 0) {
		$error_zahlungsart = true;
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
	if(strlen($datum) == 0) {
		$error_datum = true;
		$error = true;
	}
	
if ( $_FILES['userfile']['name']  <> "" ){
    // Datei wurde durch HTML-Formular hochgeladen
    // und kann nun weiterverarbeitet werden
 
    // Kontrolle, ob Dateityp zulässig ist
    $zugelassenedateitypen = array("image/png", "image/jpeg", "image/jpg");
 
    if ( ! in_array( $_FILES['userfile']['type'] , $zugelassenedateitypen ))
    {
		$error_img = true;
		$error = true;
        echo "<p>Dateitype ist NICHT zugelassen";
    }
    else
    {
		$datei_img_addresse = "http://".$_SERVER['SERVER_NAME']."/grid/protect/artikel_img/".$_FILES['userfile']['name'];
        move_uploaded_file ($_FILES['userfile']['tmp_name'] ,"artikel_img/".$_FILES['userfile']['name'] );
    }
}else{
	$datei_img_addresse = "http://".$_SERVER['SERVER_NAME']."/grid/protect/artikel_img/"."platzhalter.png";
}

	
	if(!$error) { 
	$userid = $_SESSION['userid'];
	$datum_erstellung = date("Y-m-d",mktime(date('G'),date('i'),date('s'),date("m"),date("d"),date("Y")))."T".date("G:i:s",mktime(date('G'),date('i'),date('s'),date("m"),date("d"),date("Y")));
	mysqli_query($db,"INSERT INTO `artikel` (`ID`, `User_ID`, `Artikel_Name`, `Preis`, `Zahlungsart`, `Erstellungs_Datum`, `Enddatum`, `Marke_Hersteller`, `Art`, `Modell`, `Farbe`, `Beschreibung`, `Bilder_Link`) VALUES (NULL, '$userid', '$name', '$preis', '$zahlungsart', '$datum_erstellung', '$datum', '$hersteller', '$art', '$modell', '$farbe', '$beschreibung', '$datei_img_addresse');");
 
	mysqli_close($db);
	$error_address = "http://".$_SERVER['SERVER_NAME']."/grid/protect/artikel.php";
	header("Location: $error_address");
	exit;
	} 
}
?>
<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<div class="form_artikel_plus">
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input class="mdl-textfield__input" type="text" name="name" value="<?php if(isset($name)){echo $name;};?>">
			<label class="mdl-textfield__label" for="sample3">Artikel Name</label>
			<span class="error_textfield" style='visibility:<?php if($error_name){echo "visible";}else{echo "hidden";} ?>;'>Bitte einen Namen angeben</span>
		</div>
		
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input class="mdl-textfield__input" type="number" name="preis" step="0.01" value="<?php if(isset($preis)){echo $preis;};?>">
			<label class="mdl-textfield__label" for="sample3">Start preis</label>
			<span class="error_textfield" style='visibility:<?php if($error_preis){echo "visible";}else{echo "hidden";} ?>;'>Bitte einen Namen angeben</span>
		</div>
		
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
        <input type="text" value="<?php if(isset($zahlungsart)){echo $zahlungsart;};?>" class="mdl-textfield__input" id="sample4" readonly name="zahlungsart">
        <input type="hidden" value="" name="sample4">
        <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
        <label for="sample4" class="mdl-textfield__label">Gewünschte Zahlungsart</label>
        <ul for="sample4" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
            <li class="mdl-menu__item" data-val="PAYPAL">PayPal</li>
            <li class="mdl-menu__item" data-val="BANK">Bankeinzug</li>
            <li class="mdl-menu__item" data-val="BAR">Barzahlung</li>
        </ul>
    </div>

		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input class="mdl-textfield__input" type="text" name="hersteller" value="<?php if(isset($hersteller)){echo $hersteller;};?>">
			<label class="mdl-textfield__label" for="sample3">Hersteller</label>
			<span class="error_textfield" style='visibility:<?php if($error_hersteller){echo "visible";}else{echo "hidden";} ?>;'>Bitte einen Hersteller angeben</span>
		</div>
		
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input class="mdl-textfield__input" type="text" name="art" value="<?php if(isset($art)){echo $art;};?>">
			<label class="mdl-textfield__label" for="sample3">Art</label>
			<span class="error_textfield" style='visibility:<?php if($error_art){echo "visible";}else{echo "hidden";} ?>;'>Bitte eine Art angeben</span>
		</div>
		
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input class="mdl-textfield__input" type="text" name="modell" value="<?php if(isset($modell)){echo $modell;};?>">
			<label class="mdl-textfield__label" for="sample3">Modell</label>
			<span class="error_textfield" style='visibility:<?php if($error_modell){echo "visible";}else{echo "hidden";} ?>;'>Bitte ein Modell angeben</span>
		</div>
		
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input class="mdl-textfield__input" type="text" name="farbe" value="<?php if(isset($farbe)){echo $farbe;};?>">
			<label class="mdl-textfield__label" for="sample3">Farbe</label>
			<span class="error_textfield" style='visibility:<?php if($error_farbe){echo "visible";}else{echo "hidden";} ?>;'>Bitte eine Farbe angeben</span>
		</div>
		
		<div class="mdl-textfield mdl-js-textfield">
			<textarea class="mdl-textfield__input" type="text" id="sample5" name="beschreibung" value="<?php if(isset($beschreibung)){echo $beschreibung;};?>"></textarea>
			<label class="mdl-textfield__label" for="sample5">Beschreibung</label>
		</div>
		
		<input type="hidden" name="MAX_FILE_SIZE" />
		<label class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect fileContainer" style="width:268px;"><?php if($error_name){echo "Dateitype Fehler";}else{echo "Bild auswählen";}?></span>
		<input name="userfile" type="file" /></label>
		
		
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="datetime-local" id="sample3" value="<?php echo date("Y-m-d",mktime(date('G'),date('i'),date('s'),date("m"),date("d")+7,date("Y")))."T".date("G:i",mktime(date('G'),date('i'),date('s'),date("m"),date("d")+7,date("Y")));?>"  
				min="<?php echo date("Y-m-d",mktime(date('G'),date('i'),date('s'),date("m"),date("d")+1,date("Y")))."T".date("G:i",mktime(date('G'),date('i'),date('s'),date("m"),date("d")+1,date("Y")));?>" 
				max="<?php echo date("Y-m-d",mktime(date('G'),date('i'),date('s'),date("m"),date("d")+10,date("Y")))."T".date("G:i",mktime(date('G'),date('i'),date('s'),date("m"),date("d")+10,date("Y")));?>"  name="datum">
		<label class="mdl-textfield__label" for="sample3">Auktionsende</label>
		<span class="error_textfield" style='visibility:<?php if($error_datum){echo "visible";}else{echo "hidden";} ?>;'></span>
		</div>
		
		<button style="width:300px;" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" type="submit" value="Veröffentlichen" name="artikel_plus">Artikel Veröffentlichen</button>
</div>
</form>
</div>
<div class="footer"><?php include dirname(__DIR__)."/footer.php"?></div>
</div>
</body>
</html>