<?php
include_once('model/classes/Database.class.php');
include_once('model/classes/Membre.class.php');
//include_once('model/classes/ListeAffichage.class.php');

class MembreDAO {

public static function findMembre($identifiant)
{
        $db = Database::getInstance();
        try {
            $pstmt = $db->prepare("SELECT * FROM membre WHERE IDENTIFIANT = :x OR COURRIEL = :x");
            $pstmt->execute(array(':x' => htmlspecialchars($identifiant)));

            $result = $pstmt->fetch(PDO::FETCH_OBJ);

            if ($result)
            {
                    $membre = new Membre();
                    $membre->loadFromObject($result);
                    $pstmt->closeCursor();
                    $pstmt = NULL;
                    Database::close();
                    return $membre;
            }
            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();
        }
        catch (PDOException $ex){
        }
        return NULL;
}

public static function findTopUtilisateur()
{
  $db = Database::getInstance();
  try {
    $liste = new ListeAffichage();
    //$pstmt = 'SELECT * FROM user WHERENOTE > 5';
    $requete = 'SELECT * FROM user WHERE VISIBLE = 1 ORDER BY NOTE DESC LIMIT 10';
    $pstmt = $db->query($requete);
    foreach($pstmt as $row) {
        $membre = new Utilisateur();
        $membre->loadFromArray($row);
        $liste->add($membre);
      }
    $pstmt->closeCursor();
    $pstmt = NULL;
    Database::close();
    return $liste;
  } catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      return $liste;
  }
}

public static function findAll()
{
  $db = Database::getInstance();
  try {
    $liste = new ListeAffichage();
    $requete = 'SELECT * FROM user WHERE VISIBLE = 1 ORDER BY NOTE DESC';
    $pstmt = $db->query($requete);
    foreach($pstmt as $row) {
        $membre = new Utilisateur();
        $membre->loadFromArray($row);
        $liste->add($membre);
      }
    $pstmt->closeCursor();
    $pstmt = NULL;
    Database::close();
    return $liste;
  } catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      return $liste;
  }
}

