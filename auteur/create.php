<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<link href="../css/bootstrap.min.css" rel="stylesheet">
<?php 

require '../database.php';

if ( !empty($_POST)) {
// Saisie des erreurs de validation
$nomError = null;
$mailError=null;
$phoError=null;
$descError=null;

// Saisie des valeurs d‘entrée
$nom = $_POST['nom'];
$desc = $_POST['desc'];
$email = $_POST['email'];
$phot = $_POST['phot'];
// Valider Engages 
$valid = true;
if (empty($nom)) {
$nomError = 'Veuillez entrer un numero';
$valid = false;
}
if (empty($desc)) {
    $descError = 'Veuillez entrer une description';
    $valid = false;
    }
if (empty($phot)) {
    $photError = 'Veuillez entrer un url';
    $valid = false;
        }
if (empty($email)) {
     $mailError = 'Veuillez entrer une date';
    $valid = false;
            }
// Entrer des données
if ($valid) {
     $pdo = Database::connect();
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "INSERT INTO auteur (nom_aut,url_photo,email,description) values(?,?,?,?)";
     $q = $pdo->prepare($sql);
     $q->execute(array($nom,$phot,$email,$desc));
     Database::disconnect();
     header("Location:home.php");}
     
      }
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="../style.css" >

</head>

<body >
<div class="container">
<div class="jumbotron ">
<div class="row" >
      <h4 color="blue"><u>ajouter un auteur:</u></h4>
</div>

<div class="span10 offset1">
<br><br>

<form class="form-horizontal" action="create.php" method="post">
<div class="form-group <?php echo !empty($numError)?'has-error':'';?>">

<div class="controls">
<label  >nom:</label>
<input name="nom" type="text" placeholder="nom d'auteur" value="<?php echo !empty($nom)?$nom:'';?>">
<?php if (!empty($nomError)): ?>
<span class="help-inline" ><?php echo   $nomError;?></span>

<?php endif; ?>
</div>
</div>
<div class="form-group <?php echo !empty($mailError)?'has-error':'';?>">

<div class="controls">
<label  >email:</label>
<input name="email" type="email" placeholder="email" value="<?php echo !empty($email)?$email:'';?>">
<?php if (!empty($mailError)): ?>
<span class="help-inline" ><?php echo   $mailError;?></span>

<?php endif; ?>
</div>
</div>
<div class="form-group <?php echo !empty($photError)?'has-error':'';?>">

<div class="controls">
<label  >url de photo:</label>
<input name="phot" type="url" placeholder="url photo" value="<?php echo !empty($phot)?$phot:'';?>">
<?php if (!empty($photError)): ?>
<span class="help-inline" ><?php echo   $photError;?></span>

<?php endif; ?>
</div>
</div>
<div class="form-group <?php echo !empty($descError)?'has-error':'';?>">

<div class="controls">
<label  >description:</label>
<input name="desc" type="text" placeholder="description d'edition" value="<?php echo !empty($desc)?$desc:'';?>">
<?php if (!empty($descError)): ?>
<span class="help-inline" ><?php echo   $descError;?></span>

<?php endif; ?>
</div>
</div>

<div class="form-actions">
<button type="submit" class="btn btn-success">Create</button>
<a class="btn" href="home.php">Back</a>
</div>
</form>


</div>

</div> <!-- /container -->
<hr color=#00ab00><hr color=#00ab00>
</body>
</html>