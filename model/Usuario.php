<?php

	include '../resources/core.php';

	class Usuario {

		private $nome;
		private $cpf;
		private $endereco;
		private $email;
		private $senha;

		public function __construct($nome, $cpf, $endereco, $email, $senha) {
			$this->nome = $nome;
			$this->cpf = $cpf;
			$this->endereco = $endereco;
			$this->email = $email;
			$this->senha = $senha;
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

		public function getEmail() {
			return $this->email;
		}

		public function setEmail($email) {
			$this->email = $email;
		}

		public function getSenha() {
			return $this->senha;
		}

		public function setSenha($senha) {
			$this->senha = $senha;
		}

	}

?>