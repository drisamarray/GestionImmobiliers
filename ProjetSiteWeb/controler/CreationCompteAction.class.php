<?php
require_once('./controler/Action.interface.php');
class CreationCompteAction implements Action {
	public function execute(){
      require_once './model/classes/GereMembre.php';
      if (ISSET($_REQUEST["bCreationCompte"])) {
		      if (GereMembre::creerUnCompte()){
			         return "accueil";
					}
      return "pageCreationCompte";
    }
  }
}
?>
