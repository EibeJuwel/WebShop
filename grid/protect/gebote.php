<?php include dirname(__DIR__)."/db_include.php"?>
<!DOCTYPE html>
<html>
<head>
<title>Tomiko's Shop - Gebote</title>
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
?>
<div style="margin:0 auto;width:300px;">
<button type="button" style="width:300px; margin-bottom:10px;" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" onclick="location.href='<?php echo "http://".$_SERVER['SERVER_NAME']."/grid/protect/artikel_plus.php"?>';" value="Artikel_plus">Neuen Artikel hinzufügen</button>
</div>

<?php
$userid = $_SESSION['userid'];
$sql = "SELECT * FROM `preise` WHERE `User_ID` = $userid ORDER BY `preise`.`Artikel_ID` ASC, `preise`.`Preis` DESC";
	$db_erg = mysqli_query( $db, $sql );
$A_ID = 0;
	while ($zeile = mysqli_fetch_array( $db_erg, MYSQLI_ASSOC))
	{
	if($A_ID != $zeile['Artikel_ID']){
		$Preis_p = $zeile['Preis'];
		$A_ID = $zeile['Artikel_ID'];
		

		
		$sql_p = "SELECT * FROM `artikel` WHERE `ID` = $A_ID";
	$db_erg_p = mysqli_query( $db, $sql_p );

	$preis_daten = mysqli_fetch_array( $db_erg_p, MYSQLI_ASSOC);
		$Artikel_ID = $preis_daten['ID'];
		$Artikel_Name = $preis_daten['Artikel_Name'];
		$Preis = $preis_daten['Preis'];
		$Zahlungsart = $preis_daten['Zahlungsart'];
		$Erstellungs_Datum = $preis_daten['Erstellungs_Datum'];
		$Enddatum = $preis_daten['Enddatum'];
		$Bilder_Link = $preis_daten['Bilder_Link'];
		$Modell = $preis_daten['Modell'];
		$Marke_Hersteller = $preis_daten['Marke_Hersteller'];
		
	$sql_g = "SELECT `preise`.`Preis` FROM `preise` WHERE `preise`.`Artikel_ID` LIKE '$Artikel_ID' ORDER BY `preise`.`Preis` DESC";
	$db_erg_g = mysqli_query( $db, $sql_g );

	$preis_daten_g = mysqli_fetch_array( $db_erg_g, MYSQLI_ASSOC);
		$Preis_g = $preis_daten_g['Preis'];
		
	if($Preis < $Preis_g){
		$Preis = $Preis_g;
	}
		?>
		
	<div class="artikel_div" onclick="location.href='<?php echo "http://".$_SERVER['SERVER_NAME']."/grid/ausgewaehl.php?ID=$Artikel_ID"?>';">
		<div style="background-image: url('<?php echo "$Bilder_Link";?>');" class="artikel_img"></div>
		
		<div class="artikel_option">
			<div style="font-size: 30px;font-weight: bold;height:42px;vertical-align: middle;line-height: 42px; margin-bottom:10px;">
			<?php echo "$Artikel_Name";?>
			</div>
			<div style="font-size: 16px;font-weight: bold;height:32px;vertical-align: middle;line-height: 16px; ">
			Ihr Gebot auf diesen Artikel: <?php echo "$Preis_p";?>€
			</div>
			<div style="font-size: 16px;font-weight: bold;height:32px;vertical-align: middle;line-height: 16px; ">
			Aktueller Preis: <?php echo "$Preis";?>€
			</div>
			
			<script>
				var countdown_<?php echo $Artikel_ID;?>Date = new Date("<?php $Ende = explode(" ",$Enddatum);
				$datum = explode("-",$Ende[0]);
				$time = explode(":",$Ende[1]);
				echo "$datum[1] $datum[2]".","." $datum[0] $time[0]".":"."$time[1]".":"."$time[2]";
				?>").getTime();
				var x = setInterval(function() {
				var now = new Date().getTime();
				var distance = countdown_<?php echo $Artikel_ID;?>Date - now;
				var days = Math.floor(distance / (1000 * 60 * 60 * 24));
				var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((distance % (1000 * 60)) / 1000);
				document.getElementById("countdown_<?php echo $Artikel_ID;?>").innerHTML = days + "T. " + hours + "Std. "+ minutes + "m " + seconds + "s ";
				if (distance < 0) {
				clearInterval(x);
				document.getElementById("countdown_<?php echo $Artikel_ID;?>").innerHTML = "Abgelaufen";}
				}, 1000);
				</script>
			
			<div style="font-size: 16px;font-weight: bold;height:42px;vertical-align: middle;line-height: 16px; ">
			Auktion endet am:<br><font id="countdown_<?php echo $Artikel_ID;?>"></font>
			</div>
		</div>
	</div>
		
		<?php
	}
	}
?>
<script>
				var countdown_<?php echo $Artikel_ID;?>Date = new Date("<?php $Ende = explode(" ",$Enddatum);
				$datum = explode("-",$Ende[0]);
				$time = explode(":",$Ende[1]);
				echo "$datum[1] $datum[2]".","." $datum[0] $time[0]".":"."$time[1]".":"."$time[2]";
				?>").getTime();
				var x = setInterval(function() {
				var now = new Date().getTime();
				var distance = countdown_<?php echo $Artikel_ID;?>Date - now;
				var days = Math.floor(distance / (1000 * 60 * 60 * 24));
				var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((distance % (1000 * 60)) / 1000);
				document.getElementById("countdown_<?php echo $Artikel_ID;?>").innerHTML = days + "T. " + hours + "Std. "+ minutes + "m " + seconds + "s ";
				if (distance < 0) {
				clearInterval(x);
				document.getElementById("countdown_<?php echo $Artikel_ID;?>").innerHTML = "Abgelaufen";}
				}, 1000);
				</script>
</div>
<div class="footer"><?php include dirname(__DIR__)."/footer.php"?></div>
</div>
</body>
</html>