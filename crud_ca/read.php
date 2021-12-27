<?php
    require '../database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: ../principale.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM CATEGORIE where id_categorie=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_NUM);
    }
?>
 
<!DOCTYPE html>
<html lang="fr">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../style.css" >
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
                            <h5>categorie:<?php echo '<b><u>'. $data[1].'</u></b>';?><br>
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