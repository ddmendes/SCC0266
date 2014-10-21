<?php

	include '../resources/core.php';
	include '../model/OrdemDePagamento.php';
	include '../model/Pagamento.php';
	include 'CompraRepository.php';
	include 'PagamentoRepository.php';

	class OrdemDePagamentoRepository {

		private static $instance = null;

		private function __construct() {}

		public function save(OrdemDePagamento &$orp) {
			$o = $orp->toArray();
			$insert_orp = "INSERT INTO ordem_de_pagamento VALUES ($o[orp_id], $o[cmp_id], $o[pag_id]);";
			$mysqli = newMysqli();
			$res = $mysqli->query($insert_orp);
			if(!$res) {
				die($mysqli->error);
			}
			$mysqli->close();
			return $res;
		}

		public function get($id) {
			$crepo = CompraRepository::getInstance();
			$pgrepo = PagamentoRepository::getInstance();
			$mysqli = newMysqli();
			$res = $mysqli->query("SELECT * FROM ordem_de_pagamento WHERE orp_id = $id;");

			$o = null;
			if($res) {
				$oobj = $res->fetch_object();
				$res->free();
				$o = new OrdemDePagamento($crepo->get($oobj->cmp_id));
				$o->setPagamento($pgrepo->get($oobj->pag_id));
			}

			$mysqli->close();
			return $o;
		}

		public function update(OrdemDePagamento &$update) {
			$o = $update->toArray();
			$update_orp = "UPDATE ordem_de_pagamento SET cmp_id = $o[cmp_id], pag_id = $o[pag_id] WHERE orp_id = $o[orp_id];";
			$mysqli = newMysqli();
			$res = $mysqli->query($update_orp);
			if(!$res) {
				die($mysqli->error);
			}
			$mysqli->close();
			return $res;
		}

		public static function getInstance() {
			if(OrdemDePagamentoRepository::$instance == null) {
				OrdemDePagamentoRepository::$instance = new OrdemDePagamentoRepository();
			}
			return OrdemDePagamentoRepository::$instance;
		}
	}

?>