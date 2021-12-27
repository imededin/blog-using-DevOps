<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<link href="../css/bootstrap.min.css" rel="stylesheet">
<?php 

require '../database.php';

if ( !empty($_POST)) {
// Saisie des erreurs de validation
$titreError = null;
// Saisie des valeurs d‘entrée
$titre = $_POST['titre'];

// Valider Engages 
$valid = true;
if (empty($titre)) {
$titreError = 'Veuillez entrer un nom';
$valid = false;
}

// Entrer des données
if ($valid) {
     $pdo = Database::connect();
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $q =$pdo->query ("SELECT * FROM CATEGORIE ");
     $exist=false;
      while(  $data = $q->fetch(PDO::FETCH_NUM)){
            if($data[1]==$titre){
                  $exist=true;
                  break;
            }

      }
      if(!$exist){
     $sql = "INSERT INTO CATEGORIE (titre) values(?)";
     $q = $pdo->prepare($sql);
     $q->execute(array($titre));
     Database::disconnect();
     header("Location:../principale.php");}
     else{
           $existError="categorie exist deja!!";
     }
}
      }
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>    <link rel="stylesheet" href="../style.css" >

</head>

<body >
<div class="container">
<div class="jumbotron  " > 
<div class="row" >
      <h4 color="blue"><u>ajouter une CATEGORIE:</u></h4>
</div>

<div class="span10 offset1">
<br><br>

<form class="form-horizontal" action="create.php" method="post">
<div class="form-group <?php echo !empty($titreError)?'has-error':'';?>">

<div class="controls">
<label  >titre:</label>
<input name="titre" type="text" placeholder="titre de categorie" value="<?php echo !empty($titre)?$titre:'';?>">
<?php if (!empty($titreError)|| !empty($existError)): ?>
<span class="help-inline" ><?php echo   $titreError;?></span>
<span class="help-inline" ><?php echo   $existError;?></span>
<?php endif; ?>
</div>
</div>

<div class="form-actions">
<button type="submit" class="btn btn-success">Create</button>
<a class="btn" href="../principale.php">Back</a>
</div>
</form>


</div>

</div> <!-- /container -->
<hr color=blue><hr color=blue>
</div>
</body>
</html>