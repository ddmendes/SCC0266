<?php

	include '../resources/core.php';
	include '../model/Produto.php';

	class ProdutoRepository {
		private static $instance = null;

		private function __construct() {}

		public function save(Produto &$produto) {
			$p = $produto->toArray();
			$insert_produto = "INSERT INTO produto VALUES ($p[id], '$p[nome]', '$p[descricao]', $p[preco], $p[peso], 0);";
			$mysqli = newMysqli();
			$res = $mysqli->query($insert_produto);
			if(!$res) {
				die($mysqli->error);
			}
			$mysqli->close();
			return $res;
		}

		public function update(Produto &$update) {
			$p = $update->toArray();
			$update_produto = "UPDATE produto
				SET nome = '$p[nome]',
					descricao = '$p[descricao]',
					preco = '$p[preco]',
					peso = '$p[peso]'
				WHERE pdt_id = '$p[id]';";
			$mysqli = newMysqli();
			$res = $mysqli->query($update_produto);
			if(!$res) {
				die($mysqli->error);
			}
			$mysqli->close();
			return $res;
		}

		public function get($id) {
			$mysqli = newMysqli();
			$res = $mysqli->query("SELECT * FROM produto WHERE pdt_id = $id;");

			$p = null;
			if($res) {
				$pobj = $res->fetch_object();
				$p = new Produto($pobj->nome, $pobj->descricao, $pobj->preco, $pobj->peso, $pobj->pdt_id);
			} else {
				die($mysqli->error);
			}
			$res->free();
			$mysqli->close();
			return $p;
		}

		public static function getInstance() {
			if(ProdutoRepository::$instance == null) {
				ProdutoRepository::$instance = new ProdutoRepository();
			}
			return ProdutoRepository::$instance;
		}

	}

?>