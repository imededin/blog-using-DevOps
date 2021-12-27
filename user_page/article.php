<?php
    require 'database.php';
    
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: home.php");
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
        $sql2="SELECT *FROM article ORDER BY date_creation DESC LIMIT 6 ";
        $req2 = $pdo->query($sql2);
        
        $auteur1="SELECT  * FROM auteur where id_auteur=$data[6]";
        $req3 = $pdo->query($auteur1);
        $dat3 = $req3->fetch(PDO::FETCH_NUM);



    }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $data[1]; ?></title>
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
                            <h2><a href="#">ossec</a></h2>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="menu">
                            <ul>
                                <li ><a href="home.php">Home</a></li>
                                <li><a href="categorie.php">categorie</a></li>
                              
                                <li class="active"><a href="article.php">article</a></li>
                                <li><a href="contact.php">contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <section class="single-blog-area">
            <div class="container">
                <div class="row">
                   <div class="col-md-12">
                    <div class="border-top">
                        <div class="col-md-8">
                        <div class="blog-area">
                            <div class="blog-area-part">
                                <p><h1><?php echo $data[2];?></h1></p>
                            </div>
                            <div class="ads-area">
                            <?php
                                echo " <h2>auteur:$dat3[1]</h2>";
                               echo "  <img src=$dat3[4] alt=''>
                              
                                <p>$dat3[3]</p>
                                <b>email:.$dat3[2].</b>";
                            ?>
                            </div>
                            <div class="commententries">
                                <h3>Comments</h3>

                                <ul class="commentlist">
                                    <li>
                                        <article class="comment">
                                            <header class="comment-author">
                                                <img src="img/author-1.jpg" alt="">
                                            </header>
                                            <section class="comment-details">
                                                <div class="author-name">
                                                    <h5><a href="#">Selina Gomez</a></h5>
                                                    <p>February 25 2017</p>
                                                </div>
                                                <div class="comment-body">
                                                    <p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard </p>
                                                </div>
                                                <div class="reply">
                                                    <p><span><a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>12</span><span><a href="#"><i class="fa fa-reply" aria-hidden="true"></i></a>7</span></p>
                                                </div>
                                            </section>
                                        </article>

                                       
                            </div>
                            <form action="#" method="get">
                                <div class="name">
                                    <input type="text" name="" id="" placeholder="Name" class="name">
                                </div>
                                <div class="email">
                                    <input type="email" name="" id="" placeholder="Email" class="email">
                                </div>
                                <div class="comment">
                                    <input type="text" name="" id="" placeholder="Comment" class="comment">
                                </div>
                                <div class="post">
                                    <input type="submit" value="Post">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="button-group filters-button-group">
                            <button data-filter=".recent" class="button is-checked">Recent</button>
                           
                        </div>

                        <div class="grid" style="position: relative; height: 1521.93px;">
                        <?php 
                                while($recent=$req2->fetch(PDO::FETCH_NUM)){
                           echo  "<div class='portfolio-item recent' style='position: absolute; left: 0px; top: 0px;'>
                            
                                <img src=$recent[3]>
                                <div class='portfolio-text'>
                                    <h1>$recent[1]</h1>

                                    <h3> <a  href='article.php?id=$recent[0]' class='btn btn-primary'>read it..</a></h3>
 
                                     </span>$recent[4]</p>
                                </div>
                                <br/>
                            </div>";
                                }
                                ?>
                            
                        </div>
                        <div class="sidebar-ads">
                            <img src="img/sidebar-ads.jpg" alt="">
                            <p>Place For Your <br> Ad Banner</p>
                        </div>
                        <div class="tags">
                            <h2 class="sidebar-title">Tags</h2>
                            <p><a href="#">Adventure</a></p>
                            <p><a href="#">Animals</a></p>
                            <p><a href="#">Asia</a></p>
                            <p><a href="#">Beauty</a></p>
                            <p><a href="#">Canada</a></p>
                            <p><a href="#">Celebration</a></p>
                            <p><a href="#">City</a></p>
                            <p><a href="#">Coffee</a></p>
                            <p><a href="#">Constructions</a></p>
                            <p><a href="#">Europe</a></p>
                            <p><a href="#">Adventure</a></p>
                            <p><a href="#">Animals</a></p>
                            <p><a href="#">Asia</a></p>
                            <p><a href="#">Beauty</a></p>
                            <p><a href="#">Canada</a></p>
                            <p><a href="#">Celebration</a></p>
                            <p><a href="#">City</a></p>
                            <p><a href="#">Coffee</a></p>
                            <p><a href="#">Constructions</a></p>
                            <p><a href="#">Europe</a></p>
                            <p><a href="#">Adventure</a></p>
                            <p><a href="#">Animals</a></p>
                            <p><a href="#">Asia</a></p>
                            <p><a href="#">Beauty</a></p>
                            <p><a href="#">Canada</a></p>
                        </div>
                        <div class="newsletter">
                            <h2 class="sidebar-title">Subscribe To oUR nEWSLETTER</h2>
                            <form action="#" method="post">
                                <input type="email" name="" id="" placeholder="Email">
                                <input type="submit" value="Subscribe">
                            </form>
                        </div>
                    </div>
                    </div>
                    </div>
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
                                            <li ><a href="home.php">Home</a></li>
                                            <li><a href="categorie.php">Categorie</a></li>
                                            <li><a href="contact.php">Contact</a></li>
                                            <li class="active"><a href="#">article</a></li>
                                            
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
    <script src="js/isotope.pkgd.js"></script>
    <script src="js/active.js"></script>
</body>

</html>