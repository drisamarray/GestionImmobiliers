<?php
require_once 'model/dao/MembreDAO.php';
require_once 'model/classes/Membre.class.php';
require_once 'model/classes/Services.class.php';

class GereMembre {
    public static function connexion() {
        if (!ISSET($_SESSION)) {
          session_start();
        }
        if (ISSET($_SESSION["messagesFormConexError"])) {
          UNSET($_SESSION["messagesFormConexError"]);
        }
        $identifiant =$_REQUEST['identifiant'];
        $motDePasse =$_REQUEST['motDePasse'];
        $resultat = TRUE;
        if ($identifiant == "") {
            $_SESSION["messagesFormConexError"]["identifiant"] = "Il faut renseigner un identifiant : il est obligatoire";
            $resultat = FALSE;
        }
        if ($motDePasse == "") {
            $_SESSION["messagesFormConexError"]["motDePasse"] = "Le mot de passe obligatoire";
            $resultat = FALSE;
        }
        if ($resultat) {
            $dao = new UtilisateurDAO();
            $membre = $dao->findUtilisateur($identifiant);
            if ($membre == NULL) {
                $_SESSION["messagesFormConexError"]["identifiant"] = "Identifiant/Courriel inexistant";
                $resultat = FALSE;
            }
            elseif (!password_verify($motDePasse, $membre->getMotDePasse())) {
                $_SESSION["messagesFormConexError"]["motDePasse"] = "Mot de passe incorrect";
                $resultat = FALSE;
            }
            else {
                $_SESSION["connected"] = $identifiant;
                //UNSET($_SESSION["messagesFormConexError"]);
            }
        }
        return $resultat;
    }

    public static function creerUnCompte() {
        if (!ISSET($_SESSION)) {
          session_start();
        }
        if (ISSET($_SESSION["messageErreurCreationCompte"])) {
          UNSET($_SESSION["messageErreurCreationCompte"]);
        }
        $identifiant=$_REQUEST['identifiant'];
        $courriel =$_REQUEST['courriel'];
        $motDePasse =$_REQUEST['motdpass'];
        $motDePasseConfirm =$_REQUEST['motdpassConfirm'];
        $resultat = TRUE;
        if ($identifiant == "") {
            $_SESSION["messageErreurCreationCompte"]["identifiant"] = "Identifiant obligatoire";
            $resultat = FALSE;
        }
        if ($courriel == "") {
            $_SESSION["messageErreurCreationCompte"]["courriel"] = "Courriel obligatoire";
            $resultat = FALSE;
        }
        if ($motDePasse == "") {
            $_SESSION["messageErreurCreationCompte"]["motDePasse"] = "Mot de passe obligatoire";
            $resultat = FALSE;
        }
        if ($motDePasse != $motDePasseConfirm) {
            $_SESSION["messageErreurCreationCompte"]["motdpassConfirm"] = "Les mots de passe doivent être identiques";
            $resultat = FALSE;
        }
        if ($resultat) {
            $dao = new MembreDAO();
            $membre = $dao->findMembre($identifiant);
            if ($membre != NULL) {
               $_SESSION["messageErreurCreationCompte"]["identifiant"] = "Identifiant déjà existant";
               return FALSE;
            }
            $membre = $dao->findMembre($courriel);
            if ($membre != NULL) {
               $_SESSION["messageErreurCreationCompte"]["courriel"] = "courriel déjà existant";
               return FALSE;
            }
            $membre = new Membre();
            $membre->setIdentifiant($identifiant);
            $membre->setCourriel($courriel);
            $motDePasse = password_hash($_REQUEST['motdpass'], PASSWORD_BCRYPT);
            $membre->setMotDePasse($motDePasse);
            $dao->createMembre($membre);
            $_SESSION["connected"] = $identifiant;
        }
        return $resultat;
    }

