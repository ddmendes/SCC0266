<?php

	include '../model/Usuario.php';
	include '../model/Carrinho.php';
	include '../service/CarrinhoService.php';
	include '../repository/ProdutoRepository.php';
	include '../repository/UsuarioRepository.php';
	include '../resources/core.php';

	if(isset($_POST['prod_id']) && CarrinhoService::adcionarAoCarrinho($_POST['prod_id'], $_POST['quantidade'])) {
		//on success
	} else {
		//on failure
	}

?>