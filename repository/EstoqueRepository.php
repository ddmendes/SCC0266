<?php

	include '../resources/core.php';

	class EstoqueRepository {
		
		private static $instance = null;

		private function __construct() {}

		public function push($p, $q) {
			$pdt_id = ($p instanceof Produto) ? $p->getId() : $p;
			$mysqli = newMysqli();
			$res = $mysqli->query("UPDATE produto SET estoque = estoque + ($q) WHERE pdt_id = $pdt_id;");
			if(!$res) {
				die($mysqli->error);
			}
			$mysqli->close();
			return $res;
		}

		public function pop($p, $q) {
			$pdt_id = ($p instanceof Produto) ? $p->getId() : $p;
			$mysqli = newMysqli();
			$res = $mysqli->query("UPDATE produto SET estoque = estoque - ($q) WHERE pdt_id = $pdt_id;");
			if(!$res) {
				die($mysqli->error);
			}
			$mysqli->close();
			return $res;
		}

		public static function getInstance() {
			if(EstoqueRepository::$instance == null) {
				EstoqueRepository::$instance = new EstoqueRepository();
			}
			return EstoqueRepository::$instance;
		}

	}

?>