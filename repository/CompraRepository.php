<?php

	include '../resources/core.php';
	include '../model/Compra.php';
	include '../model/ItemDeCompra.php';
	include '../model/Produto.php';
	include 'UsuarioRepository.php';
	inlcude 'ProdutoRepository.php';

	class CompraRepository {
		private static $instance = null;

		private function __construct() {}

		public function save(Compra &$compra) {
			$c = $compra->toArray();
			$insere_compra = "INSERT INTO compra VALUES ($c[cmp_id], $c[usr_id]);";
			$mysqli = newMysqli();
			$rel = $mysqli->query($insere_compra);

			if($rel) {
				$i = $c['iterator'];
				while($i->hasNext()) {
					$ic = $i->next()->toArray();
					$insere_item_compra = "INSERT INTO produto_compra VALUES ($c[cmp_id], $ic[pdt_id], $ic[preco], $ic[quantidade]);";
					$res = $mysqli->query($insere_item_compra);
					if(!$res) {
						die($mysqli->error);
					}
				}
			} else {
				die($mysqli->error);
			}
			$mysqli->close();
			return $res
		}

		public function get($id) {
			$urepo = UsuarioRepository::getInstance();
			$prepo = ProdutoRepository::getInstance();
			$busca_compra = "SELECT * FROM compra WHERE cmp_id = $id";
			$mysqli = newMysqli();
			$res = $mysqli->query($busca_compra);

			$c = null;
			if($res) {
				$cobj = $res->fetch_object();
				$c = new Compra($urepo->get($cobj->usr_cpf));
				$busca_item_compra = "SELECT * FROM produto_compra WHERE cmp_id = $id;";
				$res = $mysqli->query($busca_item_compra);

				if($res) {
					$r = fetchAllAsObject($res);
					$res->free();
					foreach ($r as $ic) {
						$item = new ItemDeCompra($prepo->get($ic->pdt_id), $ic->preco, $ic->quantidade);
						$c->addItem($item);
					}
				} else {
					die($mysqli->error);
				}

				$mysqli->close();
				return $c;
			}
		}

		public static function getInstance() {
			if(CompraRepository::$instance == null) {
				CompraRepository::$instance = new CompraRepository();
			}
			return CompraRepository::$instance;
		}
	}

?>