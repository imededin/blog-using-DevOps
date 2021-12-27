
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link   href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    	
<?php
    require '../database.php';
 
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: ../principale.php");
    }
     
    if ( !empty($_POST)) {
        // keep track validation errors
        $titreError = null;
        // keep track post values
        $titre = $_POST['titre'];
         
        // validate input
        $valid = true;
        if (empty($titre)) {
            $titreError = 'Please enter Name';
            $valid = false;
        }
         
         
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE CATEGORIE  set titre = ? WHERE id_categorie = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($titre,$id));
            Database::disconnect();
            header("Location:../principale.php");
        }
    } 
        ?>
           
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../style.css" >
</head>
 
<body>
    <div class="container">
    <div class="jumbotron ">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h4><u>modidier cette categorie:</u></h4>
                    </div>
             
                    <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label"><u>titre:</u></label>
                        <div class="controls">
                            <input name="titre" type="text"  placeholder="nouveau titre" value="<?php echo !empty($titre)?$titre:'';?>">
                            <?php if (!empty($titreError)): ?>
                                <span class="help-inline"><?php echo $titreError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn" href="../principale.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>