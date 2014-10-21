<?php

	include '../resources/core.php';

	class Produto {

		private $id;
		private $nome;
		private $descricao;
		private $preco;
		private $peso;

		public function __construct($nome, $descricao, $preco, $peso, $id = null) {
			$this->id = $id ? $id : getUniqid();
			$this->nome = $nome;
			$this->descricao = $descricao;
			$this->preco = $preco;
			$this->peso = $peso;
		}

		public function getId() {
			return $this->id;
		}

		public function getNome() {
			return $this->nome;
		}

		public function setNome($nome) {
			$this->nome = $nome;
		}

		public function getDescricao() {
			return $this->descricao;
		}

		public function setDescricao($descricao) {
			$this->descricao = $descricao;
		}

		public function getPreco() {
			return $this->preco;
		}

		public function setPreco($preco) {
			$this->preco = $preco;
		}

		public function getPeso() {
			return $this->peso;
		}

		public function setPeso($peso) {
			$this->peso = $peso;
		}

		public function toArray() {
			return array(
					'id'       => $this->id,
					'nome'     => $this->nome,
					'descrcao' => $this->descricao,
					'preco'    => $this->preco,
					'peso'     => $this->peso
				);
		}

	}

?>