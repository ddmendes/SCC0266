<?php

	include '../resources/core.php';
	include '../repository/OrdemDePagamentoRepository.php';
	include '../service/PagamentoService.php';
	include '../model/OrdemDePagamento.php';
	include '../model/Pagamento.php';
	include '../model/Cartao.php';
	include '../model/Sacado.php';

	$pagamento = null;
	$oprepo = OrdemDePagamentoRepository::getInstance();
	if(isset($_POST['pagamento']) && $_POST['pagamento'] == 'cartao') {
		$cartao = new Cartao($_POST['codigo'], $_POST['cod_seguranca'], $_POST['nome'], $_POST['cpf'], $_POST['validade']);
		$pagamento = new PagamentoViaCartao($cartao, $oprepo->get($_POST['ordem_pagamento']));
	} else {
		$sacado = new Sacado($_POST['nome'], $_POST['cpf'], $_POST['endereco']);
		$pagamento = new PagamentoViaBoleto($sacado, $oprepo->get($_POST['ordem_pagamento']));
	}
	if(PagamentoService::validarPagamento($pagamento)) {
		//on success
	} else {
		//on failure
	}

?>