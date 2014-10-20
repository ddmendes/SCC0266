<?php

	include '../resources/core.php';
	include '../model/Produto.php';
	include '../model/Carrinho.php';
	include '../repository/ProdutoRepository.php';

	class CarrinhoService {

		public static function adcionarAoCarrinho($prodId, $quantidade) {
			$session = SessionManager::getInstance().getSession();
			$carrinho = $session['carrinho'] . '&' . $prodId . '#' . $quantidade;
			$session['carrinho'] = $carrinho;
			return true;
		}

		public static function buildFromString($srep) {
			$prepo = ProdutoRepository::getInstance();
			$carrinho = new Carrinho();

			$plist = split('&', $srep);
			foreach ($plist as $pline) {
				list($prod_id, $quantidade) = split('#', $pline);
				$carrinho->addProduto($prepo->get($prod_id), $quantidade);
			}

			return $carrinho;
		}

	}

?>