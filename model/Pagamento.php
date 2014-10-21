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

		public function __construct(Cartao &$cartao) {
			$this->id = getUniqid();
			$this->cartao = $cartao;
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

		public function toArray() {
			return array(
					'pag_id' => $this->id,
					'autenticacao' => $this->getAutenticacao(),
					'tipo' => 'c',
					'nome' => $this->cartao->getPortador(),
					'cpf' => $this->cartao->getCpfPortador(),
					'b_endereco' => '',
					'c_cod' => $this->cartao->getCodigo(),
					'c_cod_seg' => $this->cartao->getCodSeguranca(),
					'c_validade' => $this->cartao->getValidade()
				);
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

		public function toArray() {
			return array(
					'pag_id' => $this->id,
					'autenticacao' => $this->getAutenticacao(),
					'tipo' => 'b',
					'nome' => $this->sacado->getNome(),
					'cpf' => $this->sacado->getCpf(),
					'b_endereco' => $this->sacado->getEndereco(),
					'c_cod' => '',
					'c_cod_seg' => '',
					'c_validade' => ''
				);
		}

	}

?>