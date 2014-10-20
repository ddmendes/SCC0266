<?php

	include '../resources/core.php';
	include '../model/Usuario.php';
	include '../service/UsuarioService.php';

	if(isset($_POST['nome'])) {

		$senha = bfishCrypt($_POST['senha']);
		$usuario = new Usuario($_POST['nome'], $_POST['cpf'], $_POST['endereco'], $_POST['email'], $senha);
		if(UsuarioService::save($usuario)) {
			//on success
		} else {
			//on failure
		}

	}

?>