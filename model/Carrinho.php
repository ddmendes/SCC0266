<?php
	
	include '../resources/core.php'
	include 'ItemDeCompra.php'

	class Carrinho {

		private $id;
		private $produtos;
		private $usuario;

		public function __construct(Usuario &$dono) {
			$this->id = getUniqid();
			$this->usuario = $dono;
			$this->produtos = array();
		}

		public function getId() {
			return $this->id;
		}

		public function addProduto(Produto &$item) {
			$this->produtos[$item->getId()] = $item;
		}

		public function removeProduto($id) {
			$rem = $this->produtos[$id];
			unset($this->produtos[$id]);
			return $rem;
		}

		public function iterator() {
			return null;
		}

	}

?>