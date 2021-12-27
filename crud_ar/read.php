<?php
    require '../database.php';
    require_once "../jbbcode-1.2.0/Parser.php";
    
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: ../principale.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM article where id_article=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_NUM);
        $catego="SELECT  titre FROM categorie where id_categorie=$data[5]";
        $req = $pdo->query($catego);
        $dat = $req->fetch(PDO::FETCH_NUM);
        $edition="SELECT  numero FROM edition where id_edition=$data[7]";
        $req1 = $pdo->query($edition);
        $dat1 = $req1->fetch(PDO::FETCH_NUM);
        $auteur="SELECT  nom_aut FROM auteur where id_auteur=$data[6]";
        $req2 = $pdo->query($auteur);
        $dat2 = $req2->fetch(PDO::FETCH_NUM);

    }
?>
 
<!DOCTYPE html>
<html lang="fr">
<head>

    <link rel="stylesheet" href="../style.css" >
    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
    <div class="jumbotron bg_secondary  " >
     
                <div class="span10 offset1">
                    <div class="row">
                        <h4><u>details:</u></h4><br>
                    </div>
                     
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <div class="controls">

                            <label >
                            <fieldset>

                            <br><h5>ID:<?php echo '<b><u>'. $data[0].'</u></b>';?><br><br>
                            <h5>titre:<?php echo '<b><u>'. $data[1].'</u></b>';?><br>
                            <h5>date_creation:<?php echo '<b><u>'. $data[4].'</u></b>';?><br>
                            <h5>Image:<?php echo "<img src=$data[3]>";?><br>
                            <h5>categorie:<?php echo '<b><u>'. $dat[0].'</u></b>';?><br>
                            <h5>edition Num:<?php echo '<b><u>'. $dat1[0].'</u></b>';?><br>
                            <h5>Auteur:<?php echo '<b><u>'. $dat2[0].'</u></b>';?><br>
                            <br><h5>contenu:<?php echo '<b><u>'. $data[2] .'</u></b>';?><br>
                            </fieldset>
                            </label>
                        </div>
                      </div>

                        <div class="form-actions">
                          <a class="btn" href="../principale.php"><b><u>Back</u></b></a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>