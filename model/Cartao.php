<?php

	include '../resources/core.php';

	class Cartao {

		private $codigo;
		private $codSeguranca;
		private $portador;
		private $cpfPortador;
		private $validade;

		public function __construct($codigo, $codSeguranca, $portador, $cpfPortador, $validade) {
			$this->codigo = $codigo;
			$this->codSeguranca = $codSeguranca;
			$this->portador = $portador;
			$this->cpfPortador = $cpfPortador;
			$this->validade = $validade;
		}

		public function getId() {
			return $this->codigo;
		}

		public function getCodigo(codigo) {
			return $this->codigo;
		}

		public function setCodigo($codigo) {
			$this->codigo = $codigo;
		}

		public function getCodSeguranca() {
			return $this->codSeguranca;
		}

		public function setCodSeguranca($codSeguranca) {
			$this->codSeguranca = $codSeguranca;
		}

		public function getPortador() {
			return $this->portador;
		}

		public function setPortador($portador) {
			$this->portador = $portador;
		}

		public function getCpfPortador() {
			return $this->cpfPortador;
		}

		public function setCpfPortador($cpfPortador) {
			$this->cpfPortador = $cpfPortador;
		}

		public function getValidade() {
			return $this->validade;
		}

		public function setValidade($validade) {
			$this->validade = $validade;
		}

	}

?>