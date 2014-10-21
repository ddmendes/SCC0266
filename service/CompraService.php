<?php

	include '../resources/core.php';
	include '../repository/UsuarioRepository.php';
	include '../repository/CompraRepository.php';
	include '../repository/OrdemDePagamentoRepository.php';
	include '../repository/EstoqueRepository.php';
	include '../model/Compra.php';
	include '../model/Usuario.php';
	include '../model/Carrinho.php';
	include '../model/OrdemDePagamento.php';
	include 'Builder.php';
	include 'CarrinhoService.php';


	class CompraService {

		public static function finalizarCompra($idUsuario, $strCarrinho) {
			$urepo = UsuarioRepository::getInstance();
			$erepo = EstoqueRepository::getInstance();
			$crepo = CompraRepository::getInstance();
			$carrinho = CarrinhoService::buildFromString($strCarrinho);
			$usuario = $urepo->get($idUsuario);
			
			$builder = new CompraBuilder($usuario);
			$iter = $carrinho->iterator();

			while($iter->hasNext()) {
				$line = $iter->next();
				$builder->buildPart( $line );
				$erepo->pop($line[0], $line[1]);
			}

			$compra = $builder->getProduct();
			$crepo->save($compra);
			return $compra;
		}

		public static function gerarOrdemDePagamento(Compra $compra) {
			$oprepo = OrdemDePagamentoRepository::getInstance();
			$ordemPagamento = new OrdemDePagamento($compra);
			$oprepo->save($ordemPagamento);
			return $ordemPagamento;
		}

	}

?>