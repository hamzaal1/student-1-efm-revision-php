<?php include 'remembered.php'; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE> E-athlete </TITLE>
  <meta charset="utf-8">
<link rel="stylesheet" href="./css/bootstrap.min.css" />
<link rel="stylesheet" href="./css/styles.css" />
<script src="./js/jquery-3.3.1.slim.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="js/script.js"></script>

    <script src="./js/jquery-1.11.1.min.js"></script>

   <link rel="stylesheet" href="css/glyphicones.css">
    <link rel="stylesheet" href="css/styles.css">
    <STYLE>

        *{
            color:white;
        }


    </STYLE>
 </HEAD>

 <BODY>

  <!--    Entete      !-->
    <div class="container sticky-top">
  <header>

    <nav  class="navbar navbar-dark navbar-expand-sm bg-dark pl-5">
     <a class="text-white" style="text-decoration:none" href="#">
	 <h1 style="font-family:Georgia">E-Athlete <span style="color:grey">.</span></h1></a>

    <button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
      <span class="navbar-toggler-icon"></span>

    </button>

    <div class="collapse navbar-collapse" id="menu">
    <ul class="navbar-nav ml-5">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Accueil</a>
      </li>


    </ul>
      </div>
  </nav>


  </header>
 </div>













  <!--    Section 1 Image(background)    !-->
 <section>
 <div class="container" id="acc">

 <!-- AFFICHAGE DU JUMBOTRON -->
<div class="jumbotron jumbotron-fluid text-white" style="background-image: url('./images/athletisme.jpg') ;background-repeat: no-repeat;  background-position: center">

    <div class="display-4 pl-2"   style="color:grey">Bienvenue <br/> à E-Athlete.</div>

</div>






 </div>


 </section>















  <!--    Section Login    !-->
  <div class="container" id="acc">
<section class="bg-dark p-2 text-white">
  <div class="mx-auto w-50">
    <h2>Veuillez vous authentifier</h2>
    <form action="index.php" method="POST">
      <div class="form-group">
        <label>Login:</label>
        <input name="login" type="text" class="form-control" placeholder="Login ">
          </div>
      <div class="form-group">
        <label>Password:</label>
        <input name="pass" type="password" class="form-control"   >
      </div>


        <input type="checkbox" name="remember_me"  value="remember"/>Remember me

        <input type="submit" name="actionConnexion" class="btn btn-outline-light" value="Connexion"/>
     <button type="reset" class="btn btn-outline-light">Annuler</button>

    </form>

    <p style="color:red">

      <?php
        if (isset($_GET['err'])) {
          echo $_GET['err'];
        }
      ?>
      </p>
  </div>

</section>

<?php
// action  Connexion :
include_once './Dataaccess.php';
$conn = Dataaccess::connection();
if (!empty($_POST['actionConnexion'])) {
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $sql_query = "SELECT * FROM admin WHERE login=:login AND password=:pass";
    $stmt = $conn->prepare($sql_query);
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':pass', $pass);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    session_start();
    if ($user && isset($_POST['remember_me'])) {
      $_SESSION['login'] = true;
      $_SESSION['remember_me'] = true;
      header("location:Liste.php");
      exit;
    }
    else if ($user) {
      $_SESSION['login'] = true;
      header("location: Liste.php");
      exit;
    } 
    else {
      header("location: index.php?err='password or login wrong'");
      exit;
    }
}

?>


</div>

   <!--    Footer      !-->




 <div class="container m-5 mx-auto text-center bg-dark" >
  <footer>
     <h5 style="font-family:Georgia" class="text-white">E-Athlete <span style="color:grey;font-size:50">.</span></h5>
                <div>Copyright © Tous droits reservés.</div>



</footer>
     </div>
 </BODY>
</HTML>
