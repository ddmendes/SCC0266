<?php

	include '../resources/core.php';
	include 'Produto.php';

	class ItemDeCompra extends Produto {

		private $id;
		private $produto;
		private $quantidade;
		private $preco;

		public function __construct(Produto &$base, $quantidade, $preco = null) {
			$this->id = getUniqid();
			$this->produto = $base;
			$this->quantidade = $quantidade;
			$this->preco = $preco ? $preco : $base->getPreco();
		}

		public function getId() {
			return $this->id;
		}

		public function getId() {
			return $this->id;
		}

		public function getNome() {
			return $this->produto->getNome();
		}

		public function setNome($nome) {
			$this->produto->setNome($nome);
		}

		public function getDescricao() {
			return $this->produto->getDescricao();
		}

		public function setDescricao($descricao) {
			$this->produto->setDescricao($descricao);
		}

		public function getPreco() {
			return $this->preco * $this->quantidade;
		}

		public function setPreco($preco) {
			$this->preco = $preco;
		}

		public function getPeso() {
			return $this->produto->getPeso() * $this->quantidade;
		}

		public function setPeso($peso) {
			$this->produto->setPeso($peso);
		}

		public function getQuantidade() {
			return $this->quantidade;
		}

		public function setQuantidade($quantidade) {
			$this->quantidade = $quantidade;
		}

	}

?>