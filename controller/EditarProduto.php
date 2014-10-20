<?php

	include '../service/ProdutoService.php';

	if(isset($_POST['prod_id'])) {
		ProdutoService::update($_POST['prod_id'],$_POST['nome'], $_POST['descricao'], $_POST['preco'], $_POST['peso']);
		if(((int) $_POST['estoque']) > 0) {
			ProdutoService::updateEstoque($_POST['prod_id'], $_POST['estoque']);
		}
	}

?>