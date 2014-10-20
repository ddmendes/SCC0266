<?php

	include '../resources/core.php';
	include 'Sacado.php';
	include 'Cartao.php';

	abstract class Pagamento {

		private $autenticacao;

		abstract private function autenticarPagamento();

		public function getAutenticacao() {
			$this->autenticacao;
		}

		public function setAutenticacao($autenticacao) {
			$this->autenticacao = $autenticacao;
		}

	}

	class PagamentoViaCartao extends Pagamento {

		private $id;
		private $cartao;

		public function __construct(Cartao &$cartao) {
			$this->id = getUniqid();
			$this->cartao = $cartao;
		}

		public function autenticarPagamento() {
			$this->setAutenticacao("CC".((string) getUniqid()));
		}

		public function getId() {
			$this->id;
		}

		public function getCartao() {
			$this->cartao;
		}

		public function set(Cartao &$cartao) {
			$this->cartao = $cartao;
		}


	}

	class PagamentoViaBoleto extends Pagamento {

		private $id;
		private $sacado;

		public function __construct(Sacado &$sacado) {
			$this->id = getUniqid();
			$this->sacado = $sacado;
		}

		public function autenticarPagamento() {
			$this->setAutenticacao("BL".((string) getUniqid()));
		}

		public function getId() {
			$this->id;
		}

		public function getSacado() {
			return $this->sacado;
		}

		public function setSacado(Sacado &$sacado) {
			$this->sacado = $sacado;
		}

	}

?>