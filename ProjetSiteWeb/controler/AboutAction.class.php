<?php
require_once('./controler/Action.interface.php');
class AboutAction implements Action {
	public function execute(){
		if (!ISSET($_SESSION)) session_start();
		UNSET($_SESSION["connected"]);
		session_destroy();
		return "about";
	}
}
?>
