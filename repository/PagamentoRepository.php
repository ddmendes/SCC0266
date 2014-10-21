<?php

	include '../resources/core.php';
	include '../model/Pagamento.php';
	include '../model/Cartao.php';
	include '../model/Sacado.php';

	class PagamentoRepository {

		private static $instance = null;

		private function __construct() {}

		public function save(Pagamento &$pagamento) {
			$p = $pagamento->toArray();
			$insert_pagamento = "INSERT INTO pagamento VALUES (
					$p[pag_id],
					'$p[autenticacao]',
					'$p[tipo]',
					'$p[nome]',
					'$p[cpf]',
					'$p[b_endereco]',
					'$p[c_cod]',
					'$p[c_cod_seg]',
					$p[c_validade]
				);";
			$mysqli = newMysqli();
			$res = $mysqli->query($insert_pagamento);
			if(!$res) {
				die($mysqli->error);
			}
			$mysqli->close();
			return $res;
		}

		public function get($id) {
			$mysqli = newMysqli();
			$res = $mysqli->query("SELECT * FROM pagamento WHERE pag_id = $id;");

			$p = null;
			if($res) {
				$pobj = $res->fetch_object();
				if($pobj['tipo'] == 'c') {
					$sacado = new Sacado($pobj['nome'], $pobj['cpf'], $pobj['b_endereco']);
					$p = new PagamentoViaBoleto($sacado);
				} else {
					$cartao = new Cartao($pobj['c_cod'], $pobj['c_cod_seg'], $pobj['nome'], $pobj['cpf'], $pobj['c_validade']);
					$p = new PagamentoViaCartao($cartao);
				}
				$p->setAutenticacao($pobj['autenticacao']);
			} else {
				die($mysqli->error);
			}
			$res->free();
			$mysqli->close();
			return $p;
		}

		public static function getInstance() {
			if(PagamentoRepository::$instance == null) {
				PagamentoRepository::$instance = new PagamentoRepository();
			}
			return PagamentoRepository::$instance;
		}		
	}

?>