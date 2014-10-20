<?php

	include '../resources/core.php';

	class Sacado {

		private $nome;
		private $cpf;
		private $endereco;

		public function __construct($nome, $cpf, $endereco) {
			$this->nome = $nome;
			$this->cpf = $cpf;
			$this->endereco = $endereco;
		}

		public function getId() {
			return $this->cpf;
		}

		public function getNome() {
			return $this->nome;
		}

		public function setNome($nome) {
			$this->nome = $nome;
		}

		public function getCpf() {
			return $this->cpf;
		}

		public function setCpf($cpf) {
			$this->cpf = $cpf;
		}

		public function getEndereco() {
			return $this->endereco;
		}

		public function setEndereco($endereco) {
			$this->endereco = $endereco;
		}
	}

?>