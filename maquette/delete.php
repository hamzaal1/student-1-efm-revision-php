<?php
include 'Dataaccess.php';
include_once 'notAuth.php';
if (isset($_GET['id'])) {
    // Retrieve the product ID from the URL parameter
    $id = $_GET['id'];
    // Establish a database connection
    $conn = Dataaccess::connection();

    // Prepare the SQL query
    $sql_query = "DELETE FROM produit WHERE id = ?";
    $stmt = $conn->prepare($sql_query);

    try {
        // Bind the parameter and execute the query
        $stmt->execute([$id]);
        header('Location:Liste.php');
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
