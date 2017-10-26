<?php
// -- Contrôleur frontal --
require_once('./controler/ActionBuilder.class.php');
require_once('./controler/RequirePRGAction.interface.php');
require_once('./controler/RequestAjaxAction.interface.php');
$action = NULL;
$vue = NULL;
if (ISSET($_REQUEST["action"]))
	{
		$action = ActionBuilder::getAction($_REQUEST["action"]);
		$vue = $action->execute();
	}
else
	{
		$action = ActionBuilder::getAction("");
		$vue = $action->execute();
	}
	if (!($action instanceof RequestAjaxAction)) {
			if ($action instanceof RequirePRGAction) {
					header("Location: ?action=".$vue);
			} else {
				include_once('view/'.$vue.'.php');
			}
	}
