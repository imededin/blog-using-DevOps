<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<?php 

require '../database.php';

if ( !empty($_POST)) {
// Saisie des erreurs de validation
$titreError = null;
$dateError=null;
$phoError=null;
$idcaError=null;
$idedError=null;

// Saisie des valeurs d‘entrée
$titre = $_POST['titre'];
//$desc = $_POST['desc'];
$date = $_POST['date'];
$phot = $_POST['phot'];
$id_categorie = $_POST['cat'];
$id_edition=$_POST['edition'];
$contenu=$_POST['contenu'];
$id_auteur=$_POST['aut'];
// Valider Engages 
$valid = true;
if (empty($titre)) {
$numError = 'Veuillez entrer un numero';
$valid = false;
}
 if(empty($contenu)) {
    $contenuError = 'Veuillez entrer le contenu';
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
     $sql = 'INSERT INTO article (titre,image,Date_creation,contenu,id_categorie,id_edition,id_auteur) values(?,?,?,?,?,?,?)';
     $q = $pdo->prepare($sql);
     $q->execute(array($titre,$phot,$date,$contenu,$id_categorie,$id_edition,$id_auteur));
     Database::disconnect();
     header("Location:../principale.php");}
     
}
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
      
    <link rel="stylesheet" href="../style.css" >
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<!-- Load WysiBB JS and Theme -->
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
     CKEDITOR.replace( 'contenu' );
</script>

</head>

<body >
<div class="container">
<div class="jumbotron ">
<div class="row" >
      <h4 color="blue"><u>ajouter un article:</u></h4>
</div>

<div class="span10 offset1">
<br><br>

<form class="form-horizontal" action="create.php" method="post">
<div class="form-group <?php echo !empty($titreError)?'has-error':'';?>">

<div class="controls">
<label  >titre:</label>
<input name="titre" type="text" placeholder="titre d'article" value="<?php echo !empty($titre)?$titre:'';?>">
<?php if (!empty($titreError)): ?>
<span class="help-inline" ><?php echo   $titreError;?></span>

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
<div class="form-group <?php echo !empty($photError)?'has-error':'';?>">

<div class="controls">
<label  >url de l'image:</label>
<input name="phot" type="url" placeholder="url photo" value="<?php echo !empty($phot)?$phot:'';?>">
<?php if (!empty($photError)): ?>
<span class="help-inline" ><?php echo   $photError;?></span>

<?php endif; ?>
</div>
</div>
<div class="form-group ">

<div class="controls">
<label  >categorie:</label>
<select name="cat" id="cat">
<?php
                        
require '../DBconx.php';
                       $sql = 'SELECT * FROM CATEGORIE ';
                       
                       $req = $conn->query($sql);
                       //echo '<select name="categorie">';
                       while($row = $req->fetch(PDO::FETCH_NUM)){
                           ?>
                                <option value="<?php echo $row[0];  ?>"><?php echo $row[1]; ?></option>;
                           <?php  }?>   
                              
                            
                      
                      </select>
                     

</div>
</div>


<div class="controls">
<label  >edition:</label>
<select name="edition" id="edition">
<?php
                        
require '../DBconx.php';
                       $sql = 'SELECT * FROM edition ';
                       
                       $req = $conn->query($sql);
                       //echo '<select name="categorie">';
                       while($row = $req->fetch(PDO::FETCH_NUM)){
                           ?>
                                <option value="<?php echo $row[0];  ?>"><?php echo $row[1]; ?></option>;
                           <?php  }?>   
                              
                            
                      
                      </select>
                     
</div>
</div>

<div class="form-group ">

<div class="controls">
<label  >auteur:</label>
<select name="aut" id="aut">
<?php
                        
require '../DBconx.php';
                       $sql = 'SELECT * FROM auteur ';
                       
                       $req = $conn->query($sql);
                       //echo '<select name="categorie">';
                       while($row = $req->fetch(PDO::FETCH_NUM)){
                           ?>
                                <option value="<?php echo $row[0];  ?>"><?php echo $row[1]; ?></option>;
                           <?php  }?>   
                              
                            
                      
                      </select>
                     
</div>
</div>

<div class="form-group <?php echo !empty($contenuError)?'has-error':'';?>">

<div class="controls">
<label  >contenu:</label>
<textarea  name="contenu" rows=20></textarea>
<script>
     CKEDITOR.replace( 'contenu' );
</script>
<?php if (!empty($contenuError)): ?>
<span class="help-inline" ><?php echo   $contenuError;?></span>

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