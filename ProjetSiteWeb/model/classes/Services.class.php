<?php
class Services {
  public static function validerDate($jour,$mois,$annee)
  {
      if ($jour == "31"){
        $moisNonPhalange = array("2","4","6","9","11");
        for($i=0; $i<count($moisNonPhalange);$i++){
          if($mois == $moisNonPhalange[$i])
            return "";
        }
      }

      if($jour == "30"){
        if($mois == "2")
          return "";
      }

      if($jour == "29"){
        if($mois == "2" && (($annee % 4 == 0 && $annee % 100 != 0) || $annee % 400 == 0))
          return "";
      }

      $date = $annee."-".$mois."-".$jour;
      return $date;
  }


}