//Utilisé pour la page recherche selon des critères et permettre la pagination
public static function getPage($numPage, $critere="tous")
{
      $requete = "";
      $tableau = array();
      $TAILLE_PAGE = 10;
      $liste = new ListeAffichage();
      $debut = ($numPage - 1)*$TAILLE_PAGE;
      $pstmt = "";
      $affciher = "";
      if ($critere[0]=='2') $afficher="date";
      else if ($critere == "tous") $afficher="tous";
      else if ($critere == "disponible") $afficher="disponible";
      else $afficher="ville";
  try {
        $db = Database::getInstance();
        switch ($afficher) {
            case  "tous" :
                $pstmtNbr = $db->query("SELECT COUNT(IDENTIFIANT) AS NBRUTILISATEURS FROM user WHERE VISIBLE = 1");
                $Nbr = $pstmtNbr->fetch();
                $tableau['nbrDeResultat'] = $Nbr['NBRUTILISATEURS'];
                $pstmt = $db->prepare('SELECT * FROM user WHERE VISIBLE = 1
                                       ORDER BY IDENTIFIANT ASC LIMIT '.$debut.', '.$TAILLE_PAGE);
                $pstmt->execute();
            break;

            case  "disponible" :
                $pstmtNbr = $db->query("SELECT DISTINCT COUNT(IDENTIFIANT) AS NBRUTILISATEURS
                                        FROM `user` WHERE IDENTIFIANT IN
                                                    (SELECT DISTINCT IDENTIFIANT FROM disponibilites) AND VISIBLE = 1");
                $Nbr = $pstmtNbr->fetch();
                $tableau['nbrDeResultat'] = $Nbr['NBRUTILISATEURS'];
                $pstmt = $db->prepare('SELECT DISTINCT `user`.* FROM `user`, `disponibilites`
                                       WHERE `user`.IDENTIFIANT = `disponibilites`.IDENTIFIANT
                                       AND `user`.VISIBLE = 1
                                       ORDER BY IDENTIFIANT ASC LIMIT '.$debut.', '.$TAILLE_PAGE);
                $pstmt->execute();
            break;

            case  "date" :
                $_SESSION['ladate'] = $critere;
                $pstmtNbr = $db->query("SELECT COUNT(`user`.`IDENTIFIANT`) AS NBRUTILISATEURS
                                        FROM `user`, `disponibilites`
                                        WHERE `user`.IDENTIFIANT = `disponibilites`.IDENTIFIANT
                                        AND `user`.VISIBLE = 1
                                        AND DATE('".$critere."') BETWEEN `disponibilites`.DATEDEBUT AND `disponibilites`.DATEFIN");
                $Nbr = $pstmtNbr->fetch();
                $tableau['nbrDeResultat'] = $Nbr['NBRUTILISATEURS'];
                $pstmt = $db->prepare('SELECT `user`.*, `disponibilites`.`DATEDEBUT`, `disponibilites`.`DATEFIN`
                                       FROM `user`, `disponibilites`
                                       WHERE `user`.`IDENTIFIANT`=`disponibilites`.`IDENTIFIANT`
                                       AND `user`.`VISIBLE`= 1 AND
                                       /*DATE("'.$critere.'") BETWEEN `disponibilites`.`DATEDEBUT` AND `disponibilites`.`DATEFIN`*/
                                       :critere BETWEEN `disponibilites`.`DATEDEBUT` AND `disponibilites`.`DATEFIN`
                                       ORDER BY IDENTIFIANT ASC LIMIT '.$debut.', '.$TAILLE_PAGE);
                $pstmt->execute(array(':critere' => htmlspecialchars($critere)));
                //array(':critere' => htmlspecialchars($critere))
            break;

            case "ville" :
            //default :
                $pstmtNbr = $db->query("SELECT COUNT(IDENTIFIANT) AS NBRUTILISATEURS FROM user
                                        WHERE VISIBLE = 1 AND VILLE = '.$critere.'");
                $Nbr = $pstmtNbr->fetch();
                $tableau['nbrDeResultat'] = $Nbr['NBRUTILISATEURS'];
                $pstmt = $db->prepare('SELECT * FROM user WHERE VISIBLE = 1 AND VILLE = :critere
                             ORDER BY IDENTIFIANT ASC LIMIT '.$debut.', '.$TAILLE_PAGE);
                $pstmt->execute(array(':critere' => htmlspecialchars($critere)));
        }

         foreach($pstmt as $row) {
            $membre = new Utilisateur();
            $membre->loadFromArray($row);
            $liste->add($membre);
          }
          /*if($tableau['nbrDeResultat'] == 0)
            $_SESSION["messagesNbrError"] = "0";*/
          $tableau['liste'] = $liste;
          $pstmt->closeCursor();
          $pstmt = null;
          Database::close();
          return $tableau;
  } catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      return $tableau;
  }
}

public static function findByVille($ville)
{
  $db = Database::getInstance();
  try {
    $liste = new ListeAffichage();
    //$pstmt = 'SELECT * FROM user WHERENOTE > 5';
    $pstmt = $db->prepare('SELECT * FROM user WHERE VISIBLE = 1 AND VILLE = :ville');
    $pstmt->execute(array(':ville' => htmlspecialchars($ville)));
    foreach($pstmt as $row) {
        $membre = new Utilisateur();
        $membre->loadFromArray($row);
        $liste->add($membre);
      }
    $pstmt->closeCursor();
    $pstmt = NULL;
    Database::close();
    return $liste;
  } catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      return $liste;
  }
}

public static function countAllUtilisateurs()
{
        $db = Database::getInstance();
        try {
            $pstmt = $db->query("SELECT COUNT(IDENTIFIANT) AS NBRUTILISATEURS FROM user WHERE VISIBLE = 1");
            $nbrUtilsateurs = $pstmt->fetch();
            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();
            return $nbrUtilsateurs['NBRUTILISATEURS'];
        }
        catch (PDOException $ex){
        }
        return 0;
}

public static function createMembre($membre)
{
        $db = Database::getInstance();
        try {
            $pstmt = $db->prepare("INSERT INTO membre (`IDENTIFIANT`, `MOTDEPASSE`, `COURRIEL`)
                                   VALUES (:i,:mp,:c)");
            $pstmt->execute(array(':i' => htmlspecialchars($membre->getIdentifiant()),
                                  ':mp' => htmlspecialchars($membre->getMotDePasse()),
                                  ':c' => htmlspecialchars($membre->getCourriel())
                                  ));
            /*$pstmt = $db->prepare("SELECT * FROM ville WHERE NOMVILLE = :nomVille AND PAYSVILLE = :paysVille");
            $pstmt->execute(array(':nomVille' => htmlspecialchars($membre->getVille()),
                                  ':paysVille' => htmlspecialchars($membre->getPays())
                                  ));
            $result = $pstmt->fetch(PDO::FETCH_OBJ);
            if (!$result)
            {
              $pstmt = $db->prepare("INSERT INTO ville (`NOMVILLE`, `PAYSVILLE`)
                                     VALUES (:nomVille,:paysVille)");
              $pstmt->execute(array(':nomVille' => htmlspecialchars($membre->getVille()),
                                    ':paysVille' => htmlspecialchars($membre->getPays())
                                    ));
            }*/
            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();
        }
        catch (PDOException $ex){
        }
}

public static function updateUtilisateur($membre)
{
        $db = Database::getInstance();
        try {
            $pstmt = $db->prepare("UPDATE user SET NOM = :nom,
                                                   PRENOM = :prenom,
                                                   GENRE = :genre,
                                                   ADRESSE = :adresse,
                                                   VILLE = :ville,
                                                   PAYS = :pays,
                                                   TELEPHONE = :tel,
                                                   VISIBLE = :visible,
                                                   PROFILCOMPLET = :profComplet
                                             WHERE IDENTIFIANT = :identifiant");
            $pstmt->execute(array(':nom' => htmlspecialchars($membre->getNom()),
                                  ':prenom' => htmlspecialchars($membre->getPrenom()),
                                  ':genre' => htmlspecialchars($membre->getGenre()),
                                  ':adresse' => htmlspecialchars($membre->getAdresse()),
                                  ':ville' => htmlspecialchars($membre->getVille()),
                                  ':pays' => htmlspecialchars($membre->getPays()),
                                  ':tel' => htmlspecialchars($membre->getTelephone()),
                                  ':visible' => htmlspecialchars($membre->isVisible()),
                                  ':profComplet' => htmlspecialchars($membre->isProfilComplet()),
                                  ':identifiant' => htmlspecialchars($membre->getIdentifiant())
                                  ));
            $pstmt = $db->prepare("SELECT * FROM ville WHERE NOMVILLE = :nomVille AND PAYSVILLE = :paysVille");
            $pstmt->execute(array(':nomVille' => htmlspecialchars($membre->getVille()),
                                  ':paysVille' => htmlspecialchars($membre->getPays())
                                  ));
            $result = $pstmt->fetch(PDO::FETCH_OBJ);
            if (!$result)
            {
              $pstmt = $db->prepare("INSERT INTO ville (`NOMVILLE`, `PAYSVILLE`)
                                     VALUES (:nomVille,:paysVille)");
              $pstmt->execute(array(':nomVille' => htmlspecialchars($membre->getVille()),
                                    ':paysVille' => htmlspecialchars($membre->getPays())
                                    ));
            }
            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();
        }
        catch (PDOException $ex){
        }
}


public static function updateAvatarUtilisateur($id, $avatar)
{
        $db = Database::getInstance();
        try {
            $pstmt = $db->prepare("UPDATE user SET IMAGEPROFIL = :avatar
                                               WHERE IDENTIFIANT = :id");
            $pstmt->execute(array(':avatar' => htmlspecialchars($avatar),
                                  ':id' => htmlspecialchars($id)
                                  ));
            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();
        }
        catch (PDOException $ex){
        }
}

public static function updateNoteUtilisateur($id, $note)
{
        $db = Database::getInstance();
        try {
            $pstmt = $db->prepare("UPDATE user SET NOTE = :note
                                               WHERE IDENTIFIANT = :id");
            $pstmt->execute(array(':note' => htmlspecialchars($note),
                                  ':id' => htmlspecialchars($id)
                                  ));
            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();
        }
        catch (PDOException $ex){
        }
}

}
