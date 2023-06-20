<?php 
include 'Dataaccess.php';
include_once 'notAuth.php';

$conn = Dataaccess::connection();
$produit = null;
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql_query = "SELECT * FROM produit where id= ? ";
  $stmt = $conn->prepare($sql_query);
  $stmt->execute([$id]);
  $produit = $stmt->fetch();
}else{
  header('location:Liste.php');
}

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
      <li class="nav-item">
        <a class="nav-link" href="Liste.php">Produits</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="miseajour.php">Update</a>
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

     <h1 style="color:black" class="text-center">Mise à jour des informations :</h1>

 </div>








  <!--    Section Login    !-->
  <div class="container mt-5" id="acc">
<section class="bg-dark p-2 text-dark" style="color:red">
  <div class="mx-auto w-50">
    <h2>Nouvel Produit :</h2>
    <form action="miseajour.php"  method="POST" >
    <input type="hidden" name="id" value="<?php echo $produit['id']  ?>">
      <div class="form-group">
        <label>Name:</label>
        <input name="name" type="text" value="<?php echo $produit['name'] ?>"  class="form-control">
          </div>
      <div class="form-group">
        <label>Prix:</label>
        <input name="prix" value="<?php echo $produit['prix'] ?>" type="text" class="form-control" >
      </div>
        <div class="form-group">
          <label>Category:</label>
          <select name="category" id="">
            <?php
$conn = Dataaccess::connection();
$sql_query = "SELECT * FROM categories";
$stmt = $conn->prepare($sql_query);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <option value="<?php echo $row['id']; ?>">
  <?php echo $row['name']; ?>
</option>


<?php
}
?>

          </select>
      </div>


        <input type="submit" name="actionEnregistrer" class="btn btn-outline-light" value="Enregistrer"/>
     <button type="reset" class="btn btn-outline-light">Annuler</button>

    </form>
  </div>

</section>


<?php
// action Enregistrer
if (isset($_POST['actionEnregistrer'])) {
  // Retrieve form data
  $name = $_POST['name'];
  $prix = $_POST['prix'];
  $category = $_POST['category'];
  $id = $_POST['id'];

  // Establish a database connection
  $conn = Dataaccess::connection();

  // Prepare the SQL query
  $sql_query = "UPDATE produit SET name = ?, prix = ?, category_id = ? WHERE id = ?";
  $stmt = $conn->prepare($sql_query);

  try {
      // Bind the parameters and execute the query
      $stmt->execute([$name, $prix, $category, $id]);
      header('location:Liste.php');
  } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
}

?>














   <!--    Footer      !-->



<footer>
 <div class="container m-5 mx-auto text-center bg-dark" >
               <h3 style="font-family:Georgia" class="text-white">E-Produits   <span style="color:grey;font-size:50">.</span></h3>
                <div>Copyright © Tous droits reservés.</div>
			</div>


</footer>


 </BODY>
</HTML>
