<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="index.php">Accueil</a> / Créer un compte</span>
    <h2>Créer un compte</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer">
<div class="row register">
  <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
    <form role="form" method = "post">
                <input name="action" value="creerCompteMembre" type="hidden" />
                <input type="text" class="form-control" placeholder="Identifiant" name="identifiant">
                <input type="email" class="form-control" placeholder="Courriel" name="courriel">
                <input type="password" class="form-control" placeholder="Mot de passe" name="motdpass">
                <input type="password" class="form-control" placeholder="Confirmer mot de passe" name="motdpassConfirm">
                <!--<textarea rows="6" class="form-control" placeholder="Addresse" name="adresse"></textarea>-->
      <button type="submit" class="btn btn-success" name="bCreationCompte">Créer un compte</button>
    </form>
    <?php
    if (ISSET($_SESSION["messageErreurCreationCompte"])){
      echo '<div class="alert alert-danger alert-dismissable" style="margin-top:15px">';
      echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>';
      echo '<p class="panel-body">Les informations renseignées sur le formulaire d\'inscription sont erronées! </p>';
            foreach ($_SESSION["messageErreurCreationCompte"] as $typeMessage => $message) {
              echo '<p class="panel-body">'.$message.'</p>';
            }
      echo 	'</div>';
      UNSET($_SESSION["messageErreurCreationCompte"]);
    }
    ?>
  </div>
</div>
</div>
</div>

<?php include'footer.php';?>
