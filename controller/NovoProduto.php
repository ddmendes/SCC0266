<?php

	include '../service/ProdutoService.php';

	if(isset($_POST['nome'])) {

		$produto = new Produto($_POST['nome'], $_POST['descricao'], $_POST['preco'], $_POST['peso']);
		if(ProdutoService::save($produto)) {
			//on success
		} else {
			//on failure
		}

	}

?>