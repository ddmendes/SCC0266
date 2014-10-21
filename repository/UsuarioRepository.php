<?php

	include '../resources/core.php';
	include '../model/Usuario.php';

	class UsuarioRepository {

		private static $instance = null;

		private function __construct() {}

		public function save(Usuario &$u) {
			$a = $u->toArray();
			$insert_usuario = "INSERT INTO usuario VALUES ($a[cpf], '$a[nome]', '$a[endereco]', '$a[email]', '$a[senha]');";
			$mysqli = newMysqli();
			$res = $mysqli->query($insert_usuario);
			if(!$res) {
				die($mysqli->error);
			}
			$mysqli->close();
			return $res;
		}

		public function get($id) {
			$mysqli = newMysqli();
			$res = $mysqli->query("SELECT * FROM usuario WHERE usr_id = $id;");

			$u = null;
			if($res) {
				$uobj = $res->fetch_object();
				$u = new Usuario($uobj->nome, $uobj->usr_cpf, $uobj->endereco, $uobj->email, $uboj->senha);
			} else {
				die($mysqli->error);
			}
			$res->free();
			$mysqli->close();
			return $u;
		}

		public function update(Usuario &$update) {
			$a = $update->toArray();
			$update_usuario = "UPDATE usuario
				SET nome = '$a[nome]',
					endereco = '$a[endereco]',
					email = '$a[email]',
					senha = '$a[senha]'
				WHERE usr_cpf = $a[cpf]";
			$mysqli = newMysqli();
			$res = $mysqli->query($update_usuario);
			if(!$res) {
				die($mysqli->error);
			}
			$mysqli->close();
			return $res;
		}

		public static function getInstance() {
			if(UsuarioRepository::$instance == null) {
				UsuarioRepository::$instance = new UsuarioRepository();
			}
			return UsuarioRepository::$instance;
		}

	}

?>