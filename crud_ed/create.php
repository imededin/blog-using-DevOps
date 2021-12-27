<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<link href="../css/bootstrap.min.css" rel="stylesheet">
<?php 

require '../database.php';

if ( !empty($_POST)) {
// Saisie des erreurs de validation
$numError = null;
$dateError=null;
$phoError=null;
$descError=null;

// Saisie des valeurs d‘entrée
$num = $_POST['num'];
$desc = $_POST['desc'];
$date = $_POST['date'];
$phot = $_POST['phot'];
// Valider Engages 
$valid = true;
if (empty($num)) {
$numError = 'Veuillez entrer un numero';
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
if (empty($date)) {
     $dateError = 'Veuillez entrer une date';
    $valid = false;
            }
// Entrer des données
if ($valid) {
     $pdo = Database::connect();
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "INSERT INTO edition (numero,photo_couverture,date,description) values(?,?,?,?)";
     $q = $pdo->prepare($sql);
     $q->execute(array($num,$phot,$date,$desc));
     Database::disconnect();
     header("Location:../principale.php");}
     
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
      <h4 color="blue"><u>ajouter une edition:</u></h4>
</div>

<div class="span10 offset1">
<br><br>

<form class="form-horizontal" action="create.php" method="post">
<div class="form-group <?php echo !empty($numError)?'has-error':'';?>">

<div class="controls">
<label  >numero:</label>
<input name="num" type="text" placeholder="numero d'edition" value="<?php echo !empty($num)?$num:'';?>">
<?php if (!empty($numError)): ?>
<span class="help-inline" ><?php echo   $numError;?></span>

<?php endif; ?>
</div>
</div>
<div class="form-group <?php echo !empty($dateError)?'has-error':'';?>">

<div class="controls">
<label  >date:</label>
<input name="date" type="date" placeholder="date de creation" value="<?php echo !empty($date)?$date:'';?>">
<?php if (!empty($dateError)): ?>
<span class="help-inline" ><?php echo   $dateError;?></span>

<?php endif; ?>
</div>
</div>
<div class="form-group <?php echo !empty($numError)?'has-error':'';?>">

<div class="controls">
<label  >url de photo_couverture:</label>
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
<a class="btn" href="../principale.php">Back</a>
</div>
</form>


</div>

</div> <!-- /container -->
<hr color=#00ab00><hr color=#00ab00>
</body>
</html>