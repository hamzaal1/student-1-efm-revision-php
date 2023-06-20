<?php 
include 'Dataaccess.php';
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
	 <h1 style="font-family:Georgia">E-Produit <span style="color:grey">.</span></h1></a>

    <button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
      <span class="navbar-toggler-icon"></span>

    </button>

    <div class="collapse navbar-collapse" id="menu">
    <ul class="navbar-nav ml-5">
    <li class="nav-item">
        <a class="nav-link active" href="ajoute.php">Nouveau</a>
      </li>
      <li class="nav-item ">
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




























  <!--    Section Login    !-->
  <div class="container mt-5" id="acc">
<section class="bg-dark p-2 text-dark" style="color:red">
  <div class="mx-auto w-50">
    <h2>Nouvel Produit :</h2>
    <form action="ajoute.php"  method="POST"  enctype="multipart/form-data">
      <div class="form-group">
        <label>Name:</label>
        <input name="name" type="text" class="form-control">
          </div>
      <div class="form-group">
        <label>Prix:</label>
        <input name="prix" type="text" class="form-control" >
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
              <option value="<?php echo $row['id'] ?>"> 
                <?php echo $row['name'] ?> 
              </option>

          <?php 
            }
          ?>
           
        </select>
      </div>
	 <div class="form-group">
        <label>Image :</label>
        <input name="image" type="file" class="form-control" />
      </div>

        <input type="submit" name="actionEnregistrer" class="btn btn-outline-light" value="Enregistrer"/>
     <button type="reset" class="btn btn-outline-light">Annuler</button>

    </form>
  </div>

</section>

<?php
// action Enregistrer
if(isset($_POST['actionEnregistrer'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $prix = $_POST['prix'];
    $category = $_POST['category'];
    
    // Process the uploaded image
    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];
    $image_path = 'images/' . $image; // Assuming 'images' is the desired directory to store the uploaded images
    
    // Establish a database connection
   $conn = Dataaccess::connection();
    
    // Prepare and execute the SQL query
    $sql_query = "INSERT INTO produit (name, prix, category_id, image) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql_query);
    $stmt->execute([$name, $prix, $category, $image]);
    
    // Move the uploaded image to the desired directory
    move_uploaded_file($image_temp, $image_path);
    header('Location:Liste.php');
    
    // Display success message or redirect to a success page
    // ...
    // Your code to display a success message or redirect goes here
}
?>





</div>







   <!--    Footer      !-->



<footer>
 <div class="container m-5 mx-auto text-center bg-dark" >
               <h3 style="font-family:Georgia" class="text-white">E-Produit   <span style="color:grey;font-size:50">.</span></h3>
                <div>Copyright © Tous droits reservés.</div>
			</div>


</footer>
 </BODY>
</HTML>
