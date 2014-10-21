<?php

	include '../service/CarrinhoService.php';
	include '../resources/core.php';

	if(isset($_POST['prod_id']) && CarrinhoService::adcionarAoCarrinho($_POST['prod_id'], $_POST['quantidade'])) {
		//on success
	} else {
		//on failure
	}

?>