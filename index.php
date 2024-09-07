<?php
echo "HELLO";

// Check if 'word' parameter is set in the POST request

    $word = $_POST['word'];
    
    $servername = "localhost";
    $username   = "WebDataBase";
    $password   = "8078669365";
    $dbname     = "myDB";

    try {
        // Establish a connection to the database
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
        
        // Prepare and execute a SELECT query to check if the word exists in the table
        $stmt = $conn->prepare("SELECT * FROM word_index WHERE wname = :word");
        $stmt->bindParam(':word', $word);
        $stmt->execute();
        
        // Check if any rows were returned
        $count = $stmt->rowCount();
        if ($count > 0) {
            echo "Word '$word' exists in the word_index table.";
        } else {
            echo "Word '$word' does not exist in the word_index table.";
        }
        
        // Close the connection
        $conn = null;
    } catch(PDOException $e) {
        // Log or handle errors appropriately
        echo "Connection failed: " . $e->getMessage();
    }
} 








?>

