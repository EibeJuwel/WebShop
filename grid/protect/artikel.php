<?php include dirname(__DIR__)."/db_include.php"?>
<!DOCTYPE html>
<html>
<head>
<title>Tomiko's Shop - Artikel</title>
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
$sql = "SELECT `ID`, `User_ID`, `Artikel_Name`, `Preis`, `Erstellungs_Datum`, `Enddatum`, `Bilder_Link` FROM `artikel` WHERE `User_ID` LIKE '$userid'";
	$db_erg = mysqli_query( $db, $sql );

	while ($zeile = mysqli_fetch_array( $db_erg, MYSQLI_ASSOC))
	{
		$Artikel_ID = $zeile['ID'];
		$Artikel_Name = $zeile['Artikel_Name'];
		$Preis = $zeile['Preis'];
		$Erstellungs_Datum = $zeile['Erstellungs_Datum'];
		$Enddatum = $zeile['Enddatum'];
		$Bilder_Link = $zeile['Bilder_Link'];
		

		$sql_p = "SELECT `preise`.`Datum`,`preise`.`Preis` FROM `preise` WHERE `preise`.`Artikel_ID` LIKE '$Artikel_ID' ORDER BY `preise`.`Preis` DESC";
	$db_erg_p = mysqli_query( $db, $sql_p );

	$preis_daten = mysqli_fetch_array( $db_erg_p, MYSQLI_ASSOC);
		$Preis_p = $preis_daten['Preis'];
		
	if($Preis < $Preis_p){
		$Preis = $Preis_p;
	}
		?>
		
	<div class="artikel_div">
		<div style="background-image: url('<?php echo "$Bilder_Link";?>');" class="artikel_img" onclick="location.href='<?php echo "http://".$_SERVER['SERVER_NAME']."/grid/ausgewaehl.php?ID=$Artikel_ID"?>';"></div>
		
		<div class="artikel_option" onclick="location.href='<?php echo "http://".$_SERVER['SERVER_NAME']."/grid/ausgewaehl.php?ID=$Artikel_ID"?>';">
			<div style="font-size: 30px;font-weight: bold;height:42px;vertical-align: middle;line-height: 42px; margin-bottom:10px;">
			<?php echo "$Artikel_Name";?>
			</div>
			<div style="font-size: 16px;font-weight: bold;height:32px;vertical-align: middle;line-height: 16px; ">
			Der Aktuelle Preis ist: <?php echo "$Preis";?>€
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
		<div class="edit_button" onclick="location.href='<?php echo "http://".$_SERVER['SERVER_NAME']."/grid/protect/artikel_edit.php?ID=$Artikel_ID"?>';">
			 <img src="edit_icon.svg" alt="Edit" height="42" width="42" style="display: block;margin: auto;height:100%;"> 
		</div>
	</div>
		
		<?php
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