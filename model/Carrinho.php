<?php
	
	include '../resources/core.php'
	include 'ItemDeCompra.php'

	class Carrinho {

		private $id;
		private $produtos;
		private $pcount;
		private $usuario;

		public function __construct() {
			$this->id = getUniqid();
			$this->produtos = array();
			$this->pcount = array();
		}

		public function getId() {
			return $this->id;
		}

		public function addProduto(Produto &$item, $quantidade) {
			$this->produtos[$item->getId()] = array($item, $quantidade);
		}

		public function removeProduto($id) {
			$rem = $this->produtos[$id];
			unset($this->produtos[$id]);
			return $rem;
		}

		public function getProdutos() {
			return $this->produtos;
		}

		public function iterator() {
			return null;
		}

	}

	class CarrinhoIterator {

		private $list;
		private $keys;
		private $i;

		public function __construct(Carrinho &$c) {
			$this->list = $c->getProdutos();
			$this->keys = array_keys($this->list);
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