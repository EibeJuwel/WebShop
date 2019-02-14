<?php include "db_include.php"?>
<!DOCTYPE html>
<html>
<head>
<title>Tomiko's Shop</title>
<?php include "head.php"?>
</head>
<body id="re_body">
<div id="layout">
<div class="header"><?php include "header.php"?></div>
<div class="menu"><?php include "menu.php"?></div>
<div class="main main_auswahl">
<?php
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
		
		$sql_u = "SELECT `ID`, `E-Mail`, `Vorname`, `Nachname`, `Land`, `Ort`, `PLZ` FROM `user` WHERE `ID` = $user_ID ";
	$db_erg_u = mysqli_query( $db, $sql_u );

	$User_daten = mysqli_fetch_array( $db_erg_u, MYSQLI_ASSOC);
		$email = $User_daten['E-Mail'];
		$vorname = $User_daten['Vorname'];
		$nachname = $User_daten['Nachname'];

		$sql_p = "SELECT `preise`.`Datum`,`preise`.`Preis` FROM `preise` WHERE `preise`.`Artikel_ID` LIKE '$Artikel_ID' ORDER BY `preise`.`Preis` DESC";
	$db_erg_p = mysqli_query( $db, $sql_p );

	$preis_daten = mysqli_fetch_array( $db_erg_p, MYSQLI_ASSOC);
		$Preis_p = $preis_daten['Preis'];
		
	if($Preis < $Preis_p){
		$Preis = $Preis_p;
	}?>
		<div style="background-image: url('<?php echo "$Bilder_Link";?>');" class="auswahl_img" ></div>
		<div class="auswahl_option">
			<div style="font-size: 30px;font-weight: bold;height:42px;vertical-align: middle;line-height: 16px; margin-bottom:18px;">
			<?php echo "$Artikel_Name";?><br>
			<font style="font-size: 12px;">von <?php echo "$vorname $nachname";?></font>
			</div>
			
			<div style="width:100%;font-size: 16px;font-weight: bold;height:64px;vertical-align: middle;line-height: 16px;margin-bottom:18px;">
			Preis: <?php echo "$Preis";?>€
			<br>
			<font style="font-size: 12px;">zahlungsart: <?php echo "$Zahlungsart";?></font>
			<br>
		<?php
		$datum_aktu = date('Y-m-d',mktime(date('G'),date('i'),date('s'),date("m"),date("d"),date("Y")))." ".date("G:i:s",mktime(date('G'),date('i'),date('s'),date("m"),date("d"),date("Y")));
		if($Enddatum >= $datum_aktu){
		?>
			<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" onclick="location.href='<?php echo "http://".$_SERVER['SERVER_NAME']."/grid/protect/bieten.php?artikel-id=$Artikel_ID"?>';">
			Bieten
			</button>
		<?php
		}
		?>
			</div>
			
			<script>
			// Set the date we're counting down to
			var countDownDate = new Date("<?php $Ende = explode(" ",$Enddatum);
			
			$datum = explode("-",$Ende[0]);
			$time = explode(":",$Ende[1]);
			echo "$datum[1] $datum[2]".","." $datum[0] $time[0]".":"."$time[1]".":"."$time[2]";
			
			?>").getTime();

			// Update the count down every 1 second
			var x = setInterval(function() {

			// Get todays date and time
			var now = new Date().getTime();
    
			// Find the distance between now an the count down date
			var distance = countDownDate - now;
    
			// Time calculations for days, hours, minutes and seconds
			var days = Math.floor(distance / (1000 * 60 * 60 * 24));
			var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
			// Output the result in an element with id="countdown"
			document.getElementById("countdown").innerHTML = days + "T. " + hours + "Std. "
			+ minutes + "m " + seconds + "s ";
    
			// If the count down is over, write some text 
			if (distance < 0) {
				clearInterval(x);
				document.getElementById("countdown").innerHTML = "Abgelaufen";
			}
			}, 1000);
			</script>
			<div style="width:100%;font-size: 12px;font-weight: bold;height:28px;vertical-align: middle;line-height: 16px;margin-bottom:18px;">
			Auktion Start: <?php echo "$Erstellungs_Datum";?><br>
			Auktion endet in: <font id="countdown" style="font-size: 12px;"></font>
			</div>
			<div style="width:100%;font-size: 12px;font-weight: bold;height:16px;vertical-align: middle;line-height: 16px;margin-bottom:64px;">
			Hersteller: <?php echo "$Marke_Hersteller";?> <br>
			Modell: <?php echo "$Modell";?> <br>
			Art: <?php echo "$Art";?> <br>
			</div>
			<div style="width:100%;font-size: 12px;font-weight: bold;height:16px;vertical-align: middle;line-height: 16px; ">
			Beschreibung:<br><?php echo "$Beschreibung";?>
			
			</div>
		</div>
<?php
	}else{
	
	}
?></div>
<div class="footer"><?php include "footer.php"?></div>
</div>
</body>
</html>

