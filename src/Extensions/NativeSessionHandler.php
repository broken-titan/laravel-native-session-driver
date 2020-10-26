<?php

	namespace BrokenTitan\NativeSessionDriver\Extensions;

	class NativeSessionHandler implements \SessionHandlerInterface {
		protected $data;

		public function __construct(?string $namespace = "laravel")  {
	        if (session_status() == PHP_SESSION_NONE) {
				session_start();
			}

			if (!empty($namespace)) {
				if(!isset($_SESSION[$namespace])) {
					$_SESSION[$namespace] = [];
				}
				$this->data = &$_SESSION[$namespace];
			} else {
				$this->data = &$_SESSION;
			}
		}

		public function open($savePath, $sessionName) {}

		public function close() {
			session_write_close();
		}

		public function read($sessionId) {
			return $this->data;
		}

		public function write($sessionId, $data) {
			$this->data = $data;
		}

		public function destroy($sessionId) {
			session_destroy();
        	session_regenerate_id(true);
		}

		public function gc($lifetime) {}
	}