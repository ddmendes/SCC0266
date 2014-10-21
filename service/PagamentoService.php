<?php

	include '../model/Pagamento.php';
	include '../repository/PagamentoRepository.php';
	include '../repository/OrdemDePagamentoRepository.php';

	class PagamentoService {

		public static function validarPagamento(Pagamento $pagamento, $orp_id) {
			$pgrepo = PagamentoRepository::getInstance();
			$oprepo = OrdemDePagamentoRepository::getInstance();

			if($pagamento->autenticarPagamento()) {
				$pgrepo->save($pagamento);
				$orp = $oprepo->get($orp_id);
				$orp->setPagamento($pagamento);
				$oprepo->update($orp);
				return true;
			} else {
				return false;
			}
		}

	}

?>