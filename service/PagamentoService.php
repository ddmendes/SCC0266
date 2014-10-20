<?php

	include '../model/OrdemDePagamento.php';
	include '../model/Pagamento.php';
	include '../model/Cartao.php';
	include '../model/Sacado.php';
	include '../repository/PagamentoRepository.php';

	class PagamentoService {

		public static function validarPagamento(Pagamento $pagamento) {
			$pgrepo = PagamentoRepository::getInstance();

			if($pagamento->autenticarPagamento()) {
				$pgrepo->save($pagamento);
				return true;
			} else {
				return false;
			}
		}

	}

?>