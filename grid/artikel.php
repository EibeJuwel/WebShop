<?php include "db_include.php"?>
<!DOCTYPE html>
<html>
<head>
<title>Tomiko's Shop - Startseite</title>
<?php include "head.php"?>
</head>
<body id="re_body">
<div id="layout">
<div class="header"><?php include "header.php"?></div>
<div class="menu"><?php include "menu.php"?></div>
<div class="main"><?php
if(isset($_GET['search'])){
	$search = $_GET['search'];
$datum = date("Y-m-d",mktime(date('G'),date('i'),date('s'),date("m"),date("d"),date("Y")))."T".date("G:i:s",mktime(date('G'),date('i'),date('s'),date("m"),date("d"),date("Y")));
$sql = "SELECT `ID`, `User_ID`, `Artikel_Name`, `Preis`, `Zahlungsart`, `Erstellungs_Datum`, `Enddatum`, `Marke_Hersteller`, `Art`, `Modell`, `Farbe`, `Bilder_Link` FROM `artikel` WHERE `Artikel_Name` REGEXP '$search' and `Enddatum` > '$datum'";
	$db_erg = mysqli_query( $db, $sql );

	while ($zeile = mysqli_fetch_array( $db_erg, MYSQLI_ASSOC))
	{
		$Artikel_ID = $zeile['ID'];
		$Artikel_Name = $zeile['Artikel_Name'];
		$Preis = $zeile['Preis'];
		$Zahlungsart = $zeile['Zahlungsart'];
		$Erstellungs_Datum = $zeile['Erstellungs_Datum'];
		$Enddatum = $zeile['Enddatum'];
		$Bilder_Link = $zeile['Bilder_Link'];
		$Modell = $zeile['Modell'];
		$Marke_Hersteller = $zeile['Marke_Hersteller'];

		$sql_p = "SELECT `preise`.`Datum`,`preise`.`Preis` FROM `preise` WHERE `preise`.`Artikel_ID` LIKE '$Artikel_ID' ORDER BY `preise`.`Preis` DESC";
	$db_erg_p = mysqli_query( $db, $sql_p );

	$preis_daten = mysqli_fetch_array( $db_erg_p, MYSQLI_ASSOC);
		$Preis_p = $preis_daten['Preis'];
		
	if($Preis < $Preis_p){
		$Preis = $Preis_p;
	}?>
	<div class="artikel_div" onclick="location.href='<?php echo "http://".$_SERVER['SERVER_NAME']."/grid/ausgewaehl.php?ID=$Artikel_ID"?>';">
		<div style="background-image: url('<?php echo "$Bilder_Link";?>');" class="artikel_img" ></div>
		<div class="artikel_option">
			<div style="font-size: 30px;font-weight: bold;height:42px;vertical-align: middle;line-height: 42px; margin-bottom:10px;">
			<?php echo "$Artikel_Name";?>
			</div>
			<div style="width:100%;font-size: 12px;font-weight: bold;height:36px;vertical-align: middle;line-height: 16px; ">
			Preis: <?php echo "$Preis";?>€ <br>zahlungsart: <?php echo "$Zahlungsart";?>
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
			
			<div style="width:100%;font-size: 12px;font-weight: bold;height:28px;vertical-align: middle;line-height: 12px; ">
			Auktion ende:<br><font id="countdown_<?php echo $Artikel_ID;?>"></font>
			</div>
			<div style="width:100%;font-size: 12px;font-weight: bold;height:16px;vertical-align: middle;line-height: 16px; ">
			Hersteller:<?php echo "$Marke_Hersteller";?> | Modell:<?php echo "$Modell";?>
			</div>
		</div>
	</div>
<?php
	}
}
?></div>
<div class="footer"><?php include "footer.php"?></div>
</div>
</body>
</html>

