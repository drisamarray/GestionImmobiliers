<?php
require_once('./controler/DefaultAction.class.php');
require_once('./controler/AboutAction.class.php');
require_once('./controler/AgentsAction.class.php');
require_once('./controler/BlogAction.class.php');
require_once('./controler/ContactAction.class.php');
require_once('./controler/ChercherAction.class.php');
require_once('./controler/DetailsAction.class.php');
require_once('./controler/BlogDetailsAction.class.php');
require_once('./controler/FormulaireCompteAction.class.php');
require_once('./controler/CreationCompteAction.class.php');

class ActionBuilder{
	public static function getAction($nom){
		switch ($nom)
		{
			case "connection"  :
				return new LoginAction();
			break;
			case "creerCompteMembre" :
				return new CreationCompteAction();
			break;
			case "deconnection" :
				return new LogoutAction();
			break;
			case "pageAbout" :
				return new AboutAction();
			break;
			case "pageAgents" :
				return new AgentsAction();
			break;
			case "pageBlog" :
				return new BlogAction();
			break;
			case "pageContact" :
				return new ContactAction();
			break;
			case "pageChercher" :
				return new ChercherAction();
			break;
			case "pageDetails" :
				return new DetailsAction();
			break;
			case "pageBlogDetails" :
				return new BlogDetailsAction();
			break;
			case "formulaireCompte" :
				return new FormulaireCompteAction();
			break;
			/*case "rechercherAjax" :
				return new RechercherAjaxAction();
			break;*/
			default :
				return new DefaultAction();
		}
	}
}
