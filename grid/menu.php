<form action="<?php echo "http://".$_SERVER['SERVER_NAME']."/grid/artikel.php";?>" method="get">

	<div class="mdl-textfield mdl-js-textfield" id="search_input">
		<input class="mdl-textfield__input" type="text" name="search" style="text-align: center;" placeholder="Nach Artikel suchen">
		<label class="mdl-textfield__label" ></label>
	</div>
	<div class="mdl-textfield mdl-js-textfield" id="search_button">
		<button class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored" style="transform:translateY(35.5px);">
			<img src="<?php echo "http://".$_SERVER['SERVER_NAME']."/grid/search_icon.svg";?>" alt="Login_Symbol" style="transform: scale(1.0);">
		</button>
	</div>
	
</form>