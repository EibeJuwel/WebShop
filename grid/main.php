<?php
$datum = date("Y-m-d",mktime(date('G'),date('i'),date('s'),date("m"),date("d"),date("Y")))."T".date("G:i:s",mktime(date('G'),date('i'),date('s'),date("m"),date("d"),date("Y")));

$sql = "SELECT * FROM `artikel` WHERE `Enddatum` > '$datum'";
$db_erg = mysqli_query( $db, $sql );
$i = 0;
while ($zeile = mysqli_fetch_array($db_erg, MYSQLI_ASSOC)){
	
		$Artikel_ID[$i] = $zeile['ID'];
		$Artikel_Name[$i] = $zeile['Artikel_Name'];
		$user_ID[$i] = $zeile['User_ID'];
		$Preis[$i] = $zeile['Preis'];
		$Erstellungs_Datum[$i] = $zeile['Erstellungs_Datum'];
		$Enddatum[$i] = $zeile['Enddatum'];
		$Bilder_Link[$i] = $zeile['Bilder_Link'];
		$i = $i + 1;
}
?>

<style>
.sliderElements,
.sliderElements figure,
.sliderControls {
    margin: 0;
}

.sliderElements:after {
    content: ".";
    display: block;
    height: .1px;
    clear: both;
    visibility: hidden;
    font-size: 0;
    overflow: hidden;
}

.cssSlider {
    overflow-x: hidden;
}

.sliderElements {
    list-style: none;
    position: relative;
    left: 0;
    width: 400%;
    margin-bottom: .8em;
    padding: 0;
    -webkit-transition: left .8s ease-in-out;
    -moz-transition: left .8s ease-in-out;
    -o-transition: left .8s ease-in-out;
    transition: left .8s ease-in-out;
}

.sliderElements > li {
    float: left;
    width: 25%;
    position: relative;
}

#slide02:checked ~ .sliderElements {
    left: -100%;
}

#slide03:checked ~ .sliderElements {
    left: -200%;
}

#slide04:checked ~ .sliderElements {
    left: -300%;
}

.Name_slider{
    display: block;
    color: #fff;
    position: absolute;
    left: 0;
    bottom: 1em;
    padding: .4em;
    background: rgba(0,0,0,.5);
}

.countdown_slider{
    display: block;
    color: #fff;
    position: absolute;
    right: 0;
    bottom: 1em;
    padding: .4em;
    background: rgba(0,0,0,.5);
}

.sliderElements div {
    width: 100%;
    height: 360px;
}

.cssSlider input {
    position: absolute;
    left: -99999px;
}

.sliderControls {
    text-align: center;
}

.sliderControls li {
    display: inline-block;
}

.sliderControls label {
    width: 20px;
    height: 20px;
    line-height: 20px;
    text-align: center;
    border-radius: 50%;
    display: block;
    cursor: pointer;
    background: #ddd;
    color: #ddd;
	transition: all 0.15s ease-in;
}

.sliderControls label:hover,
#slide01:checked ~ .sliderControls label[for="slide01"],
#slide02:checked ~ .sliderControls label[for="slide02"],
#slide03:checked ~ .sliderControls label[for="slide03"],
#slide04:checked ~ .sliderControls label[for="slide04"] {
    background: #ff0000;
    color: #ff0000;
}
</style>

