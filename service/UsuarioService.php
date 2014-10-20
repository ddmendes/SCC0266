<?php

	include '../resources/core.php';
	include '../model/Usuario.php';
	include '../repository/UsuarioRepository.php';

	class UsuarioService {

		public static function save(Usuario $u) {
			$urepo = UsuarioRepository::getInstance();
			$urepo->save($u);
			return true;
		}

		public static function login($login, $senha) {
			$bfish = UsuarioRepository::getInstance()->get($login)->getSenha();
			if(bfishCheck($senha, $bfish)) {
				$session = SessionManager::getInstance()->getSession();
				$session['usuario_id'] = $login;
			}
		}

	}

?>