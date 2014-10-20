<?php

	/**
	 * Geração de identificações únicas.
	 */
	function getUniqid() {
		return hexdec(uniqid( ceil(rand()/1000) ));
	}

	/**
	 * Encriptação de senhas com algorítmo blowfish.
	 */
	function bfishCrypt($senha) {
		return crypt($senha, '$2a$13$' . bin2hex(openssl_random_pseudo_bytes(22)));
	}

	function bfishCheck($senha, $bfish) {
		return $bfish == crypt($senha, $bfish);
	}

	class SessionManager {

		private $session = null;
		private static $instance = null;

		private function __construct() {
			session_start();
			$this->session = $_SESSION;
		}

		public static function getInstance() {
			if(SessionManager::$instance == null) {
				SessionManager::$instance = new SessionManager();
			}
			return SessionManager::$instance;
		}

		public function getSession() {
			return $this->session;
		}

	}

?>