<!-- zuerst das Sichtfenster -->
<div class="cssSlider">
 
    <!-- die inputs um den Slider zu Steuern -->
    <input type="radio" name="slider" id="slide01" checked="checked">
    <input type="radio" name="slider" id="slide02">
    <input type="radio" name="slider" id="slide03">
    <input type="radio" name="slider" id="slide04">
 
    <!-- die einzelnen Slides, hier als Liste angelegt -->
    <ul class="sliderElements">
        <li>
            <figure>
                <div style="background-image: url('<?php echo $Bilder_Link[0];?>');background-size: contain;background-repeat:no-repeat;background-position: center center;cursor: pointer;" onclick="location.href='<?php echo "http://".$_SERVER['SERVER_NAME']."/grid/ausgewaehl.php?ID=$Artikel_ID[0]"?>';"></div>
				<script>
				var countdown_0Date = new Date("<?php $Ende = explode(" ",$Enddatum[0]);
				$datum = explode("-",$Ende[0]);
				$time = explode(":",$Ende[1]);
				echo "$datum[1] $datum[2]".","." $datum[0] $time[0]".":"."$time[1]".":"."$time[2]";
				?>").getTime();
				var x = setInterval(function() {
				var now = new Date().getTime();
				var distance = countdown_0Date - now;
				var days = Math.floor(distance / (1000 * 60 * 60 * 24));
				var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((distance % (1000 * 60)) / 1000);
				document.getElementById("countdown_0").innerHTML = days + "T. " + hours + "Std. "+ minutes + "m " + seconds + "s ";
				if (distance < 0) {
				clearInterval(x);
				document.getElementById("countdown_0").innerHTML = "Abgelaufen";}
				}, 1000);
				</script>
                <figcaption class="Name_slider"><?php echo $Artikel_Name[0];?></figcaption>
				<figcaption class="countdown_slider"><font id="countdown_0"></font></figcaption>
            </figure>
        </li>
        <li>
            <figure>
                <div style="background-image: url('<?php echo $Bilder_Link[1];?>');background-size: contain;background-repeat:no-repeat;background-position: center center;cursor: pointer;" onclick="location.href='<?php echo "http://".$_SERVER['SERVER_NAME']."/grid/ausgewaehl.php?ID=$Artikel_ID[1]"?>';"></div>
                <script>
				var countdown_1Date = new Date("<?php $Ende = explode(" ",$Enddatum[1]);
				$datum = explode("-",$Ende[0]);
				$time = explode(":",$Ende[1]);
				echo "$datum[1] $datum[2]".","." $datum[0] $time[0]".":"."$time[1]".":"."$time[2]";
				?>").getTime();
				var x = setInterval(function() {
				var now = new Date().getTime();
				var distance = countdown_1Date - now;
				var days = Math.floor(distance / (1000 * 60 * 60 * 24));
				var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((distance % (1000 * 60)) / 1000);
				document.getElementById("countdown_1").innerHTML = days + "T. " + hours + "Std. "+ minutes + "m " + seconds + "s ";
				if (distance < 0) {
				clearInterval(x);
				document.getElementById("countdown_1").innerHTML = "Abgelaufen";}
				}, 1000);
				</script>
                <figcaption class="Name_slider"><?php echo $Artikel_Name[1];?></figcaption>
				<figcaption class="countdown_slider"><font id="countdown_1"></font></figcaption>
            </figure>
        </li>
        <li>
            <figure>
                <div style="background-image: url('<?php echo $Bilder_Link[2];?>');background-size: contain;background-repeat:no-repeat;background-position: center center;cursor: pointer;" onclick="location.href='<?php echo "http://".$_SERVER['SERVER_NAME']."/grid/ausgewaehl.php?ID=$Artikel_ID[2]"?>';"></div>
                <script>
				var countdown_2Date = new Date("<?php $Ende = explode(" ",$Enddatum[2]);
				$datum = explode("-",$Ende[0]);
				$time = explode(":",$Ende[1]);
				echo "$datum[1] $datum[2]".","." $datum[0] $time[0]".":"."$time[1]".":"."$time[2]";
				?>").getTime();
				var x = setInterval(function() {
				var now = new Date().getTime();
				var distance = countdown_2Date - now;
				var days = Math.floor(distance / (1000 * 60 * 60 * 24));
				var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((distance % (1000 * 60)) / 1000);
				document.getElementById("countdown_2").innerHTML = days + "T. " + hours + "Std. "+ minutes + "m " + seconds + "s ";
				if (distance < 0) {
				clearInterval(x);
				document.getElementById("countdown_2").innerHTML = "Abgelaufen";}
				}, 1000);
				</script>
                <figcaption class="Name_slider"><?php echo $Artikel_Name[2];?></figcaption>
				<figcaption class="countdown_slider"><font id="countdown_2"></font></figcaption>
            </figure>
        </li>
        <li>
            <figure>
                <div style="background-image: url('<?php echo $Bilder_Link[3];?>');background-size: contain;background-repeat:no-repeat;background-position: center center;cursor: pointer;" onclick="location.href='<?php echo "http://".$_SERVER['SERVER_NAME']."/grid/ausgewaehl.php?ID=$Artikel_ID[3]"?>';"></div>
                <script>
				var countdown_3Date = new Date("<?php $Ende = explode(" ",$Enddatum[3]);
				$datum = explode("-",$Ende[0]);
				$time = explode(":",$Ende[1]);
				echo "$datum[1] $datum[2]".","." $datum[0] $time[0]".":"."$time[1]".":"."$time[2]";
				?>").getTime();
				var x = setInterval(function() {
				var now = new Date().getTime();
				var distance = countdown_3Date - now;
				var days = Math.floor(distance / (1000 * 60 * 60 * 24));
				var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((distance % (1000 * 60)) / 1000);
				document.getElementById("countdown_3").innerHTML = days + "T. " + hours + "Std. "+ minutes + "m " + seconds + "s ";
				if (distance < 0) {
				clearInterval(x);
				document.getElementById("countdown_3").innerHTML = "Abgelaufen";}
				}, 1000);
				</script>
                <figcaption class="Name_slider"><?php echo $Artikel_Name[3];?></figcaption>
				<figcaption class="countdown_slider"><font id="countdown_3"></font></figcaption>
            </figure>
        </li>
    </ul>
 
    <!-- Eine Steuerung -->
    <ul class="sliderControls">
        <li><label for="slide01">1</label></li>
        <li><label for="slide02">2</label></li>
        <li><label for="slide03">3</label></li>
        <li><label for="slide04">4</label></li>
    </ul>
</div>