<?php

	include '../model/Usuario.php';

	abstract class Builder {

		abstract function buildPart($part);

		abstract function getProduct();

	}

	class CompraBuilder {

		private $compra;

		public function __construct(Usuario &$usuario) {
			$this->compra = new Compra($usuario);
		}

		public function buildPart($part) {
			$this->compra->addItem(new ItemDeCompra($part[0], $part[1]));
		}

		public function getProduct() {
			return $this->compra;
		}

	}

?>