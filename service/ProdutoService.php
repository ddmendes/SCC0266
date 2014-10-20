<?php

	include '../model/Produto.php';
	include '../repository/ProdutoRepository.php';
	include '../repository/EstoqueRepository.php';

	class ProdutoService {

		public static function save(Produto $produto, $quantidade) {
			$erepo = EstoqueRepository::getInstance();
			$prepo = ProdutoRepository::getInstance();
			$prepo->save($produto);
			$erepo->push($produto, $quantidade);
			return true;
		}

		public static function update($id, $nome, $descricao, $preco, $peso) {
			$prepo = ProdutoRepository::getInstance();
			$produto = $prepo->get($id);
			$produto->setNome($nome);
			$produto->setDescricao($descricao);
			$produto->setPreco($preco);
			$produto->setPeso($peso);
			$prepo->update($produto);
			return true;
		}

		public static function updateEstoque($id, $estoque) {
			EstoqueRepository::getInstance()->push($id, $estoque);
		}

	}

?>