    public static function modifierProfil() {
        if (!ISSET($_SESSION)) {
          session_start();
        }
        if (ISSET($_SESSION["messagesFormProfilError"])) {
          UNSET($_SESSION["messagesFormProfilError"]);
        }
        if (ISSET($_SESSION["messagesFormProfilSucces"])) {
          UNSET($_SESSION["messagesFormProfilSucces"]);
        }
        $nom=$_REQUEST['nom'];
        $prenom =$_REQUEST['prenom'];
        $genre = ((ISSET($_REQUEST['genre'])) ? $_REQUEST['genre'] : NULL);
        $adresse =$_REQUEST['adresse'];
        $ville =$_REQUEST['ville'];
        $pays =$_REQUEST['pays'];
        $telephone = ((ISSET($_REQUEST['telephone'])) ? $_REQUEST['telephone'] : NULL);
        $visibilite = ((ISSET($_REQUEST['visibilite'])) ? $_REQUEST['visibilite'] : FALSE);
        $resultat = TRUE;

        if ($nom == "") {
            $_SESSION["messagesFormProfilError"]["nom"] = "Le nom est obligatoire";
            $resultat = FALSE;
        }
        if ($prenom == "") {
            $_SESSION["messagesFormProfilError"]["prenom"] = "Le prénom est obligatoire";
            $resultat = FALSE;
        }
        if ($genre == "") {
            $_SESSION["messagesFormProfilError"]["genre"] = "Le genre doit être spécifié";
            $resultat = FALSE;
        }
        if ($adresse == "") {
            $_SESSION["messagesFormProfilError"]["adresse"] = "L'adresse doit être spécifiée";
            $resultat = FALSE;
        }
        if ($ville == "") {
            $_SESSION["messagesFormProfilError"]["ville"] = "La ville doit être renseignée";
            $resultat = FALSE;
        }
        if ($pays == "") {
            $_SESSION["messagesFormProfilError"]["pays"] = "Le pays doit être renseigné";
            $resultat = FALSE;
        }
        if ($visibilite == "") {
            $_SESSION["messagesFormProfilError"]["visibilite"] = "Vous devez indiquer si oui ou non vous voulez être visible pour les autres membres";
            $resultat = FALSE;
        }

        if ($resultat) {
            $id = $_SESSION['connected'];
            $Utilisateur = new Utilisateur();
            $Utilisateur->setIdentifiant($id);
            $Utilisateur->setNom($nom);
            $Utilisateur->setPrenom($prenom);
            $Utilisateur->setGenre($genre);
            $Utilisateur->setAdresse($adresse);
            $Utilisateur->setVille($ville);
            $Utilisateur->setPays($pays);
            $Utilisateur->setTelephone($telephone);
            $Utilisateur->setVisible($visibilite);
            $Utilisateur->setProfilComplet(TRUE);
            $dao = new UtilisateurDAO();
            $dao->updateUtilisateur($Utilisateur);
            $_SESSION["connected"] = $Utilisateur->getIdentifiant();
            UNSET($_SESSION["messagesFormProfilError"]);
            $_SESSION["messagesFormProfilSucces"]['majReussi'] = "Mise à jour de votre profil réussie!";
        }
        return $resultat;
    }

    public static function setAvatar() {
      if (!ISSET($_SESSION)) {
        session_start();
      }
      if (ISSET($_SESSION["messagesAvatarError"])) {
        UNSET($_SESSION["messagesAvatarError"]);
      }
      if (ISSET($_SESSION["messagesAvatarSucces"])) {
        UNSET($_SESSION["messagesAvatarSucces"]);
      }

      $check = getimagesize($_FILES["avatar"]["tmp_name"]);
      if($check !== false) {
        $_SESSION["messagesAvatarError"]['vide'] = "File is an image - " . $check["mime"] . ".";
      } else {
        $_SESSION["messagesAvatarError"]['vide'] = "File is not an image.";
        return FALSE;
    }

      $avatar = "default.jpg";
      $continuer = TRUE;
      $tailleMax = 10485760;//=10Mo
      $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
      if (!ISSET($_FILES['avatar']) || $_FILES['avatar']["name"]=="") {
          $_SESSION["messagesAvatarError"]['vide'] = "Aucune selection n'a été faite!";
          return FALSE;
      }

      if($_FILES['avatar']["size"] > $tailleMax){
          $_SESSION["messagesAvatarError"]['taille'] = "Taille maximum permise : 10 Mo";
          return FALSE;
      }

      $lesExtUser = strtolower(substr(strrchr($_FILES['avatar']['name'],'.'),1));
      if(!in_array($lesExtUser,$extensionsValides)){
          $_SESSION["messagesAvatarError"]['extention'] = "Extension invlalide! Cahrger une image de type :  'jpg', 'jpeg', 'gif' ou 'png'";
          return FALSE;
      }

      $id = $_SESSION['connected'];
      $chemin = "./img/avatars/";
      $avatar = $id.".".$lesExtUser;
      if ((copy($_FILES["avatar"]["tmp_name"],$chemin.$avatar))) {
          unlink($_FILES['avatar']['tmp_name']);
          $continuer = TRUE;
      } else {
            $_SESSION["messagesAvatarError"]['unkown'] = "Problème non identifié : chargement d'image non réussi";
            $avatar = "default.jpg";
            $continuer = FALSE;
      }

      if ($continuer){
          $id = $_SESSION['connected'];
          $dao = new UtilisateurDAO();
          $dao->updateAvatarUtilisateur($id, $avatar);
          UNSET($_SESSION["messagesAvatarError"]);
          $_SESSION["messagesAvatarSucces"]['majReussi'] = "Mise à jour de votre avatar profil réussie!";
      }
      return $continuer;
    }

    public static function getMessage($champ) {
        if (ISSET($_SESSION["messages"][$champ]))
            return $_SESSION["messages"][$champ];
        return "";
    }
}
