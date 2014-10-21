<?php

	include '../resources/core.php';
	include '../service/CompraService.php';
	include '../model/OrdemDePagamento.php';

	$session = SessionManager::getInstance().getSession();
	$compra = CompraService::finalizarCompra($session['usuario_id'], $session['carrinho']);
	if($compra) {
		$ordemPagamento = CompraService::gerarOrdemDePagamento($compra);
		//redirecionar para view ordemdepagamento.
	} else {
		//on failure
	}

?>