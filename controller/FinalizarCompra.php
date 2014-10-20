<?php

	include '../resources/core.php';
	include '../service/CarrinhoService.php';
	include '../service/CompraService.php';
	include '../repository/UsuarioRepository.php';
	include '../model/OrdemDePagamento.php';

	$urepo = UsuarioRepository::getInstance();
	$session = SessionManager::getInstance().getSession();
	$carrinho = CarrinhoService::buildFromString($srep);
	$compra = CompraService::finalizarCompra($urepo->get($session['usuario_id']), $carrinho);
	if($compra) {
		$ordemPagamento = CompraService::gerarOrdemDePagamento($compra);
		//redirecionar para view ordemdepagamento.
	} else {
		//on failure
	}

?>