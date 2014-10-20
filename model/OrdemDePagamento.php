<?php

	include '../resources/core.php';
	include 'Compra.php';
	include 'Pagamento.php';

	class OrdemDePagamento {

		private $id;
		private $compra;
		private $pagamento;

		public function __construct(Compra &$compra) {
			$this->id = getUniqid();
			$this->compra = $compra;
			$this->pagamento = null;
		}

		public function getId() {
			return $this->id;
		}

		public function getCompra() {
			return $this->compra;
		}

		public function setCompra(Compra &$compra) {
			$this->compra = $compra;
		}

		public function getPagamento() {
			return $this->pagamento;
		}

		public function setPagamento(Pagamento &$pagamento) {
			$this->pagamento = $pagamento;
		}

	}

?>