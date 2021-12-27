<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ensi-magazine</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">
</head>

<body>
    <div class="wrapper">
        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div class="logo">
                            <h2><a href="http://ossec.tn/">ossec</a></h2>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="menu">
                            <ul>
                                <li class="active"><a href="#">Home</a></li>
                                <li><a href="categorie.php">categorie</a></li>
                                <li><a href="article.php">article</a></li>
                             
                                <li><a href="contact.php">contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section class="bg-text-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bg-text">
                            <h3>magazine ossec</h3>
                            <p> descrition </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="blog-post-area">
            <div class="container">
                <div class="row" style="width:100%">
                    <div class="blog-post-area-style">
                    <?php
                            require 'database.php';
                            $pdo = Database::connect();
                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $sql = 'SELECT * FROM article ORDER BY date_creation DESC';
                       
                            $req = $pdo->query($sql);
                            $row = $req->fetch(PDO::FETCH_NUM);
                            $auteur="SELECT  nom_aut FROM auteur where id_auteur=$row[6]";
                            $req2 = $pdo->query($auteur);
                            $dat2 = $req2->fetch(PDO::FETCH_NUM);
                           echo " <div class='col-md-12'>
                                    <div class='single-post-big'>
                                      <div class='big-image'>
                                        <img src=$row[3] alt=''>
                                       </div>
                                      <div class='big-text'>
                                        <h3><a href='#'>$row[1]</a></h3>
                                        <a  href='article.php?id=$row[0]' class='btn btn-primary'>read it..</a>
                                        <h4><span class='date'>$row[4]</span><span class='author'>Posted By: <span class='author-name'>$dat2[0]</span></span>
                                        </h4>
                                    </div>
                                </div>
                            </div>";
                
                            echo "<div class=flex-row>";
                            
                            while($row = $req->fetch(PDO::FETCH_NUM)){
                                
                                $auteur="SELECT  nom_aut FROM auteur where id_auteur=$row[6]";
                                $req2 = $pdo->query($auteur);
                                $dat2 = $req2->fetch(PDO::FETCH_NUM);   
                            echo '<div class="col-md-4">';
                            echo '    <div class="single-post">';
                             echo     "<img src=$row[3]  style='width:15%'>";
                              echo "      <h3><a href='article.php?id=$row[0]'>$row[1]</a></h3>
                                    <h4><span>Posted By: <span class='author-name'>.$dat2[0].</span></span>
                                    </h4>
                                    <a  href='article.php?id=$row[0]' class='btn btn-primary'>read it..</a>
                                    <h4><span>.$row[4].</span></h4>
                                </div>
                            </div>";
                                
                        
                            }
                            echo "</div>";

                            ?>
                            
                    </div>
                </div>
            </div>
            <div class="pegination">
                <!--
                <ul>
                    <li><i class="fa fa-angle-left" aria-hidden="true"></i></li>
                    <li class="active">1</li>
                    <li>2</li>
                    <li>3</li>
                    <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                </ul>
-->

                <div class="nav-links">
                    <span class="page-numbers current">1</span>
                    <a class="page-numbers" href="#">2</a>
                    <a class="page-numbers" href="#">3</a>
                    <a class="page-numbers" href="#">4</a>
                    <a class="page-numbers" href="#">5</a>
                    <a class="page-numbers" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </section>
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="footer-bg">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="footer-menu">
                                        <ul>
                                            <li class="active"><a href="#">Home</a></li>
                                            <li><a href="categorie.php">categorie</a></li>
                                            <li><a href="contact.php">contact</a></li>
                                            <li><a href="article.php">article</a></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="footer-icon">
                                        <p><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></p>
                                    </div>
                                </div>
                            </div> .
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/active.js"></script>
</body>

</html>