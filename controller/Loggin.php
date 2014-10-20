<?php

	include '../service/UsuarioService.php';

	if(isset($_POST['login']) && UsuarioService::login($_POST['login'], $_POST['senha'])) {
		//on success
	} else {
		//on failure
	}

?>