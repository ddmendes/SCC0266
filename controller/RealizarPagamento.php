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
		$pagamento = new PagamentoViaCartao($cartao);
	} else {
		$sacado = new Sacado($_POST['nome'], $_POST['cpf'], $_POST['endereco']);
		$pagamento = new PagamentoViaBoleto($sacado);
	}
	if(PagamentoService::validarPagamento($pagamento, $_POST['orp_id'])) {
		//on success
	} else {
		//on failure
	}

?>