<?php

	include '../resources/core.php';
	include 'Produto.php';
	include 'Carrinho.php';
	include 'ItemDeCompra.php';
	include 'Usuario.php';
	include 'AbstractIterator.php';

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

		public function toArray() {
			return array(
					'cmp_id'   => $this->id,
					'usr_id'   => $this->usuario->getId(),
					'iterator' => $this->iterator()
				);
		}

		public function iterator() {
			return new CompraIterator($this);
		}

	}

	class CompraIterator extends AbstractIterator {

		private $list;
		private $keys;
		private $i;

		public function __construct(Compra &$c) {
			$this->list = $c;
			$this->keys = array_keys($c);
			$this->i = -1;
		}

		public function hasNext() {
			return $this->i < count($this->keys);
		}

		public function next() {
			return $this->list[ $this->keys[ ++$this->i ] ];
		}

	}

?>