<?php

	include '../resources/core.php';
	include 'Sacado.php';
	include 'Cartao.php';
	include 'OrdemDePagamento.php';

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
		private $ordemPagamento

		public function __construct(Cartao &$cartao, OrdemDePagamento &$ordemPagamento) {
			$this->id = getUniqid();
			$this->cartao = $cartao;
			$this->ordemPagamento = $ordemPagamento;
		}

		public function autenticarPagamento() {
			$this->setAutenticacao("CC".((string) getUniqid()));
			return true;
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
		private $ordemPagamento;

		public function __construct(Sacado &$sacado, OrdemDePagamento &$ordemPagamento) {
			$this->id = getUniqid();
			$this->sacado = $sacado;
			$this->ordemPagamento = $ordemPagamento;
		}

		public function autenticarPagamento() {
			$this->setAutenticacao("BL".((string) getUniqid()));
			return true;
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