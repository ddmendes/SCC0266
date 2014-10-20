<?php

	include '../resources/core.php';
	include 'Produto.php';
	include 'Carrinho.php';
	include 'ItemDeCompra.php';
	include 'Usuario.php';

	class Compra {

		private $id;
		private $usuario;
		private $itens;

		public function __construct(Usuario &$usuario) {
			$this->id = getUniqid();
			$this->usuario = $usuario;
			$this->itens = array();
		}

		public function getId() {
			return $this->id;
		}

		public function addItem(ItemDeCompra &$item) {
			$this->itens[$item->getId()] = $item;
		}

		public function removeItem($id) {
			unset($this->itens[$id]);
		}

		public function getTotal() {
			$tot = 0;
			foreach($this->itens as &$i) {
				$tot += $i->getPreco();
			}
			return $tot;
		}

		public function getCount() {
			return count($this->itens);
		}

		public function iterator() {
			return null;
		}

	}

?>