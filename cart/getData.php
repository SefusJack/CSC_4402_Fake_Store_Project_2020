<?php
	$conn = new mysqli('localhost', 'store', 'qwerty12qwaszx', "store");

    $query = "SELECT * FROM Product";
    
    $result = $conn->query($query);

    $response = "";

    # Return max if no results found
    if ($result->num_rows > 0) {
        $response = "IF";
        while($row = $result->fetch_assoc()) {
            $respone = "TEST";
        }
        return $response;
    }
    else {
        return "FALSE";
    }
?>