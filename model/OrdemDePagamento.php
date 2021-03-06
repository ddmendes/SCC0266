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

		public function getTotal() {
			return $this->compra->getTotal();
		}

		public function toArray() {
			return array(
					'orp_id' => $this->id,
					'cmp_id' => $this->compra->getId();
					'pag_id' => $this->pagamento->getId();
				);
		}

	}

?>