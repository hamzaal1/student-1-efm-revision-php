<?php
include_once 'Dataaccess.php';
include_once 'notAuth.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE> New Document </TITLE>
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
      <?php

?>
  <!--    Entete      !-->
<div class="container sticky-top">
  <header>

    <nav  class="navbar navbar-dark navbar-expand-md bg-dark pl-5">
     <a class="text-white" style="text-decoration:none" href="#">
	 <h1 style="font-family:Georgia">E-Produits <span style="color:grey">.</span></h1></a>

    <button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
      <span class="navbar-toggler-icon"></span>

    </button>

    <div class="collapse navbar-collapse" id="menu">
    <ul class="navbar-nav ml-5">
	<li class="nav-item">
        <a class="nav-link" href="ajoute.php">Nouveau</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="Liste.php">Produits</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="miseajour.php">Update</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>

    </ul>
      </div>
  </nav>


  </header>
 </div>



























  <!--    Section 1 slide    !-->

  <div  class="container mt-5" id="acc">

     <h1 style="color:black" class="text-center">Liste des Produit :</h1>

 </div>













     <div class="container mt-4">
            <div class="row">

                <table   class="table table-dark table-striped table-bordered">
                  <thead>
                    <tr>
                      <th style="color:black" >Nom</th>
                      <th style="color:black">Prenom</th>
                      <th style="color:black">Prix</th>
                      <th style="color:black">Categorie</th>
                      <th style="color:black">Photo</th>
                      <th style="color:black">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
$sql_query = "SELECT pr.id, pr.name, pr.prix, pr.image, categ.name AS categ_name
FROM produit pr, categories categ
WHERE pr.category_id = categ.id";
$conn = Dataaccess::connection();
$stmt = $conn->prepare($sql_query);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $image = $row['image'];
    ?>
  <tr>
    <td> <?php echo $row['id'] ?> </td>
    <td> <?php echo $row['name'] ?> </td>
    <td> <?php echo $row['prix'] ?> </td>
    <td> <?php echo $row['categ_name'] ?> </td>
    <td> <img src="./images/<?php echo $image ?>" width="50" alt="" srcset="">  </td>
    <td>
        <a href="./delete.php?id=<?php echo $row['id']; ?>" 
          onclick="return confirm('Are you sure you want to delete this record?')">
          delete
        </a>
        <a href="./miseajour.php?id=<?php echo $row['id'] ?>">edit</a>
    </td>
  </tr>
  <?php
}
?>
                  </tbody>
                </table>
            </div>
        </div>

  <div class="container pl-5 mx-auto text-center">



  <ul class="pagination justify-content-center">

    <li class="page-item active"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>

  </ul>

 </div>














   <!--    Footer      !-->



<footer>
 <div class="container m-5 mx-auto text-center bg-dark" >
               <h3 style="font-family:Georgia" class="text-white">E-Produits   <span style="color:grey;font-size:50">.</span></h3>
                <div>Copyright © Tous droits reservés.</div>
			</div>


</footer>
 </BODY>
</HTML